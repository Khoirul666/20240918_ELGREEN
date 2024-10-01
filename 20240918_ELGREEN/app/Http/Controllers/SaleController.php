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
            'trx'=>Trx_Detail::select('nama_produk')->addSelect('warna_produk')->addSelect('jumlah_produk')->join('products','trx_details.id_produk','')->where('no_trx',$no)->get(),
        ];
        return view('be.sale_detail',$data);
    }
}
