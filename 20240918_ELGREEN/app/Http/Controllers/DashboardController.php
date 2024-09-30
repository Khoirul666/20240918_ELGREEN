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
        return view('fe.shop_detail',$data);
    }

    public function shop_checkout(Request $request,$slug){
        // https://api.whatsapp.com/send?phone=6285706291308&text=%2ANAma%20Produk%2A%0D%0Aaskpas%0D%0Aasa%0D%0A%2ANAma%20Produk%2A%0D%0Aqiwoqwi%0D%0A2323%0D%0A%2ATotal%2A%0D%0Aajdajsdja
        dd($request,$slug);
    }

    public function about(){
        return view('fe.about');
    }
}
