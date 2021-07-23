<?php

namespace App\Http\Controllers\shipments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class ShipmentsController extends Controller
{
    public function getData($request)
    {
        $data = $request->cookie('token');
        $data = unserialize($data);
        return $data;
    }

    public function getUserID($request)
    {
        $data = $this->getData($request);
        return $data['id'];
    }

    public function getToken($request)
    {
        $data = $this->getData($request);
        $token = $data['token_type'] . ' ' . $data['access_token'];
        return $token;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = ['user_id' => $this->getUserID($request)];
        $token = $this->getToken($request);

        $param = array_merge($request->all(), $user);
        $create = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $token
        ])->post('http://auth.tomonisolution.com:82/api/shipment-infos', $param);

        return response()->json(['code' => $create->status(), 'message' => $create->body()]);
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
    public function destroy($id, Request $request)
    {
        $token = $this->getToken($request);
        $send = Http::withHeaders(
            [
                'Accept' => 'application/json',
                'Authorization' => $token
            ]
        )->DELETE('http://auth.tomonisolution.com:82/api/shipment-infos/' . $id);

        return response(['code' => $send->status(), 'message' => $send->body()]);
    }
}
