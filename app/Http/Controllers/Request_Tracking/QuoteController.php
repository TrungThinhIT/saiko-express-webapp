<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use App\Http\Requests\guihangRequest;
use App\Models\phuongxa;
use App\Models\quanhuyen;
use App\Models\tinhthanh;
use App\Models\token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getToken()
    {
        $api = Http::post('http://auth.tomonisolution.com:82/oauth/token', [
            'username' => 'customer.1@abc.xyz',
            'password' => 'password',
            'client_secret' => 'B5nzdSkv85ilDEaOg5leHXCZfup5nZFkxDtIYSWi',
            'grant_type' => 'password',
            'client_id' => 2,
            'scope' => '*'
        ]);
        $data =  json_decode($api->body(), true);
        $check = token::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'access_token' => $data['access_token']
            ]
        );
        if ($check) {
            return 1;
        }
        return 0;
    }
    public function getTinh($id)
    {
        return tinhthanh::where('MaTinhThanh', $id)->first()->TenTinhThanh;
    }
    public function getQuan($id)
    {
        return quanhuyen::where('MaQuanHuyen', $id)->first()->TenQuanHuyen;
    }
    public function getPhuong($id)
    {
        return phuongxa::where('MaPhuongXa', $id)->first()->TenPhuongXa;
    }
    public function store(Request $request)
    {
        //tạo address
        if ($request->hinhthuc != 1) {
            $validator  = Validator::make(
                $request->all(),
                [
                    'tinh' => 'required',
                    'huyen' => 'required',
                    'xa' => 'required',
                    'duong' => 'required'
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $tinh = $this->getTinh($request->tinh);
            $quan = $this->getQuan($request->huyen);
            $phuong = $this->getPhuong($request->xa);
            $address = $tinh . ',' . $quan . ',' . $phuong . ',' . $request->duong;
        } else {
            $address = 'Nhận tại VP Tân Bình TPHCM';
        }
        //lấy access_token
        $token = token::find(1);
        if (empty($token)) {
            $this->getToken();
        }
        $token = token::find(1);
        $api = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
            'consignee' => $request->name_arr,
            'tel' => $request->phone_arr,
            'address' => $address,
            'province_id' => $request->tinh,
            'district_id' => $request->huyen,
            'ward_id' => $request->xa
        ]);
        if ($api->status() == 401) {
            $this->getToken();
            $token = token::find(1)->access_token;
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                'consignee' => $request->name_arr,
                'tel' => $request->phone_arr,
                'address' => $address,
                'province_id' => $request->tinh,
                'district_id' => $request->huyen,
                'ward_id' => $request->xa
            ]);
        }
        $data = json_decode($api->body(), true);
        //create shipment
        $tracking = explode(" ", $request->tracking);
        foreach ($tracking as $item) {
            $arr[] = ['code' => $item, 'expected_delivery' => Carbon::now()->addDays(10)->toDateString()];
        }
        //tạo tracking
        $tracking = json_encode($arr);
        //check đóng gói
        if ($request->donggoi == "Repark") {
            $donggoi = "Có đóng gói";
        } else {
            $donggoi = "Không đóng gói";
        }
        //note
        $note = $request->note;
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ]);
        //tạo shipment_order
        $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
            'shipment_method_id' => $request->fh_radio, //đường vận chuyển
            'shipment_infor_id' => $data['id'], //lấy id của shipment_info
            'type' => 'shipment',
            'trackings' => $tracking, //danh sách tracking
            'note' => $note
        ]);
        //check status
        if ($create_shipment->status() == 201) {
            return back()->with('success', 'Đã gữi');
        } else {
            return back()->with('fail', 'Gữi hàng thất bại');
        }
        // dd($note);
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
