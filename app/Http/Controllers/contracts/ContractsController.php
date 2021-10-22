<?php

namespace App\Http\Controllers\contracts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id = $this->getUserID($request);
        $token = $this->getToken($request);
        $header = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $token
        ];
        $search = 'customer_id:' . $customer_id;
        $searchField = 'customer_id:=';

        if ($request->wantsJson()) {
            if ($request->field_search == "all") {
                $search = 'customer_id:' . $customer_id;
                $searchField = 'customer_id:=';
            }
            if ($request->field_search == "id") {
                $search = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $request->id_contract;
                $searchField = 'customer_id:=;id:=';
            }
            if ($request->field_search == "closed") {
                $search = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $request->closed;
                $searchField = 'customer_id:=;closed:=';
            }
            if ($request->field_search == "start_date") {
                $search = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $request->start_date;
                $searchField = 'customer_id:=;start_date:=';
            }
            if ($request->field_search == "end_date") {
                $search = 'customer_id:' . $customer_id . ';' . $request->field_search . ':' . $request->end_date;
                $searchField = 'customer_id:=;end_date:=';
            }
        }
        $params = [
            'appends' => 'service_fee;shipping_fee',
            'search' => $search,
            'searchField' => $searchField,
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
            'searchJoin' => 'and',
            'page' => $request->page ?? 1,
        ];

        $send = Http::withHeaders($header)->get(self::$order_host . '/api/contracts', $params);
        $data = json_decode($send->body(), true);

        if ($request->wantsJson()) {
            if ($send->status() == 401) {
                $this->deleteCookie();
                $this->deleteSession();
                return response()->json(['code' => 401]);
            }
            return response()->json(['list_contracts' => $data, 'code' => $send->status()]);
        }

        if ($send->status() == 401) {
            $this->deleteCookie();
            $this->deleteSession();
            return redirect()->route('auth.logout');
        }


        $data = ['list_contracts' => $data, 'code' => $send->status()];
        return view('contract.index', compact('data'));
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
    public function store(Request $request)
    {
        //
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
            'X-Firebase-IDToken' => $token
        ];

        $params = [
            'appends' => 'transactions.type;logs;service_fee;service_fee_outstanding;service_fee_unsolved;shipping_fee;shipping_fee_air;shipping_fee_sea;compensation_debited;compensation_unsolved',
            'with' => 'orders.trackings;orders.shipmentInfo',
        ];

        $send = Http::withHeaders($header)->get(self::$order_host . '/api/contracts/' . $id, $params);

        if ($send->status() == 401) {
            $this->deleteCookie();
            $this->deleteSession();
            return redirect()->route('auth.logout');
        }
        $data = json_decode($send->body(), true);
        // dd($data);
        if (!empty($data['orders'])) {
            $list_orders = collect($data['orders']);
            $orders_key_string = implode(',', $list_orders->pluck('id')->all()); // dd($orders_key_string);

            $data_box = $this->getListBoxes($orders_key_string, $token, $request); //get boxes

            if (isset($data_box['data'])) {
                $obj_boxes = json_encode($data_box['data']);

                if (!empty($data_box['data'])) {
                    $list_boxes = collect($data_box['data']);
                    $orders = collect();
                    $list_orders = $list_orders->each(function ($value) use ($list_boxes, $orders) {
                        $boxes = $list_boxes->where('owners.0.order_id', $value['id']);
                        //tính tổng khối lượng
                        $weight = $boxes->map(function ($box_value) {
                            return $box_value['weight_per_box'] * $box_value['quantity_of_owners'];
                        });
                        $weight = collect($weight)->sum();

                        //tính thể tích tổng số box
                        $volumne = $boxes->map(function ($box_value) {
                            return $box_value['volume_per_box'] * $box_value['quantity_of_owners'];
                        });
                        // dd($volumne);
                        $volumne = collect($volumne)->sum() / 1000000;

                        //tổng box theo order
                        $quantity_box = $boxes->sum('quantity_of_owners');

                        //set value vao order
                        $value['quantity_box'] = $quantity_box;
                        $value['total_weight'] = round($weight, 3);
                        $value['volumne'] = round($volumne, 3);
                        $orders->push($value);
                    });
                    $data['orders'] = $orders->toArray();
                }
            }
        }
        return view('contract.detail', compact('data'));
    }

    public function getListBoxes($orders_key_string, $token, $request)
    {
        $header_box = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $token
        ];

        $params_box = [
            'scope_area' => 'tochigi-jp',
            'search' => 'owners.order_id:' . $orders_key_string,
            'searchFields' => 'owners.order_id:in',
            'with' => 'owners;sfa'
        ];

        $get_boxes = Http::withHeaders($header_box)->get(self::$warehouse_host . '/api/boxes', $params_box);

        if ($get_boxes->status() == 401) {
            $this->deleteCookie();
            $this->deleteSession();

            if ($request->wantsJson()) {
                return ['code' => $get_boxes->status(), 'data' => json_decode($get_boxes->body(), true)];
            }

            return redirect()->route('auth.logout');
        }
        if ($request->wantsJson()) {
            return ['code' => $get_boxes->status(), 'data' => json_decode($get_boxes->body(), true)];
        }
        return json_decode($get_boxes->body(), true);
    }

    public function getBoxes(Request $request)
    {
        $token = $this->getToken($request);
        $boxes = $this->getListBoxes($request->order_id, $token, $request);
        if (!isset($boxes['data']['data'])) {
            return response()->json($boxes);
        }
        return response()->json($boxes);
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
