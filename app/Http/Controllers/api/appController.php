<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Request_Tracking\QuoteController;
use App\Models\Tracking_User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\tinhthanh;
use App\Models\quanhuyen;
use App\Models\phuongxa;
use App\Models\token;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class appController extends Controller
{
    public function __construct(QuoteController $QCT)
    {
        $this->QCT = $QCT;
    }
    //kiểm tra cổng trước khi upfile
    public function refAppp(Request $request)
    {
        $date = date('20y-m-d');
        $checkTracking = Tracking_User::whereDate('Date_Creat', $date)->select('tracking_number', 'Date_Creat')->first();
        if (!empty($checkTracking)) {
            $tracking = $checkTracking->Tracking_number;
            return $tracking;
        }
    }
    //kiểm tra cổng trước khi upfile
    public function allFunction(Request $request)
    {
        //getPrice
        $check = Str::contains($request->fullUrl(), 'GetPrice');
        if ($check) {
            // $GetPrice = $request->GetPrice;
            // $Method = $request->Method;
            // $PriceDec = $request->Price_declaration;
            $collect = array(
                "Air" => "200.000",
                "Sea" => "55.000",
                "Machining" => "55.000",
                "Price declaration" => "8.000.000",
                "Insurrance" => "5"
            );
            return response()->json($collect);
        }
        //get province
        $checkProvince = Str::contains($request->fullUrl(), 'ReadTP');
        if ($checkProvince) {
            $allProvince = tinhthanh::all();
            foreach ($allProvince as $row) {
                $collect[] = array(
                    "Matp" => $row->MaTinhThanh,
                    "Title" => $row->TenTinhThanh,
                    "TypeTP" => $row->Id,
                );
            }
            $temp["Yar"] = $collect;
            return response()->json($temp);
        }
        //getdisstrict
        if ($id_province = $request->Province) {
            $allDistrictByProvince = quanhuyen::where('MaTinhThanh', $id_province)->get();
            foreach ($allDistrictByProvince as $row) {
                $results[] = array(
                    'Maqh' => $row->MaQuanHuyen,
                    'Title' =>  $row->TenQuanHuyen,
                    'TypeQH' => $row->Id,
                    'MTatp' =>  $row->MaTinhThanh,
                    'Innercity' =>  $row->Noi_Thanh,
                );
            }
            $temp["Province"] = $results;
            return response()->json($temp);
        }
        //getward
        if ($id_district = $request->District) {
            $allWardsByDistricts = phuongxa::where('MaQuanHuyen', $id_district)->get();
            foreach ($allWardsByDistricts as $row) {
                $results[] = array(
                    'Xaid' => $row['MaPhuongXa'],
                    'Title' => $row['TenPhuongXa'],
                    'TypeDis' => $row['Id'],
                    'Maqh' => $row['MaQuanHuyen'],
                );
            }
            $temp["District"] = $results;
            return response()->json($temp);
        }
        //createTrackingApp
        if ($arrTracking = $request->tracking_number) {
            $code_add = $request->Code_Add;
            $id_district = explode(",", $code_add)[0];
            //get id province
            $id_province = explode(",", $code_add)[1];
            //get id ward
            $address = $request->detail_address;
            $catchuoi = (explode(",", $address));
            $xa = explode(".", $catchuoi[1]);
            $trimXa = Str::of($xa[0])->trim();
            $d = explode(" ", $trimXa);
            if ($d[0] == "Phường" || $d[0] == "Xã") {
                $slice = Str::of($xa[0])->after($d[0]);
            }
            $ward = Str::of($slice)->trim();
            $getIdWard = phuongxa::where('TenPhuongXa', 'like', '%' . $xa[0] . '%')->where('MaTinhThanh', $id_province)->where('MaQuanHuyen', $id_district)->first();
            if (!empty($getIdWard)) {
                $ward_id = $getIdWard->MaPhuongXa;
            } else {
                $ward_id = "13900";
            }
            // $d = explode(" ", $address[0]);
            //create shipment_info
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
            }
            $token = token::find(1);
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                'consignee' => $request->receiver_name,
                'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                'address' => strval($catchuoi[0]),
                'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
            ]);
            //xác thực 
            if ($api->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1)->access_token;
                $api = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->post('http://order.tomonisolution.com/api/shipment-infors', [
                    'consignee' => $request->receiver_name,
                    'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                    'address' => strval($catchuoi[0]),
                    // 'province_id' => $id_province, //$request->utypeadd == "blank" ? $request->province : "70",
                    // 'district_id' => $id_district, //$request->utypeadd == "blank" ? $request->district : "7360",
                    'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
                ]);
            }
            $data = json_decode($api->body(), true);
            // return  $data;
            //create shipment
            // return $request->all();
            foreach ($arrTracking as $item) {
                $item_number = $item;
                // $arr[] = ['id' => strval($item), 'expected_delivery' => Carbon::now()->addDays(10)->toDateString()];
                $item = array('id' => strval($item));
                $arr_item = array($item);
                $item_tracking = json_encode($arr_item);
                //note
                $create_shipment = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ]);
                //tạo shipment_order
                $donggoi = $request->isPackaged == false ? "không" : "có";
                $note = json_encode(['send_name' => $request->sender_name, 'send_phone' => $request->sender_phone_number, 'isPackaged' => $donggoi, 'note' => $request->note]);
                //createTrackinf
                $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
                    'shipment_method_id' =>  $request->shipping_method, //đường vận chuyển
                    'shipment_infor_id' => $data['id'], //lấy id của shipment_info
                    'type' => 'shipment',
                    'trackings' => $item_tracking, //danh sách tracking
                    'note' => $note,
                ]);
                //check status
                if ($create_shipment->status() == 201) {
                    $collect[] = array(
                        "Success" => true,
                        "Code" => $item_number,
                        "Mesenger" => 'Create Tracking OK!'
                    );
                } else if ($create_shipment->status() == 422) {
                    $collect[] = array(
                        "Success" => false,
                        "Code" => $item_number,
                        "Mesenger" => 'Fail! Tracking already exists.'
                    );
                }
                sleep(0.8);
            }
            $temp["Result"] = $collect;
            return response()->json($temp);
        }
        //getListSku done
        if ($tracking = $request->GetlistSKU) {
            $sendRela = ['appends' => 'boxes'];
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
            }
            $token = token::find(1);
            $data = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ]);
            $data = $data->get('http://order.tomonisolution.com/api/trackings/' . $tracking, $sendRela);
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ]);
                $data = $data->get('http://order.tomonisolution.com/api/trackings/' . $tracking, $sendRela);
            }
            if ($data->status() == 200) {
                $data = json_decode($data->body(), true);
                if (count($data['boxes'])) {
                    foreach ($data['boxes'] as $item) {
                        $collect[] = $item['id'];
                    }
                    $temp["ListSKU"] = $collect;
                    return response()->json($temp);
                } else {
                    $temp["ListSKU"] = array();
                    return response()->json($temp);
                }
            }
        }
        //getInForSKU done
        if ($skuSearch = $request->SearchInfoSKU) {
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
            }
            $token = token::find(1);
            $data  = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->get('http://warehouse.tomonisolution.com/api/boxes/' . $skuSearch . '?with=items');
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data  = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://warehouse.tomonisolution.com/api/boxes/' . $skuSearch . '?with=items');
            }
            if ($data->status() == 200) {
                $data = json_decode($data->body(), true);
                $getTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://order.tomonisolution.com/api/trackings/' . $data['sfa']['tracking'] . '?appends=boxes&with=orders.shipmentInfor');
                $inForTracking = json_decode($getTracking->body(), true);
                //sắp xếp mảng  theo shipmentInfo
                if (!empty($inForTracking["orders"])) {
                    $sortByShimpent_id = usort($inForTracking['orders'], function ($a, $b) {
                        return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                    });
                    $notes = json_decode($inForTracking['orders'][0]['note']);
                    $collect[] = array(
                        "SKU" => $skuSearch,
                        "Can_Nang" =>  $data['weight'],
                        "Tracking_number" => $data['sfa']['tracking'],
                        "Uname_Send" => $notes->send_name,
                        "Number_Send" => $notes->send_phone,
                        "Uname_Rev" => $inForTracking["orders"][0]['shipment_infor']['consignee'],
                        "Number_Rev" => $inForTracking["orders"][0]['shipment_infor']['tel'],
                        "Add_Rev" => $inForTracking["orders"][0]['shipment_infor']['full_address'],
                        "Note_Rev" => $notes->note,
                        "Reparking" => $notes->isPackaged,
                        "ShipMethod" => $inForTracking["orders"][0]['shipment_method_id'],
                        "CODPriceJP" => 'Chưa có cột này',
                        "CODPriceVN" => false,
                    );
                } else {
                    $collect = array();
                }
                //item
                if (!empty($data['items'])) {
                    foreach ($data['items'] as $item) {
                        $getInfoItem = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer ' . $token->access_token
                        ])->get('http://product.tomonisolution.com/api/products/' . $item['product_id']);
                        if ($getInfoItem->status() == 401) {
                            $this->QCT->getToken();
                            $token = token::find(1);
                            $getInfoItem = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Authorization' => 'Bearer ' . $token->access_token
                            ])->get('http://product.tomonisolution.com/api/products/' . $item['product_id']);
                        }
                        if ($getInfoItem->status() == 200) {
                            $getInfoItem = json_decode($getInfoItem);
                            $cu[] = array(
                                'Quantity' => $item['quantity'],
                                'Name' => $getInfoItem->name
                            );
                        }
                    }
                } else {
                    $cu[] = array();
                }
                //tracking
                $trackinfo = array();
                $tracking = $request->Trackingnumber;
                $dataSend = ['appends' => 'boxes', 'with' => 'orders'];
                $getTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://order.tomonisolution.com/api/trackings/' . $tracking, $dataSend);
                if ($getTracking->status() == 200) {
                    $getTracking = json_decode($getTracking->body(), true);
                    dd($getTracking);
                    if (!empty($getTracking['boxes'])) {
                        foreach ($getTracking['boxes'] as $box) {
                            if (!empty($box['logs'])) {
                                foreach ($box['logs'] as $log) {
                                    $content = json_decode($log['content'], true);
                                    $content2 = implode(array_keys($content));
                                    if ($content2 == "id") {
                                        $status = "Đã nhập kho Nhật";
                                    }
                                    if ($content2 == "in_pallet") {
                                        $status = "Đã kiểm hàng";
                                    }
                                    if ($content2 == "set_owner_id,set_owner_type") {
                                        $status = "Lên đơn hàng";
                                    }
                                    if ($content2 == "in_container") {
                                        $status = "Lên container";
                                    }
                                    if ($content2 == "out_container") {
                                        $status = "Xuống container";
                                    }
                                    if ($content2 == "delivery_status") {
                                        if ($content['delivery_status'] == "shipping") {
                                            $status = "Đang giao hàng";
                                        }
                                    }
                                    if ($content2 == "delivery_status") {
                                        if ($content['delivery_status'] == "cancelled") {
                                            $status = "Hủy box";
                                        }
                                    }
                                    if ($content2 == "delivery_status") {
                                        if ($content['delivery_status'] == "received") {
                                            $status = "Đã nhận hàng";
                                        }
                                    }
                                    if ($content2 == "delivery_status") {
                                        if ($content['delivery_status'] == "refunded") {
                                            $status = "Trả lại hàng";
                                        }
                                    }
                                    if ($content2 == "delivery_status") {
                                        if ($content['delivery_status'] == "waiting_shipment") {
                                            $status = "Đợi giao hàng";
                                        }
                                    }
                                }
                                $trackinfo[] = array(
                                    'Date_line' => $log['created_at'],
                                    'StatusTrack' => $status,
                                    'StatusTrack' => $status,
                                );
                            }
                        }
                    } else {
                        $trackinfo = [];
                    }
                    $temp["InfoSKU"] = $collect;
                    $temp["Detail"] = $cu;
                    $temp["Timeline"] = $trackinfo;
                    return response()->json($temp);
                }
            }
        }
        //SKUInfo done
        if ($sku = $request->SKUInfo) {
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
            }
            $token = token::find(1);
            $data  = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->get('http://warehouse.tomonisolution.com/api/boxes/' . $sku);
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data  = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://warehouse.tomonisolution.com/api/boxes/' . $sku);
            }
            //check SKU
            if ($data->status() == 200) {
                $data = json_decode($data->body(), true);
                $getTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://order.tomonisolution.com/api/trackings/' . $data['sfa']['tracking'] . '?appends=boxes&with=orders.shipmentInfor');
                if ($getTracking->status() == 200) {
                    $inFortracking = json_decode($getTracking->body(), true);
                    //sắp xếp mảng  theo shipmentInfo
                    $sortByShimpent_id = usort($inFortracking['orders'], function ($a, $b) {
                        return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                    });
                    //
                    $getByWardId = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token->access_token
                    ])->get('http://notification.tomonisolution.com/api/wards/' . $inFortracking['orders'][0]['shipment_infor']['ward_id'] . '?with=district.province');
                    $getByWardId = json_decode($getByWardId->body(), true);
                    if (($getByWardId['district']['province']['id']) > 32) {
                        $SendDisc = "7360";
                        $ProSend = "70";
                    } else {
                        $SendDisc = "1390";
                        $ProSend = "10";
                    }
                    $results = [
                        'SKU' => $data['id'],
                        'CanNang' => $data['weight'] * 1000,
                        'ChieuCao' =>  $data['height'],
                        'ChieuRong' =>  $data['width'],
                        'ChieuDai' =>  $data['length'],
                        'DistricRev_Code' =>  $getByWardId['district']['id'],
                        'ProvinceRev_Code' =>  $getByWardId['district']['province']['id'],
                        'DistricSend_Code' => $SendDisc,
                        'ProvinceSend_Code' => $ProSend
                    ];
                    return response()->json($results);
                }
            }
        }
        //tính COD app done
        $checkCostShipVN = Str::contains($request->fullUrl(), 'CostShipVN');
        if ($checkCostShipVN) {
            $Weight = $request->Weight;
            $Height = $request->Height;
            $Width = $request->Width;
            $Length = $request->Length;
            $SenderDistrictId = $request->SenderDistrictId;
            $SenderProvinceId = $request->SenderProvinceId;
            $ReceiverDistrictId = $request->ReceiverDistrictId;
            $ReceiverProvinceId = $request->ReceiverProvinceId;
            $IsReceiverPayFreight = $request->IsReceiverPayFreight;
            $CodAmount = $request->CodAmount;
            $OrderAmount = $request->CodAmount;

            $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
            $data = array(
                'SenderDistrictId' => $SenderDistrictId,
                'SenderProvinceId' => $SenderProvinceId,
                'ReceiverDistrictId' => $ReceiverDistrictId,
                'ReceiverProvinceId' => $ReceiverProvinceId,
                'Weight' => $Weight,
                'Width' => $Width,
                'Length' => $Length,
                'Height' => $Height,
                'CodAmount' => $CodAmount,
                'IsReceiverPayFreight' => $IsReceiverPayFreight,
                'OrderAmount' => $OrderAmount,
                'UseBaoPhat' => true,
                'UseHoaDon' => true,
                'CustomerCode' => '0843211234C333345'
            );

            $postdata = json_encode($data);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'h-token:eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJTb0RpZW5UaG9haSI6IjA5NDMyMTEyMzQiLCJFbWFpbCI6bnVsbCwiTWFDUk0iOm51bGwsIkV4cGlyZWRUaW1lIjo2NDA1Mjg0NzQ1NzQ4NS45NjksIlJvbGVzIjpbOTk5LDExLDEzXSwiTmd1b2lEdW5nSWQiOiI4YWQ1Y2ZkYi1lMWRjLTRlZjItODIyZS1jMDQ1Yjc5OTM0YzgiLCJNYVRpbmhUaGFuaCI6IjcwIiwiVGVuTmd1b2lEdW5nIjoixJDhu5FpIHTDoWMgY2h1bmciLCJOZ2F5VGFvVG9rZW4iOiJcL0RhdGUoMTYwMTg2NTQ1NzQ4NSlcLyIsIlRpbWVMYXN0UmVhZENvbW1lbnQiOm51bGwsIk1hQnV1Q3VjIjpudWxsLCJNYVRpbmhUaGFuaFF1YW5MeSI6bnVsbCwiQ1JNX0VtcGxveWVlSWQiOm51bGwsIk5nYXlUYW9Ub2tlblRpbWVTdGFtcCI6MTYwMTg2NTQ1NzQ4NX0.KqZh4Ngu0g3APXNs1BEWu_JwoBQa_upj5An9SF_FASFvpWaU-ElacBRtAZ8Ybw4JeNsUrYd0fpgYhouGr6MT7d5Jb9rbaaIRQR4Mqdgpar7V30UuLR1nCvjCXhiSk8FLiFxtExHXjYUB0rOeyCmYpnN_gXvLQpS-iYHvky7qXro'));
            $result = curl_exec($ch);
            curl_close($ch);
            $arr = json_decode($result, true);
            if (($ReceiverProvinceId == 10) || ($ReceiverProvinceId == 70)) {
                $TongCuocSauVAT = $arr[0]['TongCuocSauVAT'];
                $CuocCOD = $arr[0]['CuocCOD'];
                $PhuongThucVC = 'Chuyển Nhanh';
            } else {
                $TongCuocSauVAT = $arr[1]['TongCuocSauVAT'];
                $CuocCOD = $arr[1]['CuocCOD'];
                $PhuongThucVC = 'Chuyển Chậm';
            }
            $results = array(
                'MaDichVu' => 'BƯU ĐIỆN',
                'TongCuocSauVAT' => $TongCuocSauVAT,
                'CuocCOD' => $CuocCOD,
                'CuocKhaiGia' => 0,
                'TongCuocDichVuCongThem' => 0,
                'TienVC_NhatViet' => 0,
                'SoTienCodThuNoiNguoiNhan' => $CuocCOD + $TongCuocSauVAT,
                'PhuongThucVC' => $PhuongThucVC
            );
            return response()->json($results);
            echo json_encode($results, JSON_UNESCAPED_UNICODE);
        }
        //COD CHange
        if (isset($_GET['COD_Change'])) {
            $Tracking = $request->Tracking;
            $SKU = $request->SKU;
            $PriceCODVN = $request->PriceCODVN;
            $Respone['Success'] = true;
            $Respone['Code'] = '0H';
            $Respone['Mesenger'] = 'OK';
            return response()->json($Respone);
        }
        // get list area done
        if (isset($_GET['GetlistArea'])) {
            //$Mac_add = $_GET['GetlistArea'];
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
            }
            $token = token::find(1);
            $data =  Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->get('http://warehouse.tomonisolution.com/api/areas');
            $data = json_decode($data->body());
            foreach ($data as $row) {
                $collect[] = array(
                    'Id' => $row->id,
                    'Area' => $row->name
                );
            }
            $temp["ListArea"] = $collect;
            return response()->json($temp);
        }
    }
}
