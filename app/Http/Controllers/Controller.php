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
        )->get('https://dev-auth.tomonisolution.com/api/me');

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
