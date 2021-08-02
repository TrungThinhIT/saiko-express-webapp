<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Models\tinhthanh;
use Illuminate\Http\Request;
use App\Http\Controllers\shipments\ShipmentsController as ShipmentsController;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{

    public function __construct(ShipmentsController $ShipmentsController, Request $request)
    {

        $this->shipmentsController = $ShipmentsController;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token  = $this->shipmentsController->getToken($request);
        $customer_id = $this->shipmentsController->getUserId($request);

        $header = [
            'Accept' => 'application/json',
            'Authorization' => $token,
            'Accept-Language' => 'vi',
        ];

        $params = [
            'with' => 'trackings',
            'page' => $request->paginate_order ?? 1,
            'search' => 'customer_id:' . $customer_id,
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
        ];

        $send = Http::withHeaders($header)->get('http://order.tomonisolution.com:82/api/orders/shipment', $params);

        $data = json_decode($send->body(), true);
        if ($request->wantsJson()) {
            return response()->json(['list_orders' => $data]);
        }

        $data = ['list_orders' => $data];

        return view('orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = tinhthanh::all();
        return view('orders.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shipment_id = $request->shipment_id;
        $data = $this->shipmentsController->edit($shipment_id, $request);

        $tracking = explode(" ", $request->tracking);
        $insurance = str_replace(',', '', $request->insurance);
        $special_price = str_replace(',', '', $request->special);

        $arr_created = array();

        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $data['token'],
        ]);

        $create_shipment = $create_shipment->post('http://order.tomonisolution.com:82/api/orders/shipment/create-with-trackings', [
            'shipment_method_id' => $request->method, //đường vận chuyển
            'type' => 'shipment',
            'trackings' => $tracking, //danh sách tracking
            'note' =>  $request->Note,
            'repackage' => $request->Reparking == "true" ? 1 : 0,
            'merge_package' => $request->merge_box ? 1 : 0,
            'insurance_declaration' => floatval($insurance),
            'special_declaration' => floatval($special_price),
            'shipment_info' => [
                'consignee' => $data['info']['consignee'],
                'tel' => $data['info']['tel'],
                'address' => $data['info']['address'],
                'ward_id' =>  $data['info']['ward_id'],
                'sender_name' => $data['info']['sender_name'],
                'sender_tel' => $data['info']['sender_tel']
            ]
        ]);

        if ($create_shipment->status() == 401) {
            return response()->json(['code' => 401]);
        }
        if ($create_shipment->status() == 201) {
            $arr_created[] = ['code' => $create_shipment->status(), 'message' =>  ' Mã tracking đã tạo thành công'];
        }
        if ($create_shipment->status() == 405) {
            $arr_created[] = ['code' => $create_shipment->status(), 'message' =>  ' Mã tracking đã tồn tại'];
        }
        if ($create_shipment->status() == 422) {
            $arr_created[] = ['code' => $create_shipment->status(), 'message' => $create_shipment->body()];
        }
        return response()->json($arr_created);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $token = $this->shipmentsController->getToken($request);

        $header = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'Authorization' => $token,
        ];

        $params = [
            'appends' => 'customer;transactions.receipts;owningBoxes.pivotLadingBills',
            'search' => 'id:' . $id,
            'searchField' => '=',
            'with' => 'shipmentInfo;trackings',
        ];

        $order = Http::withHeaders($header)->get('http://order.tomonisolution.com:82/api/orders', $params);

        $data = json_decode($order->body(), true);
        $data = ['order' => $data];

        return view('orders.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    public function follow()
    {
        return view('orders.follow');
    }
}
