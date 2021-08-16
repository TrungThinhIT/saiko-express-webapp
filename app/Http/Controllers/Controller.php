<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function deleteSession(){
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

    public function deleteCookie(){
        Cookie::queue(Cookie::forget('idToken'));
    }

}
