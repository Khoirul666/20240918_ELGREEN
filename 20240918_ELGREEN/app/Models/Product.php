<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'hrg_produk',
        'cat_product',
        'color',
        'size',
        'image',
    ];

    public function trx_detail(){
        return $this->hasMany(Trx_Detail::class);
    }
}
