<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie as HttpFoundationCookie;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login.login');
    }

    public function register(Request $request)
    {
        $data = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://auth.tomonisolution.com/api/register', $request->all());


        return response()->json(['code' => $data->status(), 'data' => $data->body()]);
    }

    public function login(Request $request)
    {
        $request = array_merge($request->all(), [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'B5nzdSkv85ilDEaOg5leHXCZfup5nZFkxDtIYSWi',
            'scope' => '*',
        ]);
        $datas = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://auth.tomonisolution.com:82/oauth/token', $request);

        if ($datas->status() == 200) {
            $data = json_decode($datas->body(), true);
            $user = Http::withHeaders(
                [
                    'Accept' => 'application/json',
                    'Authorization' => $data['token_type'] . ' ' . $data['access_token']
                ]
            )->get('http://auth.tomonisolution.com:82/api/me');
            if ($user->status() == 200) {
                $user = json_decode($user->body(), true);
                $user_token = array_merge($user, $data);

                $value = serialize($user_token);
                $token = cookie('token', $value, $data['expires_in']);

                return response()->json(['code' => 200, 'data' => $user_token])->withCookie($token);
            }
        }

        return response()->json(['code' => $datas->status(), 'data' => $datas->body()]);
    }

    public function resetPassword(Request $request)
    {
        $data = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://auth.tomonisolution.com:82/api/password/email', $request->all());
        return response()->json(['code' => $data->status(), 'data' => $data->body()]);
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('token'));
        return redirect()->route('auth.index');
    }

    public function info(Request $request)
    {
        $data = $request->cookie('token');
        $data = unserialize($data);
        $param_search_shipment = [
            'search' => 'user_id:' . $data['id'],
            'searchFields' => 'user_id:=',
            'appends' => 'ward.district.province'
        ];
        $shipment_info = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $data['token_type'] . ' ' . $data['access_token']
        ])->get('http://auth.tomonisolution.com:82/api/shipment-infos', $param_search_shipment);
        dd($shipment_info->body());
        return view('login.info', compact('data'));
    }

    public function updateUser(Request $request)
    {
        $data = $request->cookie('token');
        $data = unserialize($data);
        $token = $data['token_type'] . ' ' . $data['access_token'];
        $resultUpdate = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->put('http://auth.tomonisolution.com:82/api/me/password', $request->all());

        return response()->json(['code' => $resultUpdate->status(), 'data' => $resultUpdate->body()]);
    }
}
