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
        $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
        $province =  $request->id_province <= 53 ? 10 : 70;
        $district = $province == 10 ? 1390 : 7600;
        $data = array(
            'SenderDistrictId' => $district,
            'SenderProvinceId' => $request->id_province <= 53 ? 10 : 70,
            'ReceiverDistrictId' => $request->id_district,
            'ReceiverProvinceId' => $request->id_province,
            'Weight' => $request->wei,
            'Width' => $request->width,
            'Length' => $request->long,
            'Height' => $request->height,
            'CodAmount' => $request->code  ? 1.0 : 0,
            'IsReceiverPayFreight' => $request->code  ? true : false,
            'OrderAmount' => $request->price,
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
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        //print_r ($result);
        $arr = json_decode($result, true);
        // return response()->json($arr);
        $results = array(
            'MaDichVu' => $arr[1]['MaDichVu'],
            'TongCuocSauVAT' => number_format($arr[1]['TongCuocSauVAT']),
            'CuocCOD' => number_format($arr[1]['CuocCOD']),
            'CuocKhaiGia' => $arr[1]['CuocKhaiGia'],
            'TongCuocDichVuCongThem' => "0",
            'SoTienCodThuNoiNguoiNhan' => number_format($arr[1]['TongCuocSauVAT'] + $arr[1]['CuocCOD'])
        );
        return response()->json($results, JSON_UNESCAPED_UNICODE);
        // $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
        // $data = [
        //     'SenderDistrictId' => 1390,
        //     'SenderProvinceId' => $request->id_province <= 53 ? 10 : 70,
        //     'ReceiverDistrictId' => $request->id_district,
        //     'ReceiverProvinceId' => $request->id_province,
        //     'Weight' => $request->wei,
        //     'Width' => $request->width,
        //     'Length' => $request->long,
        //     'Height' => $request->height,
        //     'CodAmount' => 1.0,
        //     'IsReceiverPayFreight' => $request->code == 1 ? true : false,
        //     'OrderAmount' => 1.0,
        //     'UseBaoPhat' => true,
        //     'UseHoaDon' => true,
        //     'CustomerCode' => '0843211234C333345'
        // ];
        // $data = json_encode($data);
        // $send = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'h-token' => 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJTb0RpZW5UaG9haSI6IjA5NDMyMTEyMzQiLCJFbWFpbCI6bnVsbCwiTWFDUk0iOm51bGwsIkV4cGlyZWRUaW1lIjo2NDA1Mjg0NzQ1NzQ4NS45NjksIlJvbGVzIjpbOTk5LDExLDEzXSwiTmd1b2lEdW5nSWQiOiI4YWQ1Y2ZkYi1lMWRjLTRlZjItODIyZS1jMDQ1Yjc5OTM0YzgiLCJNYVRpbmhUaGFuaCI6IjcwIiwiVGVuTmd1b2lEdW5nIjoixJDhu5FpIHTDoWMgY2h1bmciLCJOZ2F5VGFvVG9rZW4iOiJcL0RhdGUoMTYwMTg2NTQ1NzQ4NSlcLyIsIlRpbWVMYXN0UmVhZENvbW1lbnQiOm51bGwsIk1hQnV1Q3VjIjpudWxsLCJNYVRpbmhUaGFuaFF1YW5MeSI6bnVsbCwiQ1JNX0VtcGxveWVlSWQiOm51bGwsIk5nYXlUYW9Ub2tlblRpbWVTdGFtcCI6MTYwMTg2NTQ1NzQ4NX0.KqZh4Ngu0g3APXNs1BEWu_JwoBQa_upj5An9SF_FASFvpWaU-ElacBRtAZ8Ybw4JeNsUrYd0fpgYhouGr6MT7d5Jb9rbaaIRQR4Mqdgpar7V30UuLR1nCvjCXhiSk8FLiFxtExHXjYUB0rOeyCmYpnN_gXvLQpS-iYHvky7qXro',
        // ]);
        // $send = $send->post('https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu', [$data]);
        // return $send->body();
        // return response()->json($request->all());
    }
}
