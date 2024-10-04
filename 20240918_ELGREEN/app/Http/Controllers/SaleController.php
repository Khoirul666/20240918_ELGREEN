<?php

namespace App\Http\Controllers;

use App\Models\Trx;
use App\Models\Product;
use App\Models\Trx_Detail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sale() {
        $data = [
            'trx'=>Trx::all(),
        ];
        // dd($data);
        return view('be.sale',$data);
    }

    public function detail($no){
        $data = [
            'trx'=>Trx_Detail::select('nama_produk')->
            addselect('colors.show as warna_produk')->
            addselect('sizes.show as ukuran_produk')->
            addselect('qty_produk')->
            leftjoin('products','trx_details.id_produk','products.id')->
            leftjoin('colors','trx_details.color','colors.id')->
            leftjoin('sizes','trx_details.size','sizes.id')->
            where('no_trx',$no)->get(),
        ];
        // dd($data);
        return view('be.sale_detail',$data);
    }
}
