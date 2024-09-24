<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['name' => 'Blue', 'show' => 'Blue']);
        Color::create(['name' => 'Brown', 'show' => 'Brown']);
        Color::create(['name' => 'Fuchsia', 'show' => 'Fuchsia']);
        Color::create(['name' => 'Green', 'show' => 'Green']);
        Color::create(['name' => 'Navy', 'show' => 'Navy']);
        Color::create(['name' => 'Orange', 'show' => 'Orange']);
        Color::create(['name' => 'Purple', 'show' => 'Purple']);
        Color::create(['name' => 'Red', 'show' => 'Red']);
        Color::create(['name' => 'Royal Blue', 'show' => 'Royal Blue']);
        Color::create(['name' => 'Teal', 'show' => 'Teal']);
    }
}
