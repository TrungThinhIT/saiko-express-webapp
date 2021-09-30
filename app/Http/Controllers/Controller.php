<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $auth_host,
        $accounting_host,
        $product_host,
        $order_host,
        $warehouse_host,
        $notification_host;

    public function __construct()
    {
        $this->boot();
    }

    public function boot()
    {
        self::$auth_host = config('services.tomonisolution.auth.host');
        self::$accounting_host = config('services.tomonisolution.accounting.host');
        self::$product_host = config('services.tomonisolution.product.host');
        self::$order_host = config('services.tomonisolution.order.host');
        self::$warehouse_host = config('services.tomonisolution.warehouse.host');
        self::$notification_host = config('services.tomonisolution.notification.host');
    }

    public function deleteCheckSession()
    {
        session()->forget('checkToken');
    }

    public function deleteSession()
    {
        session()->forget('idToken');
    }

    public function deleteCookie()
    {
        Cookie::queue(Cookie::forget('idToken'));
    }
    // --------------------------------------
    public function getData($request)
    {
        $data = $request->session()->get('idToken');
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
        if (!$data) {
            return false;
        }
        $token = $data['idToken'];
        return $token;
    }

    // ------------------------------------------
    public function getCheckSession($request)
    {
        $data = $request->session()->get('checkToken');
        if (!$data) {
            return false;
        }
        $data = unserialize($data);

        return $data;
    }

    public function userIdSession($request)
    {
        $data = $this->getCheckSession($request);
        if (!$data) {
            return false;
        }
        $token = $data['id'];
        return $token;
    }

    public function getTokenSession($request)
    {
        $data = $this->getCheckSession($request);
        if (!$data) {
            return false;
        }
        $token = $data['idToken'];
        return $token;
    }

    public function IdUserByToken($request)
    {
        $token_checkSession = $this->getTokenSession(($request));

        $user = Http::withHeaders(
            [
                'Accept' => 'application/json',
                'X-Firebase-IdToken' => $request->idToken ? $request->idToken : $token_checkSession,
            ]
        )->get(self::$auth_host . '/api/me');

        $id = 'sale.se';

        if ($user->status() == 200) {
            $user_detail = json_decode($user->body(), true);
            $id = $user_detail['id'];
            $data = ['code' => $user->status(), 'customer_id' => $id];
            return $data;
        }

        $data = ['code' => $user->status(), 'customer_id' => $id];
        return $data;
    }
}
