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
        Cat_Product::create(['name' => 'Jackets', 'show' => 'Jackets']);
        Cat_Product::create(['name' => 'Leggings', 'show' => 'Leggings']);
        Cat_Product::create(['name' => 'Shorts', 'show' => 'Shorts']);
        Cat_Product::create(['name' => 'Sports Bras', 'show' => 'Sports Bras']);
        Cat_Product::create(['name' => 'Tank Tops', 'show' => 'Tank Tops']);
    }
}
