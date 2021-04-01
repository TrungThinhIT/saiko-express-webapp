<?php

namespace App\Http\Controllers\blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        return view('news.index');
    }
    public function air_cargo()
    {
        return view('news.air_cargo');
    }
    public function air_transport()
    {
        return view('news.air_transport');
    }
    public function terms()
    {
        return view('news.terms');
    }
    public function cosmetic()
    {
        return view('news.cosmetic');
    }
    public function electronic()
    {
        return view('news.electronic');
    }
    public function tracking()
    {
        return view('news.number-tracking');
    }
    public function cost_air()
    {
        return view('news.cost-air');
    }
    public function function_food()
    {
        return view('news.functional-food');
    }
    public function price_cosmetic()
    {
        return view('news.price-cosmetic');
    }
    public function supermarket()
    {
        return view('news.supermarket');
    }
}
