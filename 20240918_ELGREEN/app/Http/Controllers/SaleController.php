<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sale() {
        $data = [
            'sale'=>Sale::
            select('products.nama_produk as nama_produk')->
            addselect('products.hrg_produk as hrg_produk')->
            addselect('products.cat_product as cat_product')->
            addselect('products.color as color')->
            addselect('products.size as size')->
            addselect('sales.created_at as created_at')->
            join('products','sales.id_produk','=','products.id','left')->get(),
        ];
        // dd($data);
        return view('be.sale',$data);
    }
}
