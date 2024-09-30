<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home(){
        $data=[
            'produk'=>Product::latest()->limit(4)->get(),
        ];
        return view('fe.home',$data);
    }

    public function shop(){
        $data =[
            'produk'=>Product::all(),
        ];
        return view('fe.shop',$data);
    }

    public function shop_detail($id){
        $data = [
            'produk'=>Product::findOrFail($id),
        ];
        return view('fe.shop_detail');
    }

    public function about(){
        return view('fe.about');
    }
}
