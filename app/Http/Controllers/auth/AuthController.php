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
        ])->post('https://auth.tomonisolution.com/api/register', $request->all());


        return response()->json(['code' => $data->status(), 'data' => $data->body()]);
    }

    public function login(Request $request)
    {
        $user = Http::withHeaders(
            [
                'Accept' => 'application/json',
                'X-Firebase-IdToken' => $request->idToken,
            ]
        )->get('https://dev-auth.tomonisolution.com/api/me');

        if ($user->status() == 200) {
            $user = json_decode($user->body(), true);
            $token = ['idToken' => $request->idToken];
            $user_token = array_merge($user, $token);
            $value = serialize($user_token);

            session()->put("idToken", $value);

            return response()->json(['code' => 200, 'data' => $user_token]);
        }

        return response()->json(['code' => $user->status(), 'data' => $user->body()]);
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('idToken'));
        session()->forget('idToken');
        return redirect()->route('auth.index');
    }

    public function info(Request $request)
    {
        // dd($request->all());
        $data = $request->session()->get('idToken');
        $data = unserialize($data);
        $token = $data['idToken'];
        //account
        $param_search_account = [
            'search' => 'user_id:' . $data['id'],
            // 'searchFields' => 'user_id:=',
        ];
        $account = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ])->get('https://dev-accounting.tomonisolution.com/api/accounts', $param_search_account);
        if ($account->status() == 401) {
            return redirect()->route('auth.logout');
        }
        $account = json_decode($account, true);
        $data = array_merge($data, ['account' => $account]);
        return view('manager.information', compact('data'));
    }

    public function updateUser(Request $request)
    {

        $data = $request->session()->get('idToken');
        $data = unserialize($data);
        $token = $data['idToken'];
        $resultUpdate = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ])->put('https://dev-auth.tomonisolution.com/api/me/password', $request->all());

        return response()->json(['code' => $resultUpdate->status(), 'data' => $resultUpdate->body()]);
    }
}
