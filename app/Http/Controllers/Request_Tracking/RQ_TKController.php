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
        return view('rq-tracking.price');
    }
    public function quote()
    {
        $data = tinhthanh::all();
        return view('rq-tracking.quote', compact('data'));
    }
    public function shipment()
    {
        return view('rq-tracking.follow');
    }
    public function quanhuyen(Request $request)
    {
        $data = quanhuyen::where('MaTinhThanh', $request->matinh)->get();
        return response()->json($data);
    }
    public function phuongxa(Request $request)
    {
        $data = phuongxa::where('MaQuanHuyen', $request->mahuyen)->get();
        return response()->json($data);
    }
}
