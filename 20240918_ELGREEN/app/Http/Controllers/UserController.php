<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(){
        $data = [
            'user'=>User::where('role','!=','admin')->get(),
        ];
        return view('be.user',$data);
    }

    public function add_user(){
        return view('be.user_add');
    }

    public function padd_user(Request $request){
        User::create([
            'username'=>$request->username,
            'password'=>hash::make($request->password),
            'email'=>$request->email,
            'no_hp'=>$request->phone,
            'alamat'=>$request->alamat,
        ]);
        return redirect()->route('user');
    }

    public function edit_user($id){
        $data = [
            'user'=>User::find($id),
        ];
        return view('be.user_edit',$data);
    }

    public function pedit_user(Request $request,$id){
        User::where('id',$id)->
        update([
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
            'no_hp'=>$request->phone,
            'alamat'=>$request->alamat,
        ]);

        return redirect()->route('user');
    }

    public function delete_user(Request $request,$id){
        User::find($id)->delete();
        DB::statement('alter table users auto_increment=0');
        return redirect()->route('user');
    }
}
