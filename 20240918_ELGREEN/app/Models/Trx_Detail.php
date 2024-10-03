<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trx_Detail extends Model
{
    use HasFactory;

    protected $table = 'trx_details';

    protected $fillable = [
        'no_trx',
        'id_user',
        'id_produk',
        'color',
        'size',
        'qty_produk',
    ];

    public function produk(){
        return $this->belongsTo(Product::class,'trx_details.id_produk','products.id');
    }
}
