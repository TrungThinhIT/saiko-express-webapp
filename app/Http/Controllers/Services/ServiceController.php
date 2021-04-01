<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function sea(){
        return view('service.sea');
    }
    public function air(){
        return view('service.fly');
    }
    public function procedure(){
        return view('service.send');
    }
}
