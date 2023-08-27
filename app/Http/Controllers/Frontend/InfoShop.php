<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoShop extends Controller
{
    public function index()
    {

    }
    public function contact()
    {
        return view('frontend.info.contact');
    }
    public function about()
    {
        return view('frontend.info.about-us');
    }
}
