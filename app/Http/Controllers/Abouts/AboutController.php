<?php

namespace App\Http\Controllers\Abouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function details()
    {
        return view('about-us.details');
    }
    public function faqs()
    {
        return view('about-us.faqs');
    }
    public function policy()
    {
        return view('about-us.chinhsach');
    }
    public function gallery()
    {
        return view('about-us.gallery');
    }
    public function index()
    {
        return view('about-us.us');
    }
}
