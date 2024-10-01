<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
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

    public function shop()
    {
        $data = [
            'produk' => Product::all(),
        ];
        return view('fe.shop', $data);
    }

    public function shop_detail($id)
    {
        $data = [
            'produk' => Product::findOrFail($id),
        ];
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
            $jumlah = $request->qty . "%0D%0A";
            $header = "Hallo Admin *El Green*%0D%0A";
            $req = "Saya ingin membeli%0D%0A";
            $nama_produk = $data_produk->nama_produk . "%0D%0A";
            $warna_produk = $data_color->show . "%0D%0A";
            $size_produk = $data_size->show . "%0D%0A";
            $per = "Mohon dibantu ya!" . "%0D%0A";
            $tq = "Terimakasih";

            // https://api.whatsapp.com/send?phone=6285604202311&text=%2ANama%20Produk%2A%0D%0ASusu%20Ulta%0D%0AHarga%20%3A%2029000%0D%0AWarna%20%3A%20Pink

            // dd($phone,$data_produk,$request);

            $whatsappUrl = "https://wa.me/{$phone}?text={$header}{$req}{$nama_produk}dengan warna {$warna_produk}ukuran {$size_produk}jumlah {$jumlah}{$per}{$tq}";
            return redirect()->away($whatsappUrl);
        }
        // https://api.whatsapp.com/send?phone=6285706291308&text=%2ANAma%20Produk%2A%0D%0Aaskpas%0D%0Aasa%0D%0A%2ANAma%20Produk%2A%0D%0Aqiwoqwi%0D%0A2323%0D%0A%2ATotal%2A%0D%0Aajdajsdja
        else if ($request->has('add')) {
            // Cek Kondisi Cart

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
        foreach ($data_checkout as $checkout) {
            $data_produk = Product::find($checkout->id_produk);
            $data_color = Color::find($checkout->color);
            $data_size = Size::find($checkout->size);
            $list_produk .="======================%0D%0A";
            $list_produk .= $data_produk->nama_produk . "%0D%0A";
            $list_produk .= $data_color->show . "%0D%0A";
            $list_produk .= $data_size->show . "%0D%0A";
        }

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
