<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PriceController extends Controller
{
    //
    public function getApiVNP(Request $request)
    {
        // if ($request->service == "BD") {
        //     $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
        //     $province =  $request->id_province <= 53 ? 10 : 70;
        //     $district = $province == 10 ? 1390 : 7600;
        //     $data = array(
        //         'SenderDistrictId' => $district,
        //         'SenderProvinceId' => $province,
        //         'ReceiverDistrictId' => $request->id_district,
        //         'ReceiverProvinceId' => $request->id_province,
        //         'Weight' => $request->wei * 1000,
        //         'Width' => $request->width,
        //         'Length' => $request->long,
        //         'Height' => $request->height,
        //         'CodAmount' => $request->code  ? 1.0 : 0,
        //         'IsReceiverPayFreight' => $request->code  ? true : false,
        //         'OrderAmount' => $request->price,
        //         'UseBaoPhat' => true,
        //         'UseHoaDon' => true,
        //         'CustomerCode' => '0843211234C333345'
        //     );
        //     $postdata = json_encode($data);
        //     $ch = curl_init($url);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'h-token:eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJTb0RpZW5UaG9haSI6IjA5NDMyMTEyMzQiLCJFbWFpbCI6bnVsbCwiTWFDUk0iOm51bGwsIkV4cGlyZWRUaW1lIjo2NDA1Mjg0NzQ1NzQ4NS45NjksIlJvbGVzIjpbOTk5LDExLDEzXSwiTmd1b2lEdW5nSWQiOiI4YWQ1Y2ZkYi1lMWRjLTRlZjItODIyZS1jMDQ1Yjc5OTM0YzgiLCJNYVRpbmhUaGFuaCI6IjcwIiwiVGVuTmd1b2lEdW5nIjoixJDhu5FpIHTDoWMgY2h1bmciLCJOZ2F5VGFvVG9rZW4iOiJcL0RhdGUoMTYwMTg2NTQ1NzQ4NSlcLyIsIlRpbWVMYXN0UmVhZENvbW1lbnQiOm51bGwsIk1hQnV1Q3VjIjpudWxsLCJNYVRpbmhUaGFuaFF1YW5MeSI6bnVsbCwiQ1JNX0VtcGxveWVlSWQiOm51bGwsIk5nYXlUYW9Ub2tlblRpbWVTdGFtcCI6MTYwMTg2NTQ1NzQ4NX0.KqZh4Ngu0g3APXNs1BEWu_JwoBQa_upj5An9SF_FASFvpWaU-ElacBRtAZ8Ybw4JeNsUrYd0fpgYhouGr6MT7d5Jb9rbaaIRQR4Mqdgpar7V30UuLR1nCvjCXhiSk8FLiFxtExHXjYUB0rOeyCmYpnN_gXvLQpS-iYHvky7qXro'));
        //     $result = curl_exec($ch);
        //     $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //     curl_close($ch);
        //     $arr = json_decode($result, true);
        //     //BK &EMS
        //     if ($province == $data['ReceiverProvinceId']) {
        //         if ($request->code) {
        //             $money = number_format($arr[1]['SoTienCodThuNoiNguoiNhan']);
        //         } else {
        //             $money = number_format($arr[1]['TongCuocBaoGomDVCT']);
        //         }
        //         $results = array(
        //             'MaDichVu' => $arr[1]['MaDichVu'],
        //             'TongCuocSauVAT' => number_format($arr[1]['TongCuocSauVAT']),
        //             'CuocCOD' => number_format($arr[1]['CuocCOD']),
        //             'CuocKhaiGia' => $arr[1]['CuocKhaiGia'],
        //             'TongCuocDichVuCongThem' => $arr[1]['TongCuocDichVuCongThem'],
        //             'SoTienCodThuNoiNguoiNhan' => $money
        //         );
        //         $results['type'] = ['type' => "BD"];
        //         return response()->json($results, JSON_UNESCAPED_UNICODE);
        //     } else { //EMS
        //         if ($request->code) {
        //             $money = number_format($arr[0]['SoTienCodThuNoiNguoiNhan']);
        //         } else {
        //             $money = number_format($arr[0]['TongCuocBaoGomDVCT']);
        //         }
        //         $results = array(
        //             'MaDichVu' => $arr[0]['MaDichVu'],
        //             'TongCuocSauVAT' => number_format($arr[0]['TongCuocSauVAT']),
        //             'CuocCOD' => number_format($arr[0]['CuocCOD']),
        //             'CuocKhaiGia' => $arr[0]['CuocKhaiGia'],
        //             'TongCuocDichVuCongThem' => $arr[0]['TongCuocDichVuCongThem'],
        //             'SoTienCodThuNoiNguoiNhan' => $money
        //         );
        //         $results['type'] = ['type' => "BD"];
        //         return response()->json($results, JSON_UNESCAPED_UNICODE);
        //     }
        // }
        if ($request->service == "GHTK") {
            // return response()->json($request->all());
            $province =  $request->id_province <= 53 ? "Hà Nội" : "Hồ Chí Minh";
            $district = $province == "Hà Nội" ? "Sóc Sơn" : "Tân Phú";
            $data = array(
                "pick_province" =>  $province,
                "pick_district" => $district,
                "province" => $request->provinceText,
                "district" => $request->districtText,
                "weight" => $request->wei * 1000,
                "value" => $request->priceGHTK,
                "deliver_option" => $request->methodGHTK,
                "transport"=>$request->transport
            );
            // return $data;
            $apiGHTK = Http::withHeaders([
                'token' => 'a26534751D9ccbc1D34306359dE56fdfA0068Ef6'
            ])->get("https://services.giaohangtietkiem.vn/services/shipment/fee?", $data);
            $a = json_decode($apiGHTK->body(), true);
            $a['type'] = ['type' => 'GHTK'];
            // return json_decode($apiGHTK->body(), true);
            return response()->json($a);
        }
    }
    public function getApiGHTK(Request $request)
    {
        //a26534751D9ccbc1D34306359dE56fdfA0068Ef6
    }
}
