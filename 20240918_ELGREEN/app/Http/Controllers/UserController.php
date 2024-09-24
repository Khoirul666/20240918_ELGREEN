<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        return view('be.user');
    }

    public function add_user(){
        return view('be.user_add');
    }
}
