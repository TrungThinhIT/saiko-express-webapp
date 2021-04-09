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
            'Authorization' => 'Bearer ' . $token->access_token
        ])->get('http://order.tomonisolution.com:82/api/trackings/' . $request->tracking, $dataShow);
        //check show status
        if ($apiShow->status() == 401) {
            $this->QCT->getToken();
            $token = token::find(1);
            $apiShow = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->get('http://order.tomonisolution.com:82/api/trackings/' . $request->tracking, $dataShow);
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
                    'Authorization' => 'Bearer ' . $token->access_token
                ]
            )->get('http://order.tomonisolution.com:82/api/trackings/', $dataIndex);
            //check auth
            if ($apiTracking->status() == 401) {
                $this->QCT->getToken();
                $token = token::find(1);
                $apiTracking = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ])->get('http://order.tomonisolution.com:82/api/trackings/', $dataIndex);
            }

            return json_decode($apiTracking->body(), true);
        }
        //

        // $result = [];
        // $checkTracking = Tracking_User::where('Tracking_number', $request->tracking)->get()->count('Tracking_number');
        // if ($checkTracking) {
        //     // $qr = DB::table('wh_sku_item')->where('Tracking_Number', $request->tracking)->leftJoin('product_standard', 'product_standard.jan_code', 'WH_SKU_Item.Item')->leftJoin('nhap_kho', 'WH_SKU_Item.SFA', 'Nhap_Kho.SFA')->select('WH_SKU_Item.Quantity', 'product_standard.name')->get();
        //     $qrTL = TimelineTrack::where('Tracking_number', $request->tracking)->select('Date_line', 'Tracking_number', 'StatusTrack')->get();
        //     $qryInfo = DB::table('nhap_kho')->where('Tracking_User.Tracking_number', $request->tracking)->leftJoin('wh_sku', 'WH_SKU.SFA', 'Nhap_Kho.SFA')->rightJoin('Tracking_User', 'Tracking_User.Tracking_number', 'Nhap_Kho.Tracking_number')->select('WH_SKU.SKU', 'WH_SKU.Can_Nang', 'WH_SKU.Chieu_Cao', 'WH_SKU.Chieu_Rong', 'WH_SKU.Chieu_Dai', 'Tracking_User.Uname_Send', 'Tracking_User.Uname_Rev', 'Tracking_User.Phone_Rev', 'Tracking_User.Add_Rev', 'Nhap_Kho.Soluong_thung')->get();
        //     foreach ($qryInfo as $item) {
        //         $SKU = str_replace('1811', '***', $item->SKU);
        //         $SKU = str_replace('1984', '***', $item->SKU);
        //         $thetich = ($item->Chieu_Cao * $item->Chieu_Rong * $item->Chieu_Dai) / 6000;
        //         $results = [
        //             'CanNang' => $item->Can_Nang,
        //             'Kg_TheTich' => $thetich,
        //             'TenNguoi_Gui' => $item->Uname_Send,
        //             'TenNguoi_Nhan' => $item->Uname_Rev,
        //             'SoDienThoai' => $item->Phone_Rev,
        //             'Dia_Chi' => $item->Add_Rev,
        //             'ID_Thung' => $SKU,
        //         ];
        //     }


        //     return response()->json(['result'=>$results,'table'=> $qrTL]);
        // }
        // return response()->json(($checkTracking));          
    }
}
