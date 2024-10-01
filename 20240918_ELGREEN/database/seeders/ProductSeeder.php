<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['nama_produk'=>'Legging Nyaman','hrg_produk'=>'10','cat_product'=>'2','color'=>'["5"]','size'=>'["2"]','image'=>'["1727249913.png"]']);
        Product::create(['nama_produk'=>'Legging Trend','hrg_produk'=>'99','cat_product'=>'2','color'=>'["6"]','size'=>'["1"]','image'=>'["1727250201.png"]']);
        Product::create(['nama_produk'=>'Shorts','hrg_produk'=>'80','cat_product'=>'3','color'=>'["8"]','size'=>'["3"]','image'=>'["1727250244.png"]']);
        Product::create(['nama_produk'=>'Pro','hrg_produk'=>'30','cat_product'=>'4','color'=>'["5"]','size'=>'["1"]','image'=>'["1727250298.png"]']);
        Product::create(['nama_produk'=>'PW','hrg_produk'=>'15','cat_product'=>'5','color'=>'["7"]','size'=>'["1"]','image'=>'["1727250356.png"]']);
        Product::create(['nama_produk'=>'SB','hrg_produk'=>'11','cat_product'=>'4','color'=>'["3"]','size'=>'["3"]','image'=>'["1727624566.png"]']);
        Product::create(['nama_produk'=>'JCK','hrg_produk'=>'65','cat_product'=>'1','color'=>'["9"]','size'=>'["2"]','image'=>'["1727624581.png"]']);
    }
}
