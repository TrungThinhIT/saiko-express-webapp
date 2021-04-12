<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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
    public function refAppp(Request $request)
    {
        $date = date('20y-m-d');
        $checkTracking = Tracking_User::whereDate('Date_Creat', $date)->select('tracking_number', 'Date_Creat')->first();
        if (!empty($checkTracking)) {
            $tracking = $checkTracking->Tracking_number;
            return $tracking;
        }
    }
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
                $this->getToken();
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
                $this->getToken();
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
            }
            $temp["Result"] = $collect;
            return response()->json($temp);
        }
        //getListSku
        // if($)

    }
    public function GetInfoTicket(Request $request)
    {
        $codeTicket = $request->GetInfoTicket;
    }
    //createTracking
    public function appCreateTracking(Request $request)
    {
        //get id district
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
            $this->getToken();
        }
        $token = token::find(1);
        $api = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ])->post('http://order.tomonisolution.com/api/shipment-infors', [
            'consignee' => $request->receiver_name,
            'tel' => strval($request->receiver_phone_number), //sdt ng nhận
            'address' => strval($catchuoi[0]),
            'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
        ]);
        //xác thực 
        if ($api->status() == 401) {
            $this->getToken();
            $token = token::find(1)->access_token;
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com/api/shipment-infors', [
                'consignee' => $request->receiver_name,
                'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                'address' => strval($catchuoi[0]),
                'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
            ]);
        }
        $data = json_decode($api->body(), true);
        
        $arrTracking = $request->tracking_number;
        foreach ($arrTracking as $item) {
            $item_number = $item;
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
            //createTrackin
            $create_shipment = $create_shipment->post('http://order.tomonisolution.com/api/orders', [
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
        }
        $temp["Result"] = $collect;
        return response()->json($temp);
    }
    //getProvinc
    public function getProvince(Request $request)
    {
        if (!isset($request->ReadTP)) {
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
    }
    //get district by province
    public function getDistrict(Request $request)
    {
        $id_province = $request->Province;
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
        // $data = [
        //     'with' => 'districts'
        // ];
        // $apiDistrict = Http::withHeaders([
        //     'Accept' => 'application/json',
        // ])->get('http://notification.tomonisolution.com:82/api/provinces/' . $id_province, $data);
        // return $apiDistrict->body();
    }
    //get ward by district
    public function getWard(Request $request)
    {
        $id_district = $request->District;
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
}
