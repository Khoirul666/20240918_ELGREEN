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
        Color::create(['name' => 'blue', 'show' => 'Blue','color'=>'#3346ae']);
        Color::create(['name' => 'brown', 'show' => 'Brown','color'=>'#62533f']);
        Color::create(['name' => 'fuchsia', 'show' => 'Fuchsia','color'=>'#de346d']);
        Color::create(['name' => 'green', 'show' => 'Green','color'=>'#368351']);
        Color::create(['name' => 'navy', 'show' => 'Navy','color'=>'#434f5f']);
        Color::create(['name' => 'orange', 'show' => 'Orange','color'=>'#fa8928']);
        Color::create(['name' => 'purple', 'show' => 'Purple','color'=>'#9f5af2']);
        Color::create(['name' => 'red', 'show' => 'Red','color'=>'#ae1616']);
        Color::create(['name' => 'royal-blue', 'show' => 'Royal Blue','color'=>'#2d78d5']);
        Color::create(['name' => 'teal', 'show' => 'Teal','color'=>'#77e7c8']);
    }
}
