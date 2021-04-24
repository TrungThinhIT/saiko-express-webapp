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
use Illuminate\Support\Facades\Log;

class appController extends Controller
{
    public function __construct(QuoteController $QCT)
    {
        $this->QCT = $QCT;
    }
    //kiểm tra cổng trước khi upfile
    public function createTracking(Request $request)
    {
        Log::info("app", ['tess' => $request->all()]);
        //create Tracking
        if ($arrTracking = $request->tracking_number) {

            Log::info("test", ['tess' => $request->all()]);
            if ($request->detail_address != "VN Sai Gon" && $request->detail_address != "VN Ha Noi") {
                $code_add = $request->Code_Add;
                $id_district = explode(",", $code_add)[0];
                //get id province
                $id_province = explode(",", $code_add)[1];
                //get id ward
                $address = $request->detail_address;
                $catchuoi = (explode(",", $address));
                $xa = explode(".", $catchuoi[1]);
                $trimXa = Str::of($xa[0])->trim();
                $getWard = explode(" ", $trimXa);
                $add=strval($catchuoi[0]);
                if ($getWard[0] == "Phường" || $getWard[0] == "Xã") {
                    $slice = Str::of($xa[0])->after($getWard[0]);
                    $ward = Str::of($slice)->trim();
                } else {
                    $ward = $trimXa;
                }
                $getIdWard = phuongxa::where('TenPhuongXa', 'like', '%' . $ward . '%')->where('MaTinhThanh', $id_province)->where('MaQuanHuyen', $id_district)->first();
                if (!empty($getIdWard)) {
                    $ward_id = $getIdWard->MaPhuongXa;
                } else {
                    $ward_id = "13900";
                }
            }
            if ($request->detail_address == "VN Ha Noi") {
                $add = "VN Ha Noi";
                $ward_id = "13900";
            } else {
                $add = "Vn Sai Gon";
                $ward_id = "76000";
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
                'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNTU3M2JiZWZlMDJiMmIyNDI4NGY4ZDJlNzdjMzVkZjVlMjYxNDE4MDFjYjkwNWZiNDc3NGQxZDk3MmY5M2QzM2E2OTI1NzhhMzRmMDExODIiLCJpYXQiOjE2MTkyMzY1ODMsIm5iZiI6MTYxOTIzNjU4MywiZXhwIjoxNjIwNTMyNTgzLCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.HMbraYZAUC8Z0bITP1b_eWK5mZh54MEqMua2V_sSYlHqV52t3UFLXuRn5KPnIhAJgm4M1osnJgi1PxbANAuOxQMlFKu0u0ioFUB8TLyZNIcNivHe1s0sD0OPdOk35djKLWWi50v4sqLLZ_2JeRMK8n2cdi9DOkeAfjQAtkyTEhWzipV28DV_QRcWdqch5GtXjF9v3AO14c1WxH_6ZIYZsWaqkOiV9zN-N1ncWwufoJgl62FKDui0aiIAcBaobpHgtiOcYqtG2XKoSj8FoS6TrZvikc9Cx4Ppmba8czabXomHYmK5in9AZm16muTeOv39FlxZE2MuQLmHnw4zaIw7uJmGagGs3MFFdbOtFEsIrHLx3Bi4OWCXuJSEA0rHfL9uDQk45miEYm2tSZS19TX6iz_tf_2LPKMkRL5psthujoS1SIjLJCmw9hJzRES1ZljIMDADJ9QBFX-tD5cEux60ZsM4F-HU-uRmu6skhEY7uAWTx1ZshF5cneHtFpI-vx0JQNzjCb3FFexD22Z9n1b_NH9q_M3TnLDwgkZqa8E1bjWntzC2lzszCf1ctjGmUAo4_TWM-Yy2HERdjQ1wcCCYT8c7D8dvPiT0M0uyMZ0mAORoYQ6QcbE0L72cNBNH6fsuQjbDIpA9CJ4heG9jY0zsotQuiXSBfWX9H41ga0vnl5M' //$token->access_token
            ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                'consignee' => $request->receiver_name,
                'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                'address' => $add,
                'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
            ]);
            //xác thực 
            if ($api->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $api = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNTU3M2JiZWZlMDJiMmIyNDI4NGY4ZDJlNzdjMzVkZjVlMjYxNDE4MDFjYjkwNWZiNDc3NGQxZDk3MmY5M2QzM2E2OTI1NzhhMzRmMDExODIiLCJpYXQiOjE2MTkyMzY1ODMsIm5iZiI6MTYxOTIzNjU4MywiZXhwIjoxNjIwNTMyNTgzLCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.HMbraYZAUC8Z0bITP1b_eWK5mZh54MEqMua2V_sSYlHqV52t3UFLXuRn5KPnIhAJgm4M1osnJgi1PxbANAuOxQMlFKu0u0ioFUB8TLyZNIcNivHe1s0sD0OPdOk35djKLWWi50v4sqLLZ_2JeRMK8n2cdi9DOkeAfjQAtkyTEhWzipV28DV_QRcWdqch5GtXjF9v3AO14c1WxH_6ZIYZsWaqkOiV9zN-N1ncWwufoJgl62FKDui0aiIAcBaobpHgtiOcYqtG2XKoSj8FoS6TrZvikc9Cx4Ppmba8czabXomHYmK5in9AZm16muTeOv39FlxZE2MuQLmHnw4zaIw7uJmGagGs3MFFdbOtFEsIrHLx3Bi4OWCXuJSEA0rHfL9uDQk45miEYm2tSZS19TX6iz_tf_2LPKMkRL5psthujoS1SIjLJCmw9hJzRES1ZljIMDADJ9QBFX-tD5cEux60ZsM4F-HU-uRmu6skhEY7uAWTx1ZshF5cneHtFpI-vx0JQNzjCb3FFexD22Z9n1b_NH9q_M3TnLDwgkZqa8E1bjWntzC2lzszCf1ctjGmUAo4_TWM-Yy2HERdjQ1wcCCYT8c7D8dvPiT0M0uyMZ0mAORoYQ6QcbE0L72cNBNH6fsuQjbDIpA9CJ4heG9jY0zsotQuiXSBfWX9H41ga0vnl5M' //$token->access_token
                ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                    'consignee' => $request->receiver_name,
                    'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                    'address' => $add,
                    'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
                ]);
            }
            Log::info('App: create shipment_infor',['body'=>$api->body()]);
            $data = json_decode($api->body(), true);
            // return  $data;
            //create shipment
            // return $request->all();
            foreach ($arrTracking as $item) {
                $item_number = strval($item); //pass to string
                //note
                $create_shipment = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNTU3M2JiZWZlMDJiMmIyNDI4NGY4ZDJlNzdjMzVkZjVlMjYxNDE4MDFjYjkwNWZiNDc3NGQxZDk3MmY5M2QzM2E2OTI1NzhhMzRmMDExODIiLCJpYXQiOjE2MTkyMzY1ODMsIm5iZiI6MTYxOTIzNjU4MywiZXhwIjoxNjIwNTMyNTgzLCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.HMbraYZAUC8Z0bITP1b_eWK5mZh54MEqMua2V_sSYlHqV52t3UFLXuRn5KPnIhAJgm4M1osnJgi1PxbANAuOxQMlFKu0u0ioFUB8TLyZNIcNivHe1s0sD0OPdOk35djKLWWi50v4sqLLZ_2JeRMK8n2cdi9DOkeAfjQAtkyTEhWzipV28DV_QRcWdqch5GtXjF9v3AO14c1WxH_6ZIYZsWaqkOiV9zN-N1ncWwufoJgl62FKDui0aiIAcBaobpHgtiOcYqtG2XKoSj8FoS6TrZvikc9Cx4Ppmba8czabXomHYmK5in9AZm16muTeOv39FlxZE2MuQLmHnw4zaIw7uJmGagGs3MFFdbOtFEsIrHLx3Bi4OWCXuJSEA0rHfL9uDQk45miEYm2tSZS19TX6iz_tf_2LPKMkRL5psthujoS1SIjLJCmw9hJzRES1ZljIMDADJ9QBFX-tD5cEux60ZsM4F-HU-uRmu6skhEY7uAWTx1ZshF5cneHtFpI-vx0JQNzjCb3FFexD22Z9n1b_NH9q_M3TnLDwgkZqa8E1bjWntzC2lzszCf1ctjGmUAo4_TWM-Yy2HERdjQ1wcCCYT8c7D8dvPiT0M0uyMZ0mAORoYQ6QcbE0L72cNBNH6fsuQjbDIpA9CJ4heG9jY0zsotQuiXSBfWX9H41ga0vnl5M' //$token->access_token
                ]);
                //tạo shipment_order
                $donggoi = $request->isPackaged == false ? "không" : "có";
                $note = json_encode(['send_name' => $request->sender_name, 'send_phone' => $request->sender_phone_number, 'isPackaged' => $donggoi, 'note' => $request->note]);
                //createTrackinf
                $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
                    'shipment_method_id' =>  $request->shipping_method, //đường vận chuyển
                    'shipment_infor_id' => $data['id'], //lấy id của shipment_info
                    'type' => 'shipment',
                    'tracking' => $item_number, //danh sách tracking
                    'note' => $note,
                ]);
                //check status
                if ($create_shipment->status() == 201) {
                    $collect[] = array(
                        "Success" => true,
                        "Code" => 1,
                        "Mesenger" => 'Create Tracking OK!'
                    );
                } else {
                    $collect[] = array(
                        "Success" => false,
                        "Code" => 0,
                        "Mesenger" => 'Fail! Tracking already exists.'
                    );
                }
                sleep(0.8);
            }
            $temp["Result"] = $collect;
            return response()->json($temp);
        }
        //CostShipVN
        if ($costShipVN = $request->CostShipVN) {
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
        }
        //COD CHange
        if ($request->COD_Change) {
            $Tracking = $request->Tracking;
            $SKU = $request->SKU;
            $PriceCODVN = $request->PriceCODVN;
            $Respone['Success'] = true;
            $Respone['Code'] = '0H';
            $Respone['Mesenger'] = 'OK';
            return response()->json($Respone);
        }
    }
    public function allFunction(Request $request)
    {
        //getPrice
        Log::info("app", ['tess' => $request->all()]);
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
                    "TypeTP" => strval($row->Id),
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
                    'TypeQH' => strval($row->Id),
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
                    'TypeDis' => strval($row['Id']),
                    'Maqh' => $row['MaQuanHuyen'],
                );
            }
            $temp["District"] = $results;
            return response()->json($temp);
        }
        //createTrackingApp

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
                'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiZjRkNjVkNmU3ZDdiNmU4NTcwNDhiMWYxMzM2ZjE5YjA2MDgwMDc2NzAyM2MyMGUwYWExODFlZTA1ODkyZmVlZmE1ZGJjMGJmMTU4YTQ5MGUiLCJpYXQiOjE2MTkyNTcwMjUsIm5iZiI6MTYxOTI1NzAyNSwiZXhwIjoxNjIwNTUzMDI1LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.VO4q0XHMc2I2eVTMTMhiQO19W60wWnQPRauwcuDT_8pjlPlqHJ687pJAli9gRyfbnA6qzpQqtos1zb2mGWuaPZXHfBGHjbTkf9IStcgm5zNiPcr02CIT89BNcG3C_5MLxqGRoHPYq6XHZHrEQ7JFs6gTlmF0tFT473J7EDrRdRWyUTchh0uWtvFg9bXZGZmD1QTb1pWuKeBZmGEUEZ-zzQ_g9TZMjbll-0YpALoaQ92f1joKhu0YQBZpfHaG8uwWO34U4J0M8gb3um1MIwiUft1F5TCZgiPZdCmbo3p26slQ5oRlECoVhtaIs9dbBdYi87ktbiycAJ7UjcfptwO1ycPKa69AgUmoExXgOyQfdu40F2ypMUkoN9pi4k2bIBsMZSzdflu39x0epyfqSje-k8B6i--C47RGCIWKDg5ZSMgA8eGgTVam54kChWmsQiWvCEBbXiyC0fURANH9gdSjN2vOfhogdmJxNGtzrCQoTEghbaiZfrTquyPrOSDigKGfOVM9dC-bZNq-4Rr8HQcd6CRGFG6E46YhUkmcngYqMtw52gMNaek1dusHqzM1DBgjsDBIGJjuZ_IiL-vlkj1XETI_IfUuFVEqQqppA2yHLjrlW4h2aZeansE4hBtHe41zG0dmxYSRgqWRoyQOsyYyCldzXrevAC4gVIXQwkAW4YE' //$token->access_token
            ]);
            $data = $data->get('http://order.tomonisolution.com:82/api/trackings/' . $tracking, $sendRela);
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiZjRkNjVkNmU3ZDdiNmU4NTcwNDhiMWYxMzM2ZjE5YjA2MDgwMDc2NzAyM2MyMGUwYWExODFlZTA1ODkyZmVlZmE1ZGJjMGJmMTU4YTQ5MGUiLCJpYXQiOjE2MTkyNTcwMjUsIm5iZiI6MTYxOTI1NzAyNSwiZXhwIjoxNjIwNTUzMDI1LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.VO4q0XHMc2I2eVTMTMhiQO19W60wWnQPRauwcuDT_8pjlPlqHJ687pJAli9gRyfbnA6qzpQqtos1zb2mGWuaPZXHfBGHjbTkf9IStcgm5zNiPcr02CIT89BNcG3C_5MLxqGRoHPYq6XHZHrEQ7JFs6gTlmF0tFT473J7EDrRdRWyUTchh0uWtvFg9bXZGZmD1QTb1pWuKeBZmGEUEZ-zzQ_g9TZMjbll-0YpALoaQ92f1joKhu0YQBZpfHaG8uwWO34U4J0M8gb3um1MIwiUft1F5TCZgiPZdCmbo3p26slQ5oRlECoVhtaIs9dbBdYi87ktbiycAJ7UjcfptwO1ycPKa69AgUmoExXgOyQfdu40F2ypMUkoN9pi4k2bIBsMZSzdflu39x0epyfqSje-k8B6i--C47RGCIWKDg5ZSMgA8eGgTVam54kChWmsQiWvCEBbXiyC0fURANH9gdSjN2vOfhogdmJxNGtzrCQoTEghbaiZfrTquyPrOSDigKGfOVM9dC-bZNq-4Rr8HQcd6CRGFG6E46YhUkmcngYqMtw52gMNaek1dusHqzM1DBgjsDBIGJjuZ_IiL-vlkj1XETI_IfUuFVEqQqppA2yHLjrlW4h2aZeansE4hBtHe41zG0dmxYSRgqWRoyQOsyYyCldzXrevAC4gVIXQwkAW4YE' //$token->access_token
                ]);
                $data = $data->get('http://order.tomonisolution.com:82/api/trackings/' . $tracking, $sendRela);
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
                'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
            ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $skuSearch . '?with=items;sfa');
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data  = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $skuSearch . '?with=items;sfa');
            }
            if ($data->status() == 200) {
                $data = json_decode($data->body(), true);
                $getTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                ])->get('http://order.tomonisolution.com:82/api/trackings/' . $data['sfa']['tracking'] . '?appends=boxes&with=orders.shipmentInfor');
                $inForTracking = json_decode($getTracking->body(), true);
                //sắp xếp mảng  theo shipmentInfo
                if ((!empty($inForTracking["orders"]) || empty($inForTracking["orders"])) && !empty($inForTracking['boxes'])) {
                    $sortByShimpent_id = usort($inForTracking['orders'], function ($a, $b) {
                        return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                    });
                    if (isset($inForTracking['orders'][0]['note'])) {
                        $notes = json_decode($inForTracking['orders'][0]['note']);
                    } else {
                        $notes = json_encode(['send_name' => "Chưa đăng kí", 'send_phone' => "Chưa đăng kí", 'isPackaged' => "Chưa đăng kí", 'note' => "Chưa đăng kí"]);
                        $notes = json_decode($notes);
                    }
                    $collect[] = array(
                        "SKU" => $skuSearch,
                        "Can_Nang" =>  strval(number_format($data['weight'],2,".","")),
                        "Tracking_number" => $data['sfa']['tracking'],
                        "Uname_Send" => $notes->send_name,
                        "Number_Send" => $notes->send_phone,
                        "Uname_Rev" => isset($inForTracking["orders"][0]['shipment_infor']['consignee']) ? $inForTracking["orders"][0]['shipment_infor']['consignee'] :  "Chưa đăng kí ",
                        "Number_Rev" => isset($inForTracking["orders"][0]['shipment_infor']['tel']) ? $inForTracking["orders"][0]['shipment_infor']['tel'] : "Chưa đăng kí ",
                        "Add_Rev" => isset($inForTracking["orders"][0]['shipment_infor']['full_address']) ? $inForTracking["orders"][0]['shipment_infor']['full_address'] : "Chưa đăng kí ",
                        "Note_Rev" => $notes->note,
                        "Reparking" => $notes->isPackaged=="không"?"true":"false",
                        "ShipMethod" => isset($inForTracking["orders"][0]['shipment_method_id']) ? $inForTracking["orders"][0]['shipment_method_id'] : "Chưa đăng kí ",
                        "CODPriceJP" =>null,
                        "CODPriceVN" => false,
                    );
                }
                //item
                if (!empty($data['items'])) {
                    foreach ($data['items'] as $item) {
                        $getInfoItem = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                        ])->get('http://product.tomonisolution.com:82/api/products/' . $item['product_id']);
                        if ($getInfoItem->status() == 401) {
                            $this->QCT->getToken();
                            $token = token::find(1);
                            $getInfoItem = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                            ])->get('http://product.tomonisolution.com:82/api/products/' . $item['product_id']);
                        }
                        if ($getInfoItem->status() == 200) {
                            $getInfoItem = json_decode($getInfoItem);
                            $cu[] = array(
                                'Quantity' => strval($item['quantity']),
                                'Name' => $getInfoItem->name
                            );
                        }
                    }
                } else{
                    $cu =null;
                }
                //tracking
                $trackinfo = array();
                $tracking = $request->Trackingnumber;
                $dataSend = ['appends' => 'boxes', 'with' => 'orders'];
                $getTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                ])->get('http://order.tomonisolution.com:82/api/trackings/' . $tracking, $dataSend);

                if ($getTracking->status() == 200) {
                    $getTracking = json_decode($getTracking->body(), true);
                    if (!empty($getTracking["orders"])) {
                        $sortByShimpent_id = usort($inForTracking['orders'], function ($a, $b) {
                            return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                        });
                    }
                    //cả 2 ko rỗng
                    if (!empty($getTracking['boxes']) && !empty($getTracking["orders"])) {
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
                                    $trackinfo[] = array(
                                        'Date_line' => $log['created_at'],
                                        'StatusTrack' => $status,
                                        'StatusTrack' => $status,
                                    );
                                }
                            }
                        }
                    }
                    //box rỗng, orders có
                    if (empty($getTracking['boxes']) && !empty($getTracking["orders"])) {
                        $trackinfo = [
                            'Date_line' => $getTracking['orders'][0]['created_at'],
                            'StatusTrack' => 'Chưa về kho',
                            'StatusTrack' => 'Chưa về kho',
                        ];
                    }
                    if (!empty($getTracking['boxes']) && empty($getTracking["orders"])) {
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
                                    $trackinfo[] = array(
                                        'Date_line' => $log['created_at'],
                                        'StatusTrack' => $status,
                                    );
                                }
                            }
                        }
                    }
                }
                $temp["InfoSKU"] = $collect;
                $temp["Detail"] = $cu;
                $temp["Timeline"] = $trackinfo;
                return response()->json($temp);
            }
        }
        //SKUInfo done
        if ($sku = $request->SKUInfo) {
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
                $token = token::find(1);
            }
            $data  = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
            ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $sku . '?with=sfa');
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data  = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                ])->get('http://warehouse.tomonisolution.com:82/api/boxes/' . $sku . '?with=sfa');
            }
            //check SKU
            if ($data->status() == 200) {
                $data = json_decode($data->body(), true);
                $getTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                ])->get('http://order.tomonisolution.com:82/api/trackings/' . $data['sfa']['tracking'] . '?appends=boxes&with=orders.shipmentInfor');
                // dd($getTracking->body());
                if ($getTracking->status() == 200) {
                    $inFortracking = json_decode($getTracking->body(), true);
                    //sắp xếp mảng  theo shipmentInfo
                    $sortByShimpent_id = usort($inFortracking['orders'], function ($a, $b) {
                        return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                    });
                    //
                    $getByWardId = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                    ])->get('http://notification.tomonisolution.com:82/api/wards/' . $inFortracking['orders'][0]['shipment_infor']['ward_id'] . '?with=district.province');
                    if ($getByWardId->status() == 401) {
                        $this->QCT->getToken();
                        $token = token::find(1);
                        $getByWardId = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                        ])->get('http://notification.tomonisolution.com:82/api/wards/' . $inFortracking['orders'][0]['shipment_infor']['ward_id'] . '?with=district.province');
                    }
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
                        'CanNang' => strval($data['weight']) ,
                        'ChieuCao' =>  strval($data['height']),
                        'ChieuRong' =>  strval($data['width']),
                        'ChieuDai' =>  strval($data['length']),
                        'DistricRev_Code' =>  $getByWardId['district']['id'],
                        'ProvinceRev_Code' =>  $getByWardId['district']['province']['id'],
                        'DistricSend_Code' => $SendDisc,
                        'ProvinceSend_Code' => $ProSend
                    ];
                    return response()->json($results);
                } else {
                    $results = array();
                    return response()->json($results);
                }
            }
        }
        // get list area done
        if (isset($_GET['GetlistArea'])) {
            //$Mac_add = $_GET['GetlistArea'];
            $token = token::find(1);
            if (empty($token)) {
                $this->QCT->getToken();
                $token = token::find(1);
            }
            $data =  Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
            ])->get('http://warehouse.tomonisolution.com:82/api/areas');
            if ($data->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $data =  Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMjczNjgxYzI5YWIwMmIwNTc4YjdlNjliZGFiODAyYTkzYWY0ZjE5MjliMmU5NWVhODg5NzVhYzViOTFlMjZmZjE4Y2RkMTJkNDI4MDc0YzYiLCJpYXQiOjE2MTkyNTIyMDcsIm5iZiI6MTYxOTI1MjIwNywiZXhwIjoxNjIwNTQ4MjA3LCJzdWIiOiJzYWxlLnNlIiwic2NvcGVzIjpbIioiXX0.Uwe--s_KlBQ89-MkKJlP164elLqbiYyFvRKlc41uWLTZzzY2PWbAWCE0gnpXp8rO6FTilDUp3zMto0JoUKRDPy7tq9VoJlaPHshvvF5fVxRE9tSBZvk9AYgRVCfjIpX48L0vNzyamQ9Ysc7FUrkjHFV6NZCydKgdADIV9v1Py3nGK4iOa4NXo273zIb0lih8VKRC3AHZ5cwaGVh4Y6sqCf2wH5kZHXHGC6gwnuOQ1NynI03x-koUZ6FuTAyaVtaKcvyAx6zkXjfBFD4tCtYx2oRwGxXEBUlajR0DdEMUnNuKDG8TLkkIuaihm1Dk5XOuv5-hfkAnyV4WEYKZT3TUE2IPnwjXmP2QZAFudkiLyoIHu3PJBL4ZiG-ZNLSGn3D7XjXkaTsQtADnEQGN_4sere0bju4kbXiG5C1D6fsW-72PlxSOdI14dK5v9o_AcW3tCZJ5-06OHLibfP7pkb5C_rnvble24NzDhgh-qWtaIGxxhNLX-9fEluOeG12HKWTbug7sMU69VLVWbwMPHeFL1fBkKKLfphQ8OzCzf96Q6n2hKVWkW8G2f34vZ_iAc5tU-3CTevmJ3qyAP2AXATpPLMtEKo-8HfvYO33sfjUrp0jdoUOT8R8r00FklWsz_4nP_sMI3dw_NFWS_0reIYXfh2M1mZj_B-g_2f4V3f25P9I' //$token->access_token
                ])->get('http://warehouse.tomonisolution.com:82/api/areas');
            }
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
