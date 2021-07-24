<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie as HttpFoundationCookie;
use Symfony\Component\Mime\Test\Constraint\EmailHtmlBodyContains;

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
        ])->post('http://auth.tomonisolution.com:82/api/register', $request->all());


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

    //api changen port remember
    public function sendLinkResetPassword(Request $request)
    {
        $data = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://auth.tomonisolution.com:82/api/password/email', $request->all());
        return response()->json(['code' => $data->status(), 'data' => $data->body()]);
    }

    public function sendInfoResetPassword(Request $request, $token)
    {
        if (!$request->has('email')) {
            return redirect()->route('auth.index');
        }
        $data = ['token' => $token, 'email' => $request->email];
        return view('login.reset_password', compact('data'));
    }

    //changen port remember
    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $send = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post('http://auth.tomonisolution.com:82/api/password/reset', $data);

        if ($send->status() == 204) {
            return response()->json(['code' => 204, 'message' => "Cập nhật thành công"]);
        } else {
            return response()->json(['code' => $send->status(), 'message' => $send->body()]);
        }
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('token'));
        return redirect()->route('auth.index');
    }

    public function info(Request $request)
    {
        if ($request->cookie('token') == "") {
            $request->session()->flash('login', 'Vui lòng đăng nhập lại');
            if ($request->wantsJson()) {
                return 401;
            }
            return redirect()->route('auth.index');
        }
        $data = $request->cookie('token');
        $data = unserialize($data);

        $token = $data['token_type'] . ' ' . $data['access_token'];

        //account
        $param_search_account = [
            'search' => 'user_id:' . $data['id'],
            'searchFields' => 'user_id:=',
        ];
        $account = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->get('http://accounting.tomonisolution.com:82/api/accounts', $param_search_account);

        $account = json_decode($account, true);
        $data = array_merge($data, ['account' => $account]);

        //book_address
        $param_search_shipment = [
            'search' => 'user_id:' . $data['id'],
            'searchFields' => 'user_id:=',
            'page' => $request->page_shipment ?? 1,
        ];

        $shipment_info = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->get('http://auth.tomonisolution.com:82/api/shipment-infos', $param_search_shipment);

        $shipment_info = json_decode($shipment_info, true);
        if ($request->shipment) {
            return response()->json(['list_address' => $shipment_info]);
        }
        $data = array_merge($data, ['list_address' => $shipment_info]);
        //transactions
        $param_search_transactions = [
            'search' => 'user_id:' . $data['id'],
            'searchFields' => 'user_id:=',
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
            'page' => $request->page_transaction ?? 1,
        ];

        $transactions = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->get('http://accounting.tomonisolution.com:82/api/transactions', $param_search_transactions);

        $transactions = json_decode($transactions, true);
        if ($request->transaction) {
            return response()->json(['transactions' => $transactions]);
        }
        $data = array_merge($data, ['transactions' => $transactions]);

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
