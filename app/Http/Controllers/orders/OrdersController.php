<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Models\tinhthanh;
use Illuminate\Http\Request;
use App\Http\Controllers\shipments\ShipmentsController as ShipmentsController;

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
    public function index()
    {
        $data = tinhthanh::all();
        return view('orders.create', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.follow');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
