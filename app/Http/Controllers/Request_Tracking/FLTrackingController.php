<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Request_Tracking\QuoteController as QuoteController;
use App\Models\phuongxa;
use App\Models\token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FLTrackingController extends Controller
{
    //
    private $date;
    public function __construct(QuoteController $QCT)
    {
        $this->date = Carbon::create(2021, 5, 15)->format("d-m-Y");
        $this->dateDefault = Carbon::create(2021, 5, 23)->format("d-m-Y");
        $this->QCT = $QCT;
    }
    public function getStatus(Request $request)
    {
        //get token
        $token = token::find(1);
        if (empty($token)) {
            return $this->QCT->getToken();
        }
        //apishow
        $dataShow = [
            'with' => 'orders.shipmentInfor',
            'appends' => 'boxes.owners;logs;sfa',
        ];
        //check status code
        $apiShow = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Authorization' => 'Bearer ' . $token->access_token
        ])->get('http://order.tomonisolution.com:82/api/trackings/' . $request->tracking, $dataShow);

        if ($apiShow->status() == 404) {
            return $apiShow->status();
        } else {
            $results = json_decode($apiShow->body(), true); //results of tomoni
            if (!empty($results['orders'])) {
                $results['orders'][0]['insurance_result_fee'] = round($results['orders'][0]['insurance_declaration'] / 100 * 3, 0); //tính phí bảo hiểm
                $results['orders'][0]['special_result_fee'] = round($results['orders'][0]['special_declaration'] / 100 * 2, 0); // tính phí đặc biệt
            }
            if (!empty($results['boxes'])) {
                //list item & volumne
                $total_weight = 0;
                $total_volume = 0;
                if (count($results['boxes']) == 1) {
                    for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                        // volumne
                        $weight = $results['boxes'][$i]['weight'];
                        $date_default = strtotime($this->date);
                        $date_defaultNew = strtotime($this->dateDefault);
                        if (empty($results['orders'])) {
                            $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            $use_weight = $volumne_weight < $weight ? $weight : $volumne_weight;
                            $results['boxes'][$i]['use_weight'] = $use_weight;
                        } else {
                            usort($results['orders'], function ($a, $b) {
                                return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                            }); //sort orders
                            $getWard = phuongxa::where('MaPhuongXa', ($results['orders'][0]['shipment_infor']['ward_id']))->first(); //get ward
                            $province = $getWard->MaTinhThanh; //ID province
                            $method_shipment = Str::ucfirst($results['orders'][0]['shipment_method_id']);
                            if ($method_shipment == "Air") {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 6000;
                            } else {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            }
                        }
                        $total_volume += round($volumne_weight, 3);
                        $total_weight += round($weight, 3);
                        $results['boxes'][$i]['volume_weight_box'] = round($volumne_weight, 3); //box

                    }
                    if (!empty($results['orders'])) {
                        $fee = $this->calFeeFollowSFA(max($total_weight, $total_volume), $results['sfa'], $province, $method_shipment, $date_default, $date_defaultNew);
                        $results['orders'][0]['total_fee'] =  round($fee['money'] + $results['orders'][0]['insurance_result_fee'] + $results['orders'][0]['special_result_fee'], 0);
                        $results['orders'][0]['pay_money'] = $fee['total_money'];
                        $results['orders'][0]['total_weight'] = $fee['total_weight'];
                        $results['orders'][0]['fee_ship'] = $fee['fee_ship'];
                    }
                } else {
                    for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                        $weight = round($results['boxes'][$i]['weight'], 3);
                        $date_default = strtotime($this->date);
                        $date_defaultNew = strtotime($this->dateDefault);
                        if (empty($results['orders'])) {
                            $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                        } else {
                            usort($results['orders'], function ($a, $b) {
                                return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                            }); //sort orders
                            $getWard = phuongxa::where('MaPhuongXa', ($results['orders'][0]['shipment_infor']['ward_id']))->first(); //get ward
                            $province = $getWard->MaTinhThanh; //ID province
                            $method_shipment = Str::ucfirst($results['orders'][0]['shipment_method_id']);
                            if ($method_shipment == "Air") {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 6000;
                            } else {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            }
                        }
                        $total_volume += round($volumne_weight, 3);
                        $total_weight += round($weight, 3);
                        $results['boxes'][$i]['volume_weight_box'] = round($volumne_weight, 3);
                    }
                    if (!empty($results['orders'])) {
                        $fee = $this->calFeeFollowSFA(max($total_weight, $total_volume), $results['sfa'], $province, $method_shipment, $date_default);
                        $results['orders'][0]['pay_money'] = $fee['total_money'];
                        $results['orders'][0]['total_fee'] =  round($fee['money'] + $results['orders'][0]['insurance_result_fee'] + $results['orders'][0]['special_result_fee'], 0);
                        $results['orders'][0]['total_weight'] = $fee['total_weight'];
                        $results['orders'][0]['fee_ship'] = $fee['fee_ship'];
                    }
                }
            }
            $data['data'][] = $results;
            return $data;
        }
    }
    public function calFeeFollowSFA($weight, $sfa, $province, $method_shipment, $date_default)
    {
        $weight_real = $weight;
        //token
        $dateSFA = date('Y-m-d', intval(strtotime($sfa['created_at'])));
        $data = [
            'conditions[type]' => 'shipping-fee',
            'conditions[shipment-method]' => $method_shipment,
            'conditions[from]' => 'jp',
            'conditions[to]' => $province <= 53 ? 'vn-hn' : 'vn-sg',
            'range' => $weight,
            'timeline' =>  $dateSFA,
        ];
        $call = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Authorization' => 'Bearer ' . $token->access_token
        ])->get('http://warehouse.tomonisolution.com/api/amount-with-conditions', $data);
        $amount = (intval($call->body()));
        $parse_int = strtotime($sfa['created_at']);
        if ($method_shipment == "Air") {
            // check date_box < 15-5-2021
            if ($parse_int < $date_default) {
                if ($weight >= 0 && $weight < 100) {
                    if ($weight < 1) {
                        $weight = 1;
                    }
                    $checkProvince = "price1";
                }
                if ($weight >= 100) {
                    $checkProvince = "price2";
                }
                if ($province <= 53) {
                    if ($checkProvince == "price1") {
                        $money = $weight * 200000;
                        $total_money = number_format($weight * 200000);
                        $fee_ship = number_format(200000);
                    }
                    if ($checkProvince == "price2") {
                        $money = $weight * 190000;
                        $total_money = number_format($weight * 190000);
                        $fee_ship = number_format(190000);
                    }
                }
                if ($province > 53) {
                    if ($checkProvince == "price1") {
                        $money = $weight * 210000;
                        $total_money = number_format($weight * 210000);
                        $fee_ship = number_format(210000);
                    }
                    if ($checkProvince == "price2") {
                        $money = $weight * 200000;
                        $total_money = number_format($weight * 200000);
                        $fee_ship = number_format(200000);
                    }
                }
            } else {
                $money = $weight * $amount;
                $total_money = number_format($weight * $amount);
                $fee_ship = number_format($amount);
            }
        } else {
            //check date_box < 15-5-2021
            if ($parse_int < $date_default) {
                if ($weight < 150) {
                    $price = 65000;
                } else {
                    $price = 60000;
                }
            } else {
                if ($weight < 150) {
                    $price = $amount;
                } else {
                    $price = $amount;
                }
            }
            $money = $weight * $price;
            $total_money = number_format($weight * $price);
            $fee_ship = number_format($price);
        }
        return ['total_money' => $total_money, 'money' => round($money), 'fee_ship' => $fee_ship, 'total_weight' => $weight_real];
    }
    public function getInforBox(Request $req)
    {
        // return $req->all();
        //get token
        $token = token::find(1);
        if (empty($token)) {
            return $this->QCT->getToken();
        }
        //get infor box
        $item_box = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token,
        ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $req->id_box . '?appends=logs');
        if ($item_box->status() == 401) {
            $this->QCT->getToken();
            $token = token::find(1);
            $item_box = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $req->id_box);
        }
        $result_list_item = json_decode($item_box->body(), true);
        $detail_item = array();
        //list item
        // if (!empty($result_list_item['items'])) {
        //     foreach ($result_list_item['items'] as $item) {
        //         $getInfoItem = Http::withHeaders([
        //             'Accept' => 'application/json',
        //             'Authorization' => 'Bearer ' . $token->access_token,
        //             'Accept-Language' => "ja",
        //         ])->get('http://product.tomonisolution.com/api/products/' . $item['product_id']);
        //         if ($getInfoItem->status() == 401) {
        //             $this->QCT->getToken();
        //             $token = token::find(1);
        //             $getInfoItem = Http::withHeaders([
        //                 'Accept' => 'application/json',
        //                 'Authorization' => 'Bearer ' . $token->access_token,
        //                 'Accept-Language' => "ja",
        //             ])->get('http://product.tomonisolution.com/api/products/' . $item['product_id']);
        //         }
        //         if ($getInfoItem->status() == 200) {
        //             $getInfoItem = json_decode($getInfoItem);
        //             $detail_item[] = array(
        //                 'Quantity' => $item['quantity'],
        //                 'Name' => $getInfoItem->name,
        //             );
        //             $result_list_item['items'] = $detail_item;
        //         }
        //     }
        // } else {
        //     $result_list_item['items'] = null;
        // }
        // vnpost
        // if (!empty($result_list_item['boxes']) && !empty($result_list_item['orders'])) {
        //     usort($result_list_item['orders'], function ($a, $b) {
        //         return $b['shipment_infor_id'] - $a['shipment_infor_id'];
        //     }); //sort orders
        //     //vnpost
        //     $arrCheck = ['Nhận tại VP Sóc Sơn', 'Nhận tại VP Đào Tấn', 'Nhận tại VP Tân Bình HCM', 'Nhận tại VP Lạc Long Quân', 'Nhận tại VP Hồ Chí Minh', 'VN Ha Noi', 'VN Sai Gon', 'Văn phòng Hồ Chí Minh', 'Văn phòng Sóc Sơn', 'VP Lạc Long Quân', 'Văn phòng Lạc Long Quân'];
        //     if (!(in_array($result_list_item['orders'][0]['shipment_infor']['address'], $arrCheck))) {
        //         $getWard = phuongxa::where('MaPhuongXa', ($result_list_item['orders'][0]['shipment_infor']['ward_id']))->first(); //get ward
        //         if (!empty($getWard)) {
        //             $provinIdRev = strval($getWard->MaTinhThanh); //province rev ID
        //             $districtIdRev = strval($getWard->MaQuanHuyen); //district rev ID
        //             $provinIdSend = $provinIdRev <= "53" ? "10" : "70"; //province send ID
        //             $districtIdSend = $provinIdSend == "10" ? "1390" : "7600"; //district send ID
        //             $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
        //             for ($i = 0; $i <= count($result_list_item['boxes']) - 1; $i++) {
        //                 $data_vn = array(
        //                     'ReceiverDistrictId' => $districtIdRev,
        //                     'ReceiverProvinceId' => $provinIdRev,
        //                     'SenderDistrictId' => $districtIdSend,
        //                     'SenderProvinceId' => $provinIdSend,
        //                     'Weight' => $result_list_item['boxes'][$i]['weight'] * 1000,
        //                     'Width' => $result_list_item['boxes'][$i]['width'],
        //                     'Length' => $result_list_item['boxes'][$i]['length'],
        //                     'Height' => $result_list_item['boxes'][$i]['height'],
        //                     'CodAmount' => 1,
        //                     'IsReceiverPayFreight' => false,
        //                     'OrderAmount' => 0,
        //                     'UseBaoPhat' => true,
        //                     'UseHoaDon' => true,
        //                     'CustomerCode' => '0843211234C333345',
        //                 );
        //                 $postdata = json_encode($data_vn);
        //                 $ch = curl_init($url);
        //                 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //                 curl_setopt($ch, CURLOPT_POST, 1);
        //                 curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        //                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //                 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        //                 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'h-token:eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJTb0RpZW5UaG9haSI6IjA5NDMyMTEyMzQiLCJFbWFpbCI6bnVsbCwiTWFDUk0iOm51bGwsIkV4cGlyZWRUaW1lIjo2NDA1Mjg0NzQ1NzQ4NS45NjksIlJvbGVzIjpbOTk5LDExLDEzXSwiTmd1b2lEdW5nSWQiOiI4YWQ1Y2ZkYi1lMWRjLTRlZjItODIyZS1jMDQ1Yjc5OTM0YzgiLCJNYVRpbmhUaGFuaCI6IjcwIiwiVGVuTmd1b2lEdW5nIjoixJDhu5FpIHTDoWMgY2h1bmciLCJOZ2F5VGFvVG9rZW4iOiJcL0RhdGUoMTYwMTg2NTQ1NzQ4NSlcLyIsIlRpbWVMYXN0UmVhZENvbW1lbnQiOm51bGwsIk1hQnV1Q3VjIjpudWxsLCJNYVRpbmhUaGFuaFF1YW5MeSI6bnVsbCwiQ1JNX0VtcGxveWVlSWQiOm51bGwsIk5nYXlUYW9Ub2tlblRpbWVTdGFtcCI6MTYwMTg2NTQ1NzQ4NX0.KqZh4Ngu0g3APXNs1BEWu_JwoBQa_upj5An9SF_FASFvpWaU-ElacBRtAZ8Ybw4JeNsUrYd0fpgYhouGr6MT7d5Jb9rbaaIRQR4Mqdgpar7V30UuLR1nCvjCXhiSk8FLiFxtExHXjYUB0rOeyCmYpnN_gXvLQpS-iYHvky7qXro'));
        //                 $result_vnpost_list = curl_exec($ch); //result of VNPOST
        //                 curl_close($ch);
        //                 $arr = json_decode($result_vnpost_list, true);
        //                 // dd($arr);
        //                 if ($arr != null) {
        //                     if (($provinIdRev == 10) || ($provinIdRev == 70)) {
        //                         $TongCuocSauVAT = $arr[0]['TongCuocSauVAT'];
        //                         $CuocCOD = $arr[0]['CuocCOD'];
        //                         $PhuongThucVC = 'Chuyển Nhanh';
        //                     } else {
        //                         $TongCuocSauVAT = $arr[1]['TongCuocSauVAT'];
        //                         $CuocCOD = $arr[1]['CuocCOD'];
        //                         $PhuongThucVC = 'Chuyển Chậm';
        //                     }
        //                     $results_vnpost = array(
        //                         'MaDichVu' => 'BƯU ĐIỆN',
        //                         'TongCuocSauVAT' => number_format($TongCuocSauVAT),
        //                         'CuocCOD' => number_format($CuocCOD),
        //                         'SoTienCodThuNoiNguoiNhan' => number_format($CuocCOD + $TongCuocSauVAT),
        //                         'PhuongThucVC' => $PhuongThucVC,
        //                     );
        //                     $result_list_item['boxes'][$i]['vnpost'] = $results_vnpost;
        //                 }
        //             }
        //         }
        //     }
        // }
        return $result_list_item;
    }
}
