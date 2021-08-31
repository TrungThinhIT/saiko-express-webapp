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

    public function deleteSession()
    {
        session()->forget('idToken');
    }
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

    public function deleteCookie()
    {
        Cookie::queue(Cookie::forget('idToken'));
    }

    public function IdUserByToken($request)
    {
        $user = Http::withHeaders(
            [
                'Accept' => 'application/json',
                'X-Firebase-IdToken' => $request->idToken,
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
