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
use Illuminate\Support\Facades\Log;
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
    //nhớ thay đổi cổng
    public function getToken()
    {
        $api = Http::post('http://auth.tomonisolution.com:82/oauth/token', [
            'username' => 'sale@saikoexpress.com',
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
    //nhớ thay đổi cổng
    public function store(Request $request)
    {
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
            $address = "Nhận tại VP Đào Tấn";
            $ward_id = "13900";
        } else {
            $address = $request->Add;
        }
        if ($request->utypeadd == "Nhận tại VP Tân Bình HCM") {
            $ward_id = "76000";
        }
        $api = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token->access_token
        ])->post('http://order.tomonisolution.com:82/api/shipment-infors', [
            'consignee' => $request->Name_Rev,
            'tel' => $request->Phone, //sdt ng nhận
            'address' => $address,
            'ward_id' =>  $ward_id,
            'sender_name' => $request->Name_Send,
            'sender_tel' => $request->Number_Send
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
                'address' => $address,
                'ward_id' =>  $ward_id,
                'sender_name' => $request->Name_Send,
                'sender_tel' => $request->Number_Send
            ]);
        }
        //
        $data = json_decode($api->body(), true);
        // return $data;
        //create shipment
        $tracking = explode(" ", $request->TrackingSaiko);
        // return $note;
        if ($request->ShipAir == "true") {
            $shipping = $request->checkAir;
        } else {
            $shipping = $request->checkSea;
        }
        $arr_created = array();
        foreach ($tracking as $item) {
            if ($item == "") {
                continue;
            }
            $create_shipment = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token
            ]);
            $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders', [
                'shipment_method_id' => $shipping, //đường vận chuyển
                'shipment_infor_id' => $data['id'], //lấy id của shipment_info
                'type' => 'shipment',
                'tracking' => $item, //danh sách tracking
                'note' =>  $request->Note,
                'repackage' => $request->Reparking == "true" ? 1 : 0,
                'merge_package' => $request->merge_box ? 1 : 0,
                'insurance_quote' => floatval($request->surance),
            ]);

            if ($create_shipment->status() == 201) {
                $order = json_decode($create_shipment->body());
                $create_item = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token->access_token
                ]);
                if ($list_item = $request->list_item) {
                    foreach ($list_item as $key => $value) {
                        $data = [
                            'order_id' => $order->id,
                            'product_id' => $key,
                            'quantity' => $value,
                            'price' => 1,
                            'is_box' => 0,
                            'tax_percent' => 1,
                            'discount_tax_per_tax_percent' => 1,
                            'specialty' => true,
                        ];
                        $create_item = $create_item->post('http://order.tomonisolution.com:82/api/orders/items', $data);
                    }
                }
                $arr_created[] = ['code' => $create_shipment->status(), 'message' => $item . ' Đã tạo thành công' . floatval($request->surance)];
            }
            if ($create_shipment->status() == 405) {
                $arr_created[] = ['code' => $create_shipment->status(), 'message' => $item . ' Đã tồn tại' . floatval($request->surance)];
            }
            if ($create_shipment->status() == 422) {
                $arr_created[] = ['code' => $create_shipment->status(), 'message' => $item . ' Không được quá 15 ký tự' . floatval($request->surance)];
            }
        }
        return response()->json($arr_created);
        // if ($create_shipment->status() == 201) {
        //     return $create_shipment->status();
        // } else {
        //     return $create_shipment->status();
        // }

        //tạo tracking
        // $tracking = json_encode($arr);
        //note
    }
}
