<?php

namespace App\Http\Controllers;

use App\Models\Cat_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category(){
        $data = [
            'category'=>Cat_Product::all(),
        ];
        return view('be.category',$data);
    }

    public function add_category(){
        return view('be.category_add');
    }

    public function padd_category(Request $request){
        $slug = Str::slug($request->name_category);
        $oslug = $slug;
        $count = 1;

        while(Cat_Product::where('name',$slug)->exists()){
            $slug = $oslug.'-'.$count;
            $count++;
        }
        Cat_Product::create([
            'name'=>$slug,
            'show'=>$request->name_category
        ]);
        return redirect()->route('category');
    }

    public function edit_category($slug){
        $data = [
            'category'=>Cat_Product::where('name',$slug)->firstOrFail(),
        ];
        return view('be.category_edit',$data);
    }

    public function pedit_category($slug,Request $request){
        $slg = Str::slug($request->name_category);
        $oslug = $slg;
        $count = 1;

        while(Cat_Product::where('name',$slg)->exists()){
            $slg = $oslug.'-'.$count;
            $count++;
        }

        Cat_Product::where('name',$slug)->
        update([
            'name'=>$slg,
            'show'=>$request->name_category
        ]);

        return redirect()->route('category');
    }

    public function delete_category($slug){
        Cat_Product::where('name',$slug)->delete();
        DB::statement('alter table cat_products auto_increment=0');
        return redirect()->route('category');
    }
}
