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
            'trx'=>Trx_Detail::where('no_trx',$no)->get(),
        ];
        // dd($data);
        return view('be.sale_detail',$data);
    }
}
