<?php

namespace Database\Seeders;

use App\Models\Cat_Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_Product::create(['name' => 'jackets', 'show' => 'Jackets']);
        Cat_Product::create(['name' => 'leggings', 'show' => 'Leggings']);
        Cat_Product::create(['name' => 'shorts', 'show' => 'Shorts']);
        Cat_Product::create(['name' => 'sports-bras', 'show' => 'Sports Bras']);
        Cat_Product::create(['name' => 'tank-tops', 'show' => 'Tank Tops']);
    }
}
