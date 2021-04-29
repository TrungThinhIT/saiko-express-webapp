<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use App\Models\TimelineTrack;
use App\Models\token;
use App\Models\Tracking_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Http\Controllers\Request_Tracking\QuoteController as QuoteController;
use App\Models\phuongxa;
use Illuminate\Support\Arr;

class FLTrackingController extends Controller
{
    //
    public function __construct(QuoteController $QCT)
    {
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
            'appends' => 'boxes.owners',
        ];
        //check status code
        $apiShow = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Authorization' => 'Bearer ' . $token->access_token
        ])->get('http://order.tomonisolution.com/api/trackings/' . $request->tracking, $dataShow);
        //check show status
        if ($apiShow->status() == 401) {
            $this->QCT->getToken();
            $token = token::find(1);
            $apiShow = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Authorization' => 'Bearer ' . $token->access_token
            ])->get('http://order.tomonisolution.com/api/trackings/' . $request->tracking, $dataShow);
        }
        if ($apiShow->status() == 404) {
            return $apiShow->status();
        } else {
            $dataIndex = [
                'search' => 'id:' . $request->tracking,
                'with' => 'orders.shipmentInfor',
                'appends' => 'boxes.owners',
            ];
            $apiTracking = Http::withHeaders(
                [
                    'Accept' => 'application/json',
                    // 'Authorization' => 'Bearer ' . $token->access_token
                ]
            )->get('http://order.tomonisolution.com/api/trackings/', $dataIndex);
            //check auth
            if ($apiTracking->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $apiTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://order.tomonisolution.com/api/trackings/', $dataIndex);
            }
            $results = json_decode($apiTracking->body(), true); //results of tomoni
            //tính ký thể tích
            if (!empty($results['data'][0]['boxes'])) {
                for ($j = 0; $j <= count($results['data'][0]['boxes']) - 1; $j++) {
                    $length = $results['data'][0]['boxes'][$j]['length'];
                    $width = $results['data'][0]['boxes'][$j]['width'];
                    $height = $results['data'][0]['boxes'][$j]['height'];
                    if (empty($results['data'][0]['orders'])) {
                        $volumne_weight = ($length * $width * $height) / 6000;
                    } else {
                        usort($results['data'][0]['orders'], function ($a, $b) {
                            return $b['shipment_infor_id'] - $a['shipment_infor_id'];
                        }); //sort orders
                        $method_shipment = Str::ucfirst($results['data'][0]['orders'][0]['shipment_method_id']);
                        if ($method_shipment == "Air") {
                            $volumne_weight = ($length * $width * $height) / 6000;
                        } else {
                            $volumne_weight = ($length * $width * $height) / 3500;
                        }
                    }

                    $results['data'][0]['boxes'][$j]['volumn_weight_box'] = $volumne_weight;
                    // dd($results['data'][0]['boxes']['volumn_weight_box']);
                }
            }
            // if (!empty($results['data'][0]['boxes'])  && !empty($results['data'][0]['orders'])) {
            //     usort($results['data'][0]['orders'], function ($a, $b) {
            //         return $b['shipment_infor_id'] - $a['shipment_infor_id'];
            //     }); //sort orders
            //     $arrCheck = ['Nhận tại VP Sóc Sơn', 'Nhận tại VP Đào Tấn', 'Nhận tại VP Tân Bình HCM', 'Nhận tại VP Lạc Long Quân', 'Nhận tại VP Hồ Chí Minh', 'VN Ha Noi', 'VN Sai Gon', 'Văn phòng Hồ Chí Minh', 'Văn phòng Sóc Sơn', 'VP Lạc Long Quân', 'Văn phòng Lạc Long Quân'];
            //     if (!(in_array($results['data'][0]['orders'][0]['shipment_infor']['address'], $arrCheck))) {
            //         $getWard = phuongxa::where('MaPhuongXa', ($results['data'][0]['orders'][0]['shipment_infor']['ward_id']))->first(); //get ward
            //         if (!empty($getWard)) {
            //             $provinIdRev = $getWard->MaTinhThanh; //province rev ID
            //             $districtIdRev = $getWard->MaQuanHuyen; //district rev ID
            //             $provinIdSend = $provinIdRev <= "53" ? 10 : 70; //province send ID
            //             $districhIdSend = $provinIdSend == 10 ? 1390 : 7600; //district send ID
            //             $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
            //             for ($i = 0; $i <= count($results['data'][0]['boxes']) - 1; $i++) {
            //                 $data = array(
            //                     'ReceiverDistrictId' => $getWard->MaQuanHuyen,
            //                     'ReceiverProvinceId' => $getWard->MaTinhThanh,
            //                     'SenderDistrictId' => $districhIdSend,
            //                     'SenderProvinceId' => $provinIdSend,
            //                     'Weight' => $results['data'][0]['boxes'][$i]['weight'] * 1000,
            //                     'Width' => $results['data'][0]['boxes'][$i]['width'],
            //                     'Length' => $results['data'][0]['boxes'][$i]['length'],
            //                     'Height' => $results['data'][0]['boxes'][$i]['height'],
            //                     'CodAmount' => 1,
            //                     'IsReceiverPayFreight' => false,
            //                     'OrderAmount' => 0,
            //                     'UseBaoPhat' => true,
            //                     'UseHoaDon' => true,
            //                     'CustomerCode' => '0843211234C333345'
            //                 );
            //                 $postdata = json_encode($data);

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
            //                 if (($provinIdRev == 10) || ($provinIdRev == 70)) {
            //                     $TongCuocSauVAT = $arr[0]['TongCuocSauVAT'];
            //                     $CuocCOD = $arr[0]['CuocCOD'];
            //                     $PhuongThucVC = 'Chuyển Nhanh';
            //                 } else {
            //                     $TongCuocSauVAT = $arr[1]['TongCuocSauVAT'];
            //                     $CuocCOD = $arr[1]['CuocCOD'];
            //                     $PhuongThucVC = 'Chuyển Chậm';
            //                 }
            //                 $results_vnpost = array(
            //                     'MaDichVu' => 'BƯU ĐIỆN',
            //                     'TongCuocSauVAT' => number_format($TongCuocSauVAT),
            //                     'CuocCOD' => number_format($CuocCOD),
            //                     'SoTienCodThuNoiNguoiNhan' => number_format($CuocCOD + $TongCuocSauVAT),
            //                     'PhuongThucVC' => $PhuongThucVC
            //                 );
            //                 $results['data'][0]['boxes'][$i]['vnpost'] = $results_vnpost;
            //                 sleep(1);
            //             }
            //         }
            //     }
            // }
            return $results;
        }
    }
}
