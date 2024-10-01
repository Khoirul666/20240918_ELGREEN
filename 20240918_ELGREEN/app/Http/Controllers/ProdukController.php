<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat_Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProdukController extends Controller
{
    public function produk()
    {
        $data = [
            'product' => Product::all(),
        ];
        return view('be.produk', $data);
    }

    public function add_produk()
    {
        $data = [
            'category' => Cat_Product::all(),
            'color' => Color::all(),
            'size' => Size::all(),
        ];
        return view('be.produk_add', $data);
    }

    public function padd_produk(Request $request)
    {
        $request->validate([
            'image_product.*' => 'required|image|mimes:jpeg,jpg,png,JPEG,JPG,PNG|max:1024',
        ]);

        // dd($request);

        $arr_color = [];
        $arr_size = [];
        $arr_img = [];
        foreach ($request->color as $color) {
            array_push($arr_color, $color);
        }
        foreach ($request->size as $size) {
            array_push($arr_size, $size);
        }
        if ($request->hasfile('image_product')) {
            $count = 1;
            foreach ($request->file('image_product') as $file) {
                // inisiasi,crop dan upload server
                $filename = time() . '-' . $count . '.' . $file->extension();
                $folder_upload = public_path('product_img/' . $filename);

                $fimage = $file;
                $img = Image::make($fimage);

                $w = $img->width();
                $h = $img->height();

                $uk_crop = $w > $h ? $w : $h;
                // dd($w,$h);
                // proses crop
                $img->fit($uk_crop, $uk_crop)->save($folder_upload);
                // $request->image_product->move(public_path('product_img'), $filename);
                // insert kedalam array
                array_push($arr_img, $filename);
                $count++;
            }
        }


        // dd($arr_color,$arr_size,$arr_img);


        Product::create([
            'nama_produk' => $request->name_product,
            'hrg_produk' => $request->price,
            'cat_product' => $request->cat_product,
            'color' => json_encode($arr_color),
            'size' => json_encode($arr_size),
            'image' => json_encode($arr_img),
        ]);
        return redirect()->route('produk');
    }

    public function edit_produk($id)
    {
        $data = [
            'product' => Product::find($id),
            'category' => Cat_Product::all(),
            'color' => Color::all(),
            'size' => Size::all(),
        ];
        return view('be.produk_edit', $data);
    }

    public function pedit_produk(Request $request, $id)
    {
        $arr_color = [];
        $arr_size = [];
        foreach ($request->color as $color) {
            array_push($arr_color, $color);
        }
        foreach ($request->size as $size) {
            array_push($arr_size, $size);
        }

        if ($request->hasFile('image_product')) {
            $arr_img = [];

            $count = 1;
            foreach ($request->file('image_product') as $file) {
                // inisiasi,crop dan upload server
                $filename = time() . '-' . $count . '.' . $file->extension();
                $folder_upload = public_path('product_img/' . $filename);

                $fimage = $file;
                $img = Image::make($fimage);

                $w = $img->width();
                $h = $img->height();

                $uk_crop = $w > $h ? $w : $h;
                // dd($w,$h);
                // proses crop
                $img->fit($uk_crop, $uk_crop)->save($folder_upload);
                // $request->image_product->move(public_path('product_img'), $filename);
                // insert kedalam array
                array_push($arr_img, $filename);
                $count++;
            }

            Product::where('id', $id)->update([
                'nama_produk' => $request->name_product,
                'hrg_produk' => $request->price,
                'cat_product' => $request->cat_product,
                'color' => json_encode($arr_color),
                'size' => json_encode($arr_size),
                'image' => json_encode($arr_img),
            ]);
        } else {
            Product::where('id', $id)->update([
                'nama_produk' => $request->name_product,
                'hrg_produk' => $request->price,
                'cat_product' => $request->cat_product,
                'color' => json_encode($arr_color),
                'size' => json_encode($arr_size),
            ]);
        }

        return redirect()->route('produk');
    }

    public function delete_produk(Request $request, $id)
    {
        Product::find($id)->delete();
        DB::statement('alter table products auto_increment=0');
        return redirect()->route('produk');
    }
}
