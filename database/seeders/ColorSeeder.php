<?php

namespace Database\Seeders;

use App\Models\Color;
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
        $colors = ['white', 'black', 'red', 'green', 'yellow', 'blue'];

        foreach( $colors as $color) {
            Color::create([
                'name' => $color
            ]);
        }
    }
}
