<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use App\Models\phuongxa;
use App\Models\quanhuyen;
use App\Models\tinhthanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RQ_TKController extends Controller
{
    //
    public function price()
    {
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'country_id:vn',
        ];
        $provinces = Http::withHeaders($header)->get(self::$notification_host . '/api/provinces', $param);

        $data = collect(json_decode($provinces->body()));
        return view('rq-tracking.price', compact('data'));
    }
    public function quote(Request $request)
    {
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'country_id:vn',
        ];
        $provinces = Http::withHeaders($header)->get(self::$notification_host . '/api/provinces', $param);

        $data = collect(json_decode($provinces->body()));
        if ($request->wantsJson()) {
            return response()->json($data);
        }
        return view('rq-tracking.quote', compact('data'));
    }
    public function shipment()
    {
        return view('rq-tracking.follow');
    }
    public function quanhuyen(Request $request)
    {
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'province_id:' . $request->province,
        ];
        $provinces = Http::withHeaders($header)->get(self::$notification_host . '/api/districts', $param);

        $data = collect(json_decode($provinces->body()));
        return response()->json($data);
    }
    public function phuongxa(Request $request)
    {
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'district_id:' . $request->district,
        ];
        $provinces = Http::withHeaders($header)->get(self::$notification_host . '/api/wards', $param);

        $data = collect(json_decode($provinces->body()));
        return response()->json($data);
    }
}
