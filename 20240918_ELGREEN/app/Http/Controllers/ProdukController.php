<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat_Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function produk(){
        $data = [
            'product'=>Product::all(),
        ];
        return view('be.produk',$data);
    }

    public function add_produk(){
        $data = [
            'category'=>Cat_Product::all(),
            'color'=>Color::all(),
            'size'=>Size::all(),
        ];
        return view('be.produk_add',$data);
    }

    public function padd_produk(Request $request){
        $filename=time().'.'.$request->image_product->extension();
        $request->image_product->move(public_path('product_img'),$filename);
        Product::create([
            'nama_produk'=>$request->name_product,
            'hrg_produk'=>$request->price,
            'cat_product'=>$request->cat_product,
            'color'=>$request->color,
            'size'=>$request->size,
            'image'=>$filename,
        ]);
        return redirect()->route('produk');
    }

    public function edit_produk($id){
        $data = [
            'product'=>Product::find($id),
            'category'=>Cat_Product::all(),
            'color'=>Color::all(),
            'size'=>Size::all(),
        ];
        return view('be.produk_edit',$data);
    }

    public function pedit_produk(Request $request,$id){
        if($request->hasFile('image_product')){
            $filename=time().'.'.$request->image_product->extension();
        $request->image_product->move(public_path('product_img'),$filename);
        Product::where('id',$id)->
        update([
            'nama_produk'=>$request->name_product,
            'hrg_produk'=>$request->price,
            'cat_product'=>$request->cat_product,
            'color'=>$request->color,
            'size'=>$request->size,
            'image'=>$filename,
        ]);
        }
        else{
        Product::where('id',$id)->
        update([
            'nama_produk'=>$request->name_product,
            'hrg_produk'=>$request->price,
            'cat_product'=>$request->cat_product,
            'color'=>$request->color,
            'size'=>$request->size,
        ]);
        }

        return redirect()->route('produk');
    }

    public function delete_produk(Request $request,$id){
        Product::find($id)->delete();
        DB::statement('alter table products auto_increment=0');
        return redirect()->route('produk');
    }
}