<?php

namespace App\Http\Controllers\shipments;

use App\Http\Controllers\Controller;
use App\Models\phuongxa;
use App\Models\quanhuyen;
use App\Models\tinhthanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShipmentsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        $data = $request->session()->get('idToken');
        $data = unserialize($data);

        $token = $request->idToken ?? $data['idToken'];
        $param_search_shipment = [
            'search' => 'user_id:' . $data['id'],
            'searchFields' => 'user_id:=',
            'page' => $request->page_shipment ?? 1,
            'with' => $request->with,
        ];

        $shipment_info = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ])->get(self::$auth_host . '/api/addresses', $param_search_shipment);

        $user = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ])->get(self::$auth_host . '/api/me');

        if ($shipment_info->status() == 401 && !$request->shipment) {
            $this->deleteCookie();
            return redirect()->route('auth.logout');
        }

        $list_shipment = json_decode($shipment_info->body(), true);
        $user = json_decode($user->body(), true);

        if ($request->shipment) {
            if ($shipment_info->status() == 401) {
                $this->deleteCookie();
                return response()->json(['code' => 401]);
            }
            return response()->json(['list_address' => $list_shipment]);
        }

        $data = array_merge($data, ['list_address' => $list_shipment, 'user' => $user]);
        return view('manager.address', compact('data'));
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
            'X-Firebase-IdToken' => $token
        ])->post(self::$auth_host . '/api/addresses', $param);
        if ($create->status() == 401) {
            $this->deleteCookie();
        }
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
    public function edit($id, Request $request)
    {
        $token = $this->getToken($request);
        $send = Http::withHeaders(
            [
                'Accept' => 'application/json',
                'X-Firebase-IDToken' => $token
            ]
        )->get(self::$auth_host . '/api/addresses/' . $id);

        if ($send->status() == 401 && !$request->order) {
            $this->deleteCookie();
            return response()->json(['code' => 401]);
        }

        $info = json_decode($send, true);

        if ($request->order) {
            return ['info' => $info, 'token' => $token];
        }
        $param_get_fulladdress = [
            'with' => 'district.province'
        ];
        $full_address = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(self::$notification_host . '/api/wards/' . $info['ward_id'], $param_get_fulladdress);

        if ($full_address->status() == 401) {
            $this->deleteCookie();
            return response()->json(['code' => 401]);
        }

        $full_address = json_decode($full_address, true);

        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'country_id:vn',
        ];
        $provinces = Http::withHeaders($header)->get(self::$notification_host . '/api/provinces', $param);

        $provinces = json_decode($provinces->body());

        $data = array_merge($info, ['provinces' => $provinces]);

        $data = array_merge($data, ['full_address' => $full_address]);

        //quanhuyen
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'province_id:' . $full_address['district']['province']['id'],
        ];
        $district_by_province = Http::withHeaders($header)->get(self::$notification_host . '/api/districts', $param);

        $district_by_province = json_decode($district_by_province->body());

        $data = array_merge($data, ['districts' => $district_by_province]);

        //phuongxa
        $header = [
            'Accept' => 'Application/json',
        ];
        $param = [
            'search' => 'district_id:' . $full_address['district']['id'],
        ];
        $ward = Http::withHeaders($header)->get(self::$notification_host . '/api/wards', $param);

        $ward = json_decode($ward->body());
        $data = array_merge($data, ['wards' => $ward]);

        return response()->json(['code' => 200, 'data' => $data]);
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
        $send_update = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $this->getToken($request),
        ])->PUT(self::$auth_host . "/api/addresses/" . $id, $request->all());

        if ($send_update->status() == 401) {
            $this->deleteCookie();
            $this->deleteSession();
        }

        return response()->json(['code' => $send_update->status(), 'message' => $send_update->body()]);
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
                'X-Firebase-IdToken' => $token
            ]
        )->DELETE(self::$auth_host . '/api/addresses/' . $id);
        if ($send->status() == 401) {
            $this->deleteSession();
            $this->deleteCookie();
        }
        return response(['code' => $send->status(), 'message' => $send->body()]);
    }
}
