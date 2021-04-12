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
        $api = Http::post('http://auth.tomonisolution.com:80/oauth/token', [
            'username' => 'sale@saikoexpress.com',
            'password' => 'password',
            'client_secret' => '',
            'grant_type' => 'password',
            'client_id' => 4,
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
        // return $request->all();
        //tạo address
        //lấy access_token
        $token = token::find(1);
        if (empty($token)) {
            $this->getToken();
        }
        $token = token::find(1);

        if ($request->utypeadd == "blank") {
            $ward_id = $request->ward;
        }
        if ($request->utypeadd == "Nhận tại VP Sóc Sơn") {
            $ward_id = "13900";
        }
        if ($request->utypeadd == "Nhận tại VP Đào Tấn") {
            $ward_id = "13900";
        }
        if ($request->utypeadd == "Nhận tại VP Tân Bình HCM") {
            $ward_id = "73720";
        }
        $api = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ])->post('http://order.tomonisolution.com/api/shipment-infors', [
            'consignee' => $request->Name_Rev,
            'tel' => $request->Phone, //sdt ng nhận
            'address' => $request->Add,
            'ward_id' =>  $ward_id
        ]);
        //xác thực
        if ($api->status() == 401) {
            $this->getToken();
            $token = token::find(1);
            //create shipment_info
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com/api/shipment-infors', [
                'consignee' => $request->Name_Rev,
                'tel' => $request->Phone,
                'address' => $request->Add,
                'ward_id' =>  $ward_id
            ]);
        }
        //
        $data = json_decode($api->body(), true);
        // return $data;
        //create shipment
        $tracking = explode(" ", $request->TrackingSaiko);
        foreach ($tracking as $item) {
            $arr[] = ['id' => $item];
        }
        //tạo tracking
        $tracking = json_encode($arr);
        //note
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ]);
        //tạo shipment_order
        $donggoi = $request->Reparking == "true" ? "có" : "không";
        $note = json_encode(['send_name' => $request->Name_Send, 'send_phone' => $request->Number_Send, 'isPackaged' => $donggoi, 'note' => $request->Note]);
        // return $note;
        if ($request->ShipAir == "true") {
            $shipping = $request->checkAir;
        } else {
            $shipping = $request->checkSea;
        }
        $create_shipment = $create_shipment->post('http://order.tomonisolution.com/api/orders', [
            'shipment_method_id' => $shipping, //đường vận chuyển
            'shipment_infor_id' => $data['id'], //lấy id của shipment_info
            'type' => 'shipment',
            'trackings' => $tracking, //danh sách tracking
            'note' => $note,
        ]);
        //check status
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
    //creat tracking bên app
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
        $trimXa = Str::of($xa[0])->trim();
        $d = explode(" ", $trimXa);
        if ($d[0] == "Phường" || $d[0] == "Xã") {
            $slice = Str::of($xa[0])->after($d[0]);
        }
        $ward = Str::of($slice)->trim();
        $getIdWard = phuongxa::where('TenPhuongXa', 'like', '%' . $xa[0] . '%')->where('MaTinhThanh', $id_province)->where('MaQuanHuyen', $id_district)->first();
        if (!empty($getIdWard)) {
            $ward_id = $getIdWard->MaPhuongXa;
        } else {
            $ward_id = "13900";
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
        ])->post('http://order.tomonisolution.com/api/shipment-infors', [
            'consignee' => $request->receiver_name,
            'tel' => strval($request->receiver_phone_number), //sdt ng nhận
            'address' => strval($catchuoi[0]),
            // 'province_id' => $id_province, //$request->utypeadd == "blank" ? $request->province : "70",
            // 'district_id' => $id_district, //$request->utypeadd == "blank" ? $request->district : "7360",
            'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
        ]);
        //xác thực 
        if ($api->status() == 401) {
            $this->getToken();
            $token = token::find(1)->access_token;
            $api = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ])->post('http://order.tomonisolution.com/api/shipment-infors', [
                'consignee' => $request->receiver_name,
                'tel' => strval($request->receiver_phone_number), //sdt ng nhận
                'address' => strval($catchuoi[0]),
                // 'province_id' => $id_province, //$request->utypeadd == "blank" ? $request->province : "70",
                // 'district_id' => $id_district, //$request->utypeadd == "blank" ? $request->district : "7360",
                'ward_id' => $ward_id, //$request->utypeadd == "blank" ? $request->ward : "73720"
            ]);
        }
        $data = json_decode($api->body(), true);
        // return  $data;
        //create shipment
        $a = $request->tracking_number;
        foreach ($a as $item) {
            $arr[] = ['id' => strval($item)];
        }
        //tạo tracking
        $tracking = json_encode($arr);
        //note
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ]);
        //tạo shipment_order
        $donggoi = $request->Reparking == "true" ? "có" : "không";
        $note = json_encode(['send_name' => $request->sender_name, 'send_phone' => $request->sender_phone_number, 'isPackaged' => $donggoi, 'note' => $request->note]);
        //post data
        $create_shipment = $create_shipment->post('http://order.tomonisolution.com/api/orders', [
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
    }

    //get api saikorexpress
    public function createTracking(Request $request)
    {
        $data = Http::get('https://saikoeshop.com/Api/Json.php?ListTracking')->body();
        $data = json_decode($data);
        //lấy token
        $token = token::find(1);
        if (empty($token)) {
            $this->getToken();
        }
        $token = token::find(1);
        foreach ($data as $items) {
            foreach (collect($items)->chunk(20) as $item) {
                foreach ($item as $ite_child) {
                    $ward = strval($ite_child->ward);
                    // create shipment infor
                    if ($ite_child->ward == null) {
                        continue; //null continue
                    }
                    if ($ite_child->diachinha == "") {
                        $address = "thiếu số nhà, tên đường";
                    } else {
                        $address = $ite_child->diachinha;
                    }
                    $api = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token->access_token
                    ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                        'consignee' => $ite_child->consignee,
                        'tel' => $ite_child->tel, //sdt ng nhận
                        'address' => $address,
                        'ward_id' =>  $ward
                    ]);
                    //xác thực
                    if (is_int($ite_child->ward)) {
                        $ward = strval($ite_child->ward);
                    } else {
                        $ward = $ite_child->ward;
                    }
                    if ($api->status() == 401) {
                        $this->getToken();
                        $token = token::find(1);
                        //create shipment_info
                        $api = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer ' . $token->access_token
                        ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
                            'consignee' => $ite_child->consignee,
                            'tel' => $ite_child->tel, //sdt ng nhận
                            'address' => $address,
                            'ward_id' =>  $ward
                        ]);
                    }
                    //
                    $dataShipmentInfo = json_decode($api->body(), true);
                    //create orders shipment
                    //send tracking type json
                    $arr = array();
                    $arr[] = ['id' => $ite_child->trackings];
                    //tạo tracking
                    $tracking = json_encode($arr);
                    //note
                    $create_shipment = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token->access_token
                    ]);
                    //tạo shipment_order
                    // $donggoi = $request->Reparking == "true" ? "có" : "không";
                    $note = json_encode(['send_name' => $ite_child->Tennguoigui, 'send_phone' => $ite_child->Sdtnguoigui, 'isPackaged' => "Không", 'note' => $ite_child->note]);
                    // return $note;
                    $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
                        'shipment_method_id' => $ite_child->shipment_method_id, //đường vận chuyển
                        'shipment_infor_id' => $dataShipmentInfo['id'], //lấy id của shipment_info
                        'type' => 'shipment',
                        'trackings' => $tracking, //danh sách tracking
                        'note' => $note,
                    ]);
                    sleep(2);
                }
                sleep(2);
            }
        }
        if ($create_shipment->status() == 201) {
            return $create_shipment->status();
        } else if ($create_shipment->status() == 422) {
            return $create_shipment->body();
        }
    }
}
