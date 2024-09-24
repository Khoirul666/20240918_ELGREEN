<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Product extends Model
{
    use HasFactory;

    protected $table = 'cat_products';

    protected $fillable = [
        'name',
        'show',
    ];
}
