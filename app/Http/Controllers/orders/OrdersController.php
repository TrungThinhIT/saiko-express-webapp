<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Models\tinhthanh;
use Illuminate\Http\Request;
use App\Http\Controllers\shipments\ShipmentsController as ShipmentsController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{

    public function __construct(ShipmentsController $ShipmentsController)
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
        $token  = $this->getToken($request);
        $customer_id = $this->getUserId($request);
        // return $request->all();
        $header = [
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
            'Accept-Language' => 'vi',
        ];

        $params = [
            'with' => 'trackings;shipmentInfo',
            'page' => $request->page_order ?? 1,
            'search' => 'customer_id:' . $customer_id,
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
        ];

        if ($request->field_search != "all") {

            $params['search'] = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $request->value_search;
            //created
            if ($request->field_search == "created_at") {
                $date_search = Carbon::createFromDate($request->value_search)->format("Y-m-d");
                $params['search'] = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $date_search;
            }
            //status
            if ($request->field_search == "director.status.id") {
                $params['search'] = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $request->status;
            }

            $params['searchJoin'] = 'and';
        };

        $send = Http::withHeaders($header)->get('https://dev-order.tomonisolution.com/api/orders/shipment', $params);

        if ($request->wantsJson()) {
            if ($send->status() == 401) {
                $this->deleteSession();
                $this->deleteCookie();
                return response()->json(['code' => 401]);
            }
        }
        if ($send->status() == 401) {
            return redirect()->route('auth.logout');
        }
        $data = json_decode($send->body(), true);
        foreach ($data['data'] as $key => $value) {
            if (!$value['note']) {
                continue;
            }
            $parse_note = json_decode($value['note']);
            if ($parse_note) {
                $data['data'][$key]['shipment_info']['sender_name'] = $parse_note->send_name ?? "";
                $data['data'][$key]['note'] = $parse_note->note ?? "";
            }
        }

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
    public function create(Request $request)
    {
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'country_id:vn',
        ];
        $provinces = Http::withHeaders($header)->get('https://dev-notification.tomonisolution.com/api/provinces', $param);

        $data = collect(json_decode($provinces->body()));
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
        if (!isset($data['info']['consignee'])) {
            session()->flash('login', "Vui lòng đăng nhập lại");
            $this->deleteSession();
            $this->deleteCookie();
            return  response()->json(['code' => 401]);
        }

        $tracking = explode(" ", $request->tracking);
        $insurance = str_replace(',', '', $request->insurance);
        $special_price = str_replace(',', '', $request->special);

        $arr_created = array();
        $create_shipment = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $this->getToken($request) ? $this->getToken($request) : $request->token,
        ]);

        $create_shipment = $create_shipment->post('https://dev-order.tomonisolution.com/api/orders/shipment/create-with-trackings', [
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
            $this->deleteSession();
            $this->deleteCookie();
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
        $token = $this->getToken($request);

        $header = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ];

        $params = [
            'appends' => 'customer;transactions.receipts;owningBoxes.pivotLadingBills;logs',
            'search' => 'id:' . $id,
            'searchField' => '=',
            'with' => 'shipmentInfo;trackings',
        ];

        $order = Http::withHeaders($header)->get('https://dev-order.tomonisolution.com/api/orders', $params);
        // dd($order->body());
        if ($order->status() == 401) {
            return redirect()->route('auth.logout');
        }
        $data = json_decode($order->body(), true);

        foreach ($data['data'] as $key => $value) {
            $data['data'][$key]['log_transaction'] = $this->log_order($value['logs']);
            if (!$value['note']) {
                continue;
            }
            $parse_note = json_decode($value['note']);
            if ($parse_note) {
                $data['data'][$key]['shipment_info']['sender_tel'] = $parse_note->send_phone ?? "";
                $data['data'][$key]['shipment_info']['sender_name'] = $parse_note->send_name ?? "";
                $data['data'][$key]['note'] = $parse_note->note ?? "";
            }
        }
        $data = ['order' => $data];

        return view('orders.detail', compact('data'));
    }
    public function log_order($logs)
    {
        // dd($logs);
        if (!empty($logs)) {
            $log_transaction = [];
            foreach ($logs as $key => $value) {
                if (!empty($value['content'])) {
                    $keys = implode(",", array_keys($value['content']));
                    if ($keys == "transaction") {
                        array_push($log_transaction, $value);
                    }
                }
            }
            return $log_transaction;
        }
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

    public function listStatus(Request $request)
    {
        $token = $this->getToken($request);

        $header = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
        ];
        $params = [
            'search' => 'directors.type_id:Shipment',
        ];

        $listStatus = Http::withHeaders($header)->get('https://dev-order.tomonisolution.com/api/orders/statuses', $params);

        $listStatus = json_decode($listStatus->body(), true);

        $data = ['listStatus' => $listStatus];

        return response()->json($data);
    }
}
