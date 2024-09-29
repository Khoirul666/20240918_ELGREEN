<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function size(){
        $data = [
            'size'=>Size::all(),
        ];
        return view('be.size',$data);
    }

    public function add_size(){
        return view('be.size_add');
    }

    public function padd_size(Request $request){
        $slug = Str::slug($request->name_size);
        $oslug = $slug;
        $count = 1;

        while(Size::where('name',$slug)->exists()){
            $slug = $oslug.'-'.$count;
            $count++;
        }
        Size::create([
            'name'=>$slug,
            'show'=>$request->name_size,
        ]);
        return redirect()->route('size');
    }

    public function edit_size($slug){
        $data = [
            'size'=>Size::where('name',$slug)->firstOrFail(),
        ];
        return view('be.size_edit',$data);
    }

    public function pedit_size($slug,Request $request){
        $slg = Str::slug($request->name_size);
        $oslug = $slg;
        $count = 1;

        while(Size::where('name',$slg)->exists()){
            $slg = $oslug.'-'.$count;
            $count++;
        }

        Size::where('name',$slug)->
        update([
            'name'=>$slg,
            'show'=>$request->name_size,
        ]);

        return redirect()->route('size');
    }

    public function delete_size($slug){
        Size::where('name',$slug)->delete();
        DB::statement('alter table sizes auto_increment=0');
        return redirect()->route('size');
    }
}
