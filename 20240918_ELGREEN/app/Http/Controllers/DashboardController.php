<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Trx;
use App\Models\Trx_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function home()
    {
        $data = [
            'produk' => Product::latest()->limit(4)->get(),
        ];
        return view('fe.home', $data);
    }

    public function data_shop(){
        $data_produk = Product::latest();
        // get data all size dan jadikan size yang ada pada produk
        $size = $data_produk->select('size');
        $arr_size = [];
        foreach($size->get() as $size){
            $convert_json = json_decode($size,true);
            foreach($convert_json as $cj){
                foreach(json_decode($cj) as $jd){
                    $inar = in_array($jd,$arr_size);
                    if($inar==FALSE){
                        array_push($arr_size,$jd);
                    }
                }
            }
        }
        $size_collect = collect([]);
        foreach(Size::all() as $size){
            $inarr = in_array($size->id,$arr_size);
            if($inarr){
                $size_collect->push([
                    'id'=>$size->id,
                    'name'=>$size->name,
                    'show'=>$size->show
                ]);
            }
        }
        // get data all color dan jadikan color yang ada pada produk
        $color = $data_produk->select('color');
        $arr_color = [];
        foreach($color->get() as $color){
            $convert_json = json_decode($color,true);
            foreach($convert_json as $cj){
                foreach(json_decode($cj) as $jd){
                    $inar = in_array($jd,$arr_color);
                    if($inar==FALSE){
                        array_push($arr_color,$jd);
                    }
                }
            }
        }
        $color_collect = collect([]);
        foreach(Color::all() as $color){
            $inarr = in_array($color->id,$arr_color);
            if($inarr){
                $color_collect->push([
                    'id'=>$color->id,
                    'name'=>$color->name,
                    'show'=>$color->show,
                    'color'=>$color->color
                ]);
            }
        }
        $data = [
            // 'produk' => $produk->get(),
            'min' => intval($data_produk->min('hrg_produk')),
            'max' => intval($data_produk->max('hrg_produk')),
            'size' => $size_collect,
            'color' => $color_collect,
            'url_ajax_shop' => route('home'),
        ];
        // dd($data);
        return $data;
    }

    public function shop()
    {
        $data = $this->data_shop();
        return view('fe.shop', $data);
    }

    public function shop_get_data(Request $request){
        $produk = Product::query();
        if(request()->menu){
            if(request()->menu=="new_arrivals"){
                $produk->latest()->limit(4);
            }
        }
        // Price
        $min = $request->input('min');
        $max = $request->input('max');
        $produk->whereBetween('hrg_produk',[$min,$max]);
        // Color
        $color = $request->input('color');
        if(is_array($color)){
            foreach($color as $value){
                // $color = $value;
                $produk->whereJsonContains('color',$value);
            }
        }
        // Color
        $size = $request->input('size');
        if(is_array($size)){
            foreach($size as $value){
                // $size = $value;
                $produk->whereJsonContains('size',$value);
            }
        }
        // Sort By
        if(request()->sby){
            if(request()->sby=='recommended'){
                $produk->orderBy('recom','DESC')->get();
            }
            if(request()->sby=='newest'){
                $produk->orderBy('created_at','DESC')->get();
            }
            if(request()->sby=='price_ascending'){
                $produk->orderBy('hrg_produk','ASC')->get();
            }
            if(request()->sby=='price_descending'){
                $produk->orderBy('hrg_produk','DESC')->get();
            }
            if(request()->sby=='name_ascending'){
                $produk->orderBy('nama_produk','ASC')->get();
            }
            if(request()->sby=='name_descending'){
                $produk->orderBy('nama_produk','DESC')->get();
            }
        }
        $data = [
            // 'cek'=> $color,
            'produk'=>$produk->get(),
            'min'=>$request->input('min'),
            'max'=>$request->input('max'),
            'color'=>$request->input('color'),
            'size'=>$request->input('size'),
            'sby'=> $request->input('sby'),
        ];
        // dd(request()->data_array);
        return response()->json($data);
    }

    public function shop_category($category){
        if($category=='best_seller'){
            $data = $this->data_shop();
            return view('fe.shop_best_seller',$data);
        }
        elseif($category=='new_arrivals'){
            $data = $this->data_shop();
            return view('fe.shop_new_arrivals',$data);
        }
        elseif($category!='best_seller'&&$category!='new_arrivals'){
            $data = $this->data_shop();
            return view('fe.shop_category',$data);
        }
        // dd($category);
    }

    public function shop_detail($id)
    {
        $produk = new Product;
        $data = [
            'p_prev' => $produk->where('id','<',$id)->first(),
            'produk' => $produk->find($id),
            'p_nex' => $produk->where('id','>',$id)->first(),
        ];
        // dd($data);
        return view('fe.shop_detail', $data);
    }

    public function shop_checkout(Request $request, $slug)
    {
        $request->validate([
            'c_pick' => 'required',
        ]);

        if ($request->has('buy')) {

            $phone = "6285604202311";
            $data_produk = Product::find($slug);
            $data_color = Color::find($request->c_pick);
            $data_size = Size::find($request->size);
            $jumlah = $data_produk->hrg_produk * $request->qty;
            $header = "Hallo Admin *El Green*%0D%0A";
            $req = "Saya ingin membeli%0D%0A%0D%0A";
            $list_produk = "";
            $list_produk .= "======================%0D%0A";
            $list_produk .= 'Nama Produk ' . $data_produk->nama_produk . "%0D%0A";
            $list_produk .= 'Harga Produk Rp. ' . number_format($data_produk->hrg_produk, 0, ',', '.') . "%0D%0A";
            $list_produk .= 'Warna ' . $data_color->show . "%0D%0A";
            $list_produk .= 'Ukuran ' . $data_size->show . "%0D%0A";
            $list_produk .= 'Jumlah ' . $request->qty . "%0D%0A";
            $list_produk .= "======================%0D%0A";
            $list_produk .= "Total Pesanan Rp. " . number_format($jumlah, 0, ',', '.') . "%0D%0A";
            $per = "Mohon dibantu ya!" . "%0D%0A";
            $tq = "Terimakasih";


            $no_trx = time();

            Trx::create([
                'no_trx' => $no_trx,
                'jumlah_trx' => $data_produk->hrg_produk * $request->qty,
            ]);

            Trx_Detail::create([
                'no_trx' => $no_trx,
                'id_user' => Auth()->user()->id,
                'id_produk' => $slug,
                'color' => $request->c_pick,
                'size' => $request->size,
                'qty_produk' => $request->qty,
            ]);

            $whatsappUrl = "https://wa.me/{$phone}?text={$header}{$req}{$list_produk}%0D%0A{$per}{$tq}";
            return redirect()->away($whatsappUrl);
        } else if ($request->has('add')) {
            Cart::create([
                'id_user' => Auth()->user()->id,
                'id_produk' => $slug,
                'color' => $request->c_pick,
                'size' => $request->size,
                'qty_produk' => $request->qty,
            ]);

            return redirect()->back();
        }
        return redirect()->route('shop');
    }

    public function cart()
    {
        $subtotal = 0;
        $cart_shop = Cart::where('id_user', Auth()->user()->id)->get();
        foreach ($cart_shop as $cart) {
            // dd(Product::find($cart->id_produk)['hrg_produk']);
            $subtotal = $subtotal + (Product::find($cart->id_produk)['hrg_produk'] * $cart->qty_produk);
        }

        $data = [
            'produk' => $cart_shop,
            'subtotal' => $subtotal,
        ];
        // dd($data);
        return view('fe.cart', $data);
    }

    public function cart_checkout()
    {
        $data_checkout = Cart::where('id_user', Auth()->user()->id)->get();
        $phone = "6285604202311";
        $header = "Hallo Admin *El Green*%0D%0A";
        $req = "Saya ingin membeli%0D%0A%0D%0A";
        $per = "Mohon dibantu ya!" . "%0D%0A";
        $tq = "Terimakasih";
        $list_produk = "";

        // insert ke TRX
        $no_trx = time();
        $jumlah = 0;

        foreach ($data_checkout as $checkout) {
            $data_produk = Product::find($checkout->id_produk);
            $data_color = Color::find($checkout->color);
            $data_size = Size::find($checkout->size);

            // create pesan
            $list_produk .= "======================%0D%0A";
            $list_produk .= 'Nama Produk ' . $data_produk->nama_produk . "%0D%0A";
            $list_produk .= 'Warna ' . $data_color->show . "%0D%0A";
            $list_produk .= 'Ukuran ' . $data_size->show . "%0D%0A";
            $list_produk .= 'Jumlah ' . $checkout->qty_produk . "%0D%0A";

            // jumlah all
            $jumlah = $jumlah + ($data_produk->hrg_produk * $checkout->qty_produk);

            Trx_Detail::create([
                'no_trx' => $no_trx,
                'id_user' => Auth()->user()->id,
                'id_produk' => $checkout->id_produk,
                'color' => $checkout->color,
                'size' => $checkout->size,
                'qty_produk' => $checkout->qty_produk,
            ]);
        }

        $list_produk .= "======================%0D%0A";
        $list_produk .= "Total Pesanan Rp. {$jumlah}%0D%0A";

        Trx::create([
            'no_trx' => $no_trx,
            'jumlah_trx' => $jumlah,
        ]);

        Cart::where('id_user', Auth()->user()->id)->delete();
        DB::statement('alter table carts auto_increment=0');

        $whatsappUrl = "https://wa.me/{$phone}?text={$header}{$req}{$list_produk}%0D%0A{$per}{$tq}";
        return redirect()->away($whatsappUrl);
    }

    public function dcart(Request $request)
    {
        Cart::find($request->produk)->delete();
        DB::statement('alter table carts auto_increment=0');
        return redirect()->route('cart');
    }

    public function about()
    {
        return view('fe.about');
    }
}