<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trx extends Model
{
    use HasFactory;

    protected $table = 'trxs';

    protected $fillable = [
        'no_trx',
        'jumlah_trx',
    ];
}
