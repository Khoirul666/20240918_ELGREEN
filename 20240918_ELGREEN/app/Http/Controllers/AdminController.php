<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $data = [
            'user'=>User::where('role','!=','admin')->count(),
            'product'=>Product::count(),
            'sale'=>10,
        ];
        return view('be.dashboard',$data);
    }
}
