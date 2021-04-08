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
use Illuminate\Support\Str;

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
        // return response()->json($request->all());
        //lấy access_token
        $token = token::find(1);
        if (empty($token)) {
            $this->getToken();
        }
        $token = token::find(1);
        //create shipment_info
        $api = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
            'consignee' => $request->Name_Rev,
            'tel' => $request->Phone, //sdt ng nhận
            'address' => $request->Add,
            'ward_id' =>  $request->utypeadd == "blank" ? $request->ward : "73720"
        ]);
        //xác thực
        if ($api->status() == 401) {
            $this->getToken();
            $token = token::find(1);
            //create shipment_info
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                'consignee' => $request->Name_Rev,
                'tel' => $request->Phone,
                'address' => $request->Add,
                'ward_id' =>  $request->utypeadd == "blank" ? $request->ward : "73720"
            ]);
        }
        //
        $data = json_decode($api->body(), true);
        //create shipment
        $tracking = explode(" ", $request->TrackingSaiko);
        foreach ($tracking as $item) {
            $arr[] = ['id' => $item, 'expected_delivery' => Carbon::now()->addDays(10)->toDateString()];
        }
        //tạo tracking
        $tracking = json_encode($arr);
        //note
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ]);
        //tạo shipment_order
        $donggoi = $request->Reparking == false ? "không" : "có";
        $note = json_encode(['send_name' => $request->Name_Send, 'send_phone' => $request->Number_Send, 'isPackaged' => $donggoi, 'note' => $request->Note]);
        // return $note;
        $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
            'shipment_method_id' => $request->ShipSea ? "sea" : "air", //đường vận chuyển
            'shipment_infor_id' => $data['id'], //lấy id của shipment_info
            'type' => 'shipment',
            'trackings' => $tracking, //danh sách tracking
            'note' => $note,
        ]);

        //check status
        // return $create_shipment->body();
        if ($create_shipment->status() == 201) {
            return $create_shipment->status();
        } else if ($create_shipment->status() == 422) {
            return $create_shipment->status();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function appCreateTracking(Request $request)
    {
        //get id district
        $code_add = $request->Code_Add;
        $id_district = explode(",", $code_add)[0];
        //get id province
        $id_province = explode(",", $code_add)[1];
        //get id ward
        $address = $request->detail_address;
        $catchuoi = (explode(",", $address));
        $xa = explode(".", $catchuoi[1]);
        $d = explode(" ", $xa[0]);
        $slice = Str::of($xa[0])->after($d[0] . $d[1]);
        $ward = Str::of($slice)->trim();
        $getIdWard = phuongxa::where('TenPhuongXa', $ward)->where('MaTinhThanh', $id_province)->first();
        if (!empty($getIdWard)) {
            $ward_id = $getIdWard->MaPhuongXa;
        } else {
            $ward_id = "13620";
        }
        // $d = explode(" ", $address[0]);

        //create shipment_info
        $token = token::find(1);
        if (empty($token)) {
            $this->getToken();
        }
        $token = token::find(1);
        $api = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
            'consignee' => $request->receiver_name,
            'tel' => strval($request->receiver_phone_number), //sdt ng nhận
            'address' => $request->detail_address,
            'province_id' => $id_province, //$request->utypeadd == "blank" ? $request->province : "70",
            'district_id' => $id_district, //$request->utypeadd == "blank" ? $request->district : "7360",
            'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
        ]);
        //xác thực 
        if ($api->status() == 401) {
            $this->getToken();
            $token = token::find(1)->access_token;
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                'consignee' => $request->receiver_name,
                'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                'address' => $request->detail_address,
                'province_id' => $id_province, //$request->utypeadd == "blank" ? $request->province : "70",
                'district_id' => $id_district, //$request->utypeadd == "blank" ? $request->district : "7360",
                'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
            ]);
        }
        $data = json_decode($api->body(), true);
        //create shipment
        $a = $request->tracking_number;
        foreach ($a as $item) {
            $arr[] = ['id' => strval($item), 'expected_delivery' => Carbon::now()->addDays(10)->toDateString()];
        }
        //tạo tracking
        $tracking = json_encode($arr);
        //note
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ]);
        //tạo shipment_order
        $donggoi = $request->isPackaged == false ? "không" : "có";
        $note = json_encode(['send_name' => $request->sender_name, 'send_phone' => $request->sender_phone_number, 'isPackaged' => $donggoi, 'note' => $request->note]);
        // return $note;

        $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
            'shipment_method_id' =>  $request->shipping_method, //đường vận chuyển
            'shipment_infor_id' => $data['id'], //lấy id của shipment_info
            'type' => 'shipment',
            'trackings' => $tracking, //danh sách tracking
            'note' => $note,
        ]);
        //check status
        // return $create_shipment->body();
        if ($create_shipment->status() == 201) {
            return $create_shipment->status();
        } else if ($create_shipment->status() == 422) {
            return $create_shipment->status();
        }
        // $data = [
        //     'tracking_number' => $request->tracking_number,
        //     'tracking_number_counter' => $request->tracking_number_counter,
        //     'detail_address' => $request->detail_address,
        //     'isPackaged' => $request->isPackaged,
        //     'note' => $request->note,
        //     'receiver_name' => $request->receiver_name,
        //     'receiver_phone_number' => $request->receiver_phone_number,
        //     'sender_name' => $request->sender_name,
        //     'sender_phone_number' => $request->sender_phone_number,
        //     'shipping_method' => $request->shipping_method,
        //     'Type_Payment' => $request->Type_Payment,
        //     'Code_Add' => $request->Code_Add
        // ];
    }
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
