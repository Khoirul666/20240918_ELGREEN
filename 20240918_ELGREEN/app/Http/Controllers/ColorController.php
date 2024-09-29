<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function color(){
        $data = [
            'color'=>Color::all(),
        ];
        return view('be.color',$data);
    }

    public function add_color(){
        return view('be.color_add');
    }

    public function padd_color(Request $request){
        $slug = Str::slug($request->name_color);
        $oslug = $slug;
        $count = 1;

        while(Color::where('name',$slug)->exists()){
            $slug = $oslug.'-'.$count;
            $count++;
        }
        Color::create([
            'name'=>$slug,
            'show'=>$request->name_color,
            'color'=>$request->color,
        ]);
        return redirect()->route('color');
    }

    public function edit_color($slug){
        $data = [
            'color'=>Color::where('name',$slug)->firstOrFail(),
        ];
        return view('be.color_edit',$data);
    }

    public function pedit_color($slug,Request $request){
        $slg = Str::slug($request->name_color);
        $oslug = $slg;
        $count = 1;

        while(Color::where('name',$slg)->exists()){
            $slg = $oslug.'-'.$count;
            $count++;
        }

        Color::where('name',$slug)->
        update([
            'name'=>$slg,
            'show'=>$request->name_color,
            'color'=>$request->color,
        ]);

        return redirect()->route('color');
    }

    public function delete_color($slug){
        Color::where('name',$slug)->delete();
        DB::statement('alter table colors auto_increment=0');
        return redirect()->route('color');
    }
}
