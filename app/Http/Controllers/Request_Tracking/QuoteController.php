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
use App\Http\Controllers\shipments\ShipmentsController as ShipmentsController;

class QuoteController extends Controller
{
    public function cookie_token(Request $request)
    {
        return $this->getTokenSession($request);
    }

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

    //nhớ thay đổi cổng
    public function store(Request $request)
    {
        //tạo address
        //lấy access_token

        if ($request->utypeadd == "blank") {
            $ward_id = $request->ward;
        }
        $address = $request->Add;

        $tracking = explode(" ", $request->TrackingSaiko);

        if ($request->ShipAir == "true") {
            $shipping = $request->checkAir;
        } else {
            $shipping = $request->checkSea;
        }
        $arr_created = array();
        $insurance = str_replace(',', '', $request->insurance);
        $special_price = str_replace(',', '', $request->special_price);
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $request->idToken ? $request->idToken : $this->cookie_token($request),
        ]);
        $create_shipment = $create_shipment->post('https://prod-order.tomonisolution.com/api/orders/shipment/create-with-trackings', [
            'shipment_method_id' => $shipping, //đường vận chuyển
            'type' => 'shipment',
            'trackings' => $tracking, //danh sách tracking
            'note' =>  $request->Note,
            'repackage' => $request->Reparking == "true" ? 1 : 0,
            'merge_package' => $request->merge_box ? 1 : 0,
            'insurance_declaration' => floatval($insurance),
            'special_declaration' => floatval($special_price),
            'shipment_info' => [
                'consignee' => $request->Name_Rev,
                'tel' => $request->Phone,
                'address' => $address,
                'ward_id' =>  $ward_id,
                'sender_name' => $request->Name_Send,
                'sender_tel' => $request->Number_Send
            ]
        ]);
        if ($create_shipment->status() == 401) {
            $arr_created[] = ['code' => $create_shipment->status()];
            $this->deleteCheckSession();
            $this->deleteCookie();
            return response()->json($arr_created);
        }
        if ($create_shipment->status() == 201) {
            $arr_created[] = ['code' => $create_shipment->status(), 'message' =>  ' Mã tracking đã tạo thành công'];
        }
        if ($create_shipment->status() == 405) {
            $arr_created[] = ['code' => $create_shipment->status(), 'message' =>  ' Mã tracking đã tồn tại'];
        }
        if ($create_shipment->status() == 422) {
            $arr_created[] = ['code' => $create_shipment->status(), 'message' => 'Mã tracking không được dài hơn 15 ký tự'];
        }
        return response()->json($arr_created);
    }
}
