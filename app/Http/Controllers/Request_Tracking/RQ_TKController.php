<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use App\Models\phuongxa;
use App\Models\quanhuyen;
use App\Models\tinhthanh;
use Illuminate\Http\Request;

class RQ_TKController extends Controller
{
    //
    public function price()
    {
        $data = tinhthanh::all();
        return view('rq-tracking.price', compact('data'));
    }
    public function quote(Request $request)
    {
        $data = tinhthanh::all();
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
        $data = quanhuyen::where('MaTinhThanh', $request->province)->get();
        return response()->json($data);
    }
    public function phuongxa(Request $request)
    {
        $data = phuongxa::where('MaQuanHuyen', $request->district)->get();
        return response()->json($data);
    }
}
