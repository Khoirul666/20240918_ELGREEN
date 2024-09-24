<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function plogin(Request $request){
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'admin'])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
            // dd('sukses');
        }
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'user'])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
            // dd('sukses');
        }
        // dd($request,Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'admin']),Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'user']));
        return back()->withErrors(['username' => 'Username yang digunakan salah atau tidak terdaftar',]);
    }
    public function signup(){
        return view('auth.signup');
    }
}
