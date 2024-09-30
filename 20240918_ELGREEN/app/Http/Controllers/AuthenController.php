<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            return redirect()->intended('/');
            // dd('sukses');
        }
        // dd($request,Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'admin']),Auth::attempt(['username'=>$request->username,'password'=>$request->password,'role'=>'user']));
        return back()->withErrors(['e_phone' => 'Email / Phone yang digunakan salah atau tidak terdaftar',]);
    }
    public function signup(){
        return view('auth.signup');
    }
    public function psignup(Request $request){
        // dd($request);
        User::create([
            'username'=>$request->username,
            'password'=>hash::make($request->password),
            'email'=>$request->email,
            'no_hp'=>$request->phone,
            'alamat'=>$request->alamat,
        ]);
        return redirect()->route('login');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
