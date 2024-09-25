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
        $login_type = filter_var($request->input('e_phone'),FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';

        // dd($request);
        if (Auth::attempt([$login_type=>$request->e_phone,'password'=>$request->password,'role'=>'admin'])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
            // dd('sukses');
        }
        if (Auth::attempt([$login_type=>$request->e_phone,'password'=>$request->password,'role'=>'user'])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
            // dd('sukses');
        }
        // dd($request,Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'admin']),Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'user']));
        return back()->withErrors(['e_phone' => 'Email / Phone yang digunakan salah atau tidak terdaftar',]);
    }
    public function signup(){
        return view('auth.signup');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
