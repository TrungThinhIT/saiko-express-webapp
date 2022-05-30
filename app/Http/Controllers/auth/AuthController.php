<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

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
        ])->post(self::$auth_host . '/api/register', $request->all());


        return response()->json(['code' => $data->status(), 'data' => $data->body()]);
    }

    public function login(Request $request)
    {
        $user = Http::withHeaders(
            [
                'Accept' => 'application/json',
                'X-Firebase-IdToken' => $request->idToken,
            ]
        )->get(self::$auth_host . '/api/me');

        if ($user->status() == 200) {
            $user = json_decode($user->body(), true);
            return response()->json(['code' => 200, 'data' => $user]);
        }

        return response()->json(['code' => $user->status(), 'data' => $user->body()]);
    }

    public function logout(Request $request)
    {
        return redirect()->route('auth.index');
    }

    public function info(Request $request)
    {
        $param_search_account = [
            'search' => 'objectable_id:' . $request->user_id,
        ];
        $account = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $request->idToken,
        ])->get(self::$accounting_host . '/api/accounts', $param_search_account);
        if ($account->status() == 401) {
            return redirect()->route('auth.logout');
        }
        $account = json_decode($account, true);
        $data = array_merge(['id' => $request->user_id], ['account' => $account]);
        return view('manager.information', compact('data'));
    }

    public function updateUser(Request $request)
    {
        // $data = $request->session()->get('idToken');
        // $data = unserialize($data);
        // $token = $data['idToken'];
        // $resultUpdate = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'X-Firebase-IdToken' => $token,
        // ])->put(self::$auth_host . '/api/me/password', $request->all());

        // return response()->json(['code' => $resultUpdate->status(), 'data' => $resultUpdate->body()]);
    }

    public function updateInfo(Request $request)
    {
        $resultUpdate = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $request->idToken,
        ])->put(self::$auth_host . '/api/users/' . $request->user_id, $request->all());

        return response()->json(['code' => $resultUpdate->status(), 'data' => $resultUpdate->body()]);
    }
}
