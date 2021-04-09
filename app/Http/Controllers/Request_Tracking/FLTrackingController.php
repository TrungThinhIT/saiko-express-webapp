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
        ])->get('http://order.tomonisolution.com/api/trackings/' . $request->tracking, $dataShow);
        //check show status
        if ($apiShow->status() == 401) {
            $this->QCT->getToken();
            $token = token::find(1);
            $apiShow = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
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
                    'Authorization' => 'Bearer ' . $token->access_token
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

            return json_decode($apiTracking->body(), true);
        }
               
    }
}
