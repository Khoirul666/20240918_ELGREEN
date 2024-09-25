<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home(){
        
        return view('fe.home');
    }

    public function shop(){
        return view('fe.shop');
    }

    public function about(){
        return view('fe.about');
    }
}
