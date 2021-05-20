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
            'appends' => 'boxes.owners;logs',
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
            if (!empty($results['boxes'])) {
                //list item & volumne
                $pay_money_order = 0;
                if (count($results['boxes']) == 1) {
                    for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                        // $item_box = Http::withHeaders([
                        //     'Accept' => 'application/json',
                        //     'Authorization' => 'Bearer ' . $token->access_token,
                        // ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $results['boxes'][$i]['id'] );
                        // if ($item_box->status() == 401) {
                        //     $this->QCT->getToken();
                        //     $token = token::find(1);
                        //     $item_box = Http::withHeaders([
                        //         'Accept' => 'application/json',
                        //         'Authorization' => 'Bearer ' . $token->access_token,
                        //     ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $results['boxes'][$i]['id'] );
                        // }
                        // $result_list_item = json_decode($item_box->body(), true);
                        // $detail_item = array();
                        //list item
                        // if (!empty($result_list_item['items'])) {
                        //     foreach ($result_list_item['items'] as $item) {
                        //         $getInfoItem = Http::withHeaders([
                        //             'Accept' => 'application/json',
                        //             'Authorization' => 'Bearer ' . $token->access_token,
                        //             'Accept-Language' => "ja",
                        //         ])->get('http://product.tomonisolution.com:82/api/products/' . $item['product_id']);
                        //         if ($getInfoItem->status() == 401) {
                        //             $this->QCT->getToken();
                        //             $token = token::find(1);
                        //             $getInfoItem = Http::withHeaders([
                        //                 'Accept' => 'application/json',
                        //                 'Authorization' => 'Bearer ' . $token->access_token,
                        //                 'Accept-Language' => "ja",
                        //             ])->get('http://product.tomonisolution.com:82/api/products/' . $item['product_id']);
                        //         }
                        //         if ($getInfoItem->status() == 200) {
                        //             $getInfoItem = json_decode($getInfoItem);
                        //             $detail_item[] = array(
                        //                 'Quantity' => $item['quantity'],
                        //                 'Name' => $getInfoItem->name,
                        //             );
                        //             $results['boxes'][$i]['items'] = $detail_item;
                        //         }
                        //     }
                        // } else {
                        //     $results['boxes'][$i]['items'] = null;
                        // }
                        // volumne
                        $weight = $results['boxes'][$i]['weight_per_box'];
                        $date_box = Carbon::parse($results['boxes'][$i]['created_at']);
                        $date_box = strtotime(($date_box));
                        $date_default = strtotime($this->date);
                        if (empty($results['orders'])) {
                            $volumne_weight = $results['boxes'][$i]['volume_per_box'] / 3500;
                            $use_weight = $volumne_weight < $weight ? $weight : $volumne_weight;
                            $results['boxes'][$i]['total_money'] = '';
                            $results['boxes'][$i]['use_weight'] = $use_weight;
                            $results['boxes'][$i]['fee_ship'] = '';
                        } else {
                            usort($results['orders'], function ($a, $b) {
                                return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                            }); //sort orders
                            $getWard = phuongxa::where('MaPhuongXa', ($results['orders'][0]['shipment_infor']['ward_id']))->first(); //get ward
                            $province = $getWard->MaTinhThanh; //ID province
                            $method_shipment = Str::ucfirst($results['orders'][0]['shipment_method_id']);
                            if ($method_shipment == "Air") {
                                $volumne_weight = $results['boxes'][$i]['volume_per_box'] / 6000;
                                if ($date_box >= $date_default) {
                                    $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                                    if ($use_weight >= 0 && $use_weight < 100) {
                                        $checkProvince = "price1";
                                    }
                                    if ($use_weight >= 100 && $use_weight < 500) {
                                        $checkProvince = "price2";
                                    }

                                    if ($province <= 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 190000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 190000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(190000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 185000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 185000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(185000);
                                        }
                                    }
                                    if ($province > 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 200000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 200000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(200000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 195000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 195000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(195000);
                                        }
                                    }
                                    $pay_money_order += $money;
                                    $results['boxes'][$i]['use_weight'] = $use_weight;
                                }
                                if ($date_box < $date_default) {
                                    $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                                    if ($use_weight >= 0 && $use_weight < 100) {
                                        $checkProvince = "price1";
                                    }
                                    if ($use_weight >= 100 && $use_weight < 500) {
                                        $checkProvince = "price2";
                                    }
                                    if ($province <= 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 200000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 200000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(200000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 190000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 190000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(190000);
                                        }
                                    }
                                    if ($province > 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 210000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 210000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(210000);
                                            
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 200000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 200000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(200000);
                                        }
                                    }
                                    $pay_money_order += $money;
                                    $results['boxes'][$i]['use_weight'] = $use_weight ?? '';
                                }
                            } else {
                                $volumne_weight = $results['boxes'][$i]['volume_per_box'] / 3500;
                                $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                                if ($use_weight < 150) {
                                    $price = 65000;
                                } else {
                                    $price = 60000;
                                }
                                $money = $use_weight * $price;
                                $pay_money_order += $money;
                                $results['boxes'][$i]['total_money'] = number_format($use_weight * $price);
                                $results['boxes'][$i]['fee_ship'] = number_format($price);
                                $results['boxes'][$i]['use_weight'] = $use_weight;
                            }
                            $results['orders'][0]['pay_money'] = number_format($pay_money_order);
                        }
                        $results['boxes'][$i]['volumne_weight_box'] = $volumne_weight;
                    }
                } else {
                    for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                        $weight = $results['boxes'][$i]['weight_per_box'];
                        if (empty($results['orders'])) {
                            $volumne_weight = $results['boxes'][$i]['volume_per_box'] / 3500;
                            $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                            $results['boxes'][$i]['total_money'] = '';
                            $results['boxes'][$i]['use_weight'] = $use_weight;
                            $results['boxes'][$i]['fee_ship'] = '';
                        } else {
                            usort($results['orders'], function ($a, $b) {
                                return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                            }); //sort orders
                            $getWard = phuongxa::where('MaPhuongXa', ($results['orders'][0]['shipment_infor']['ward_id']))->first(); //get ward
                            $province = $getWard->MaTinhThanh; //ID province
                            $method_shipment = Str::ucfirst($results['orders'][0]['shipment_method_id']);
                            $weight = $results['boxes'][$i]['weight_per_box'];
                            if ($method_shipment == "Air") {
                                $volumne_weight = $results['boxes'][$i]['volume_per_box'] / 6000;
                                //check date_box < 15-5-2021
                                $date_box = Carbon::parse($results['boxes'][$i]['created_at']);
                                $date_box = strtotime(($date_box));
                                $date_default = strtotime($this->date);
                                if ($date_box >= $date_default) {
                                    $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                                    if ($use_weight >= 0 && $use_weight < 100) {
                                        $checkProvince = "price1";
                                    }
                                    if ($use_weight >= 100 && $use_weight < 500) {
                                        $checkProvince = "price2";
                                    }
                                    if ($province <= 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 190000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 190000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(190000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 185000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 185000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(185000);
                                        }
                                    }
                                    if ($province > 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 200000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 200000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(200000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 195000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 195000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(195000);
                                        }
                                    }
                                    $results['boxes'][$i]['use_weight'] = $use_weight ?? '';
                                }
                                if ($date_box < $date_default) {
                                    $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                                    if ($use_weight >= 0 && $use_weight < 100) {
                                        $checkProvince = "price1";
                                    }
                                    if ($use_weight >= 100 && $use_weight < 500) {
                                        $checkProvince = "price2";
                                    }
                                    if ($province <= 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 200000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 200000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(200000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 190000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 190000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(190000);
                                        }
                                    }
                                    if ($province > 53) {
                                        if ($checkProvince == "price1") {
                                            $money = $use_weight * 210000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 210000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(210000);
                                        }
                                        if ($checkProvince == "price2") {
                                            $money = $use_weight * 200000;
                                            $results['boxes'][$i]['total_money'] = number_format($use_weight * 200000);
                                            $results['boxes'][$i]['fee_ship'] = number_format(200000);
                                        }
                                    }
                                    $results['boxes'][$i]['use_weight'] = $use_weight ?? '';
                                }
                            } else {
                                $volumne_weight = $results['boxes'][$i]['volume_per_box'] / 3500;
                                $use_weight = round($volumne_weight < $weight ? $weight : $volumne_weight, 3);
                                if ($use_weight < 150) {
                                    $price = 65000;
                                } else {
                                    $price = 60000;
                                }
                                $money = $use_weight * $price;
                                $results['boxes'][$i]['total_money'] = number_format($use_weight * $price);
                                $results['boxes'][$i]['fee_ship'] = number_format($price);
                                $results['boxes'][$i]['use_weight'] = $use_weight ?? '';
                            }
                            $pay_money_order += $money;
                            $results['orders'][0]['pay_money'] = number_format($pay_money_order);
                        }
                        $results['boxes'][$i]['volumne_weight_box'] = $volumne_weight;
                    }
                }
            }

            $data['data'][] = $results;
            return $data;
        }
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
        //         ])->get('http://product.tomonisolution.com:82/api/products/' . $item['product_id']);
        //         if ($getInfoItem->status() == 401) {
        //             $this->QCT->getToken();
        //             $token = token::find(1);
        //             $getInfoItem = Http::withHeaders([
        //                 'Accept' => 'application/json',
        //                 'Authorization' => 'Bearer ' . $token->access_token,
        //                 'Accept-Language' => "ja",
        //             ])->get('http://product.tomonisolution.com:82/api/products/' . $item['product_id']);
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
        //                     'Weight' => $result_list_item['boxes'][$i]['weight_per_box'] * 1000,
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
