<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'celulares y tables',
                'slug' =>  Str::slug('celulares y tables'),
                'icon' => '<i class="fas fa-mobile-alt"></i>'
            ],
            [
                'name' => 'Tv,audio y video',
                'slug' =>  Str::slug('Tv,audio y video'),
                'icon' => '<i class="fas fa-tv"></i>',
            ],
            [
                'name' => 'Consola y videojuegos',
                'slug' =>  Str::slug('Consola y videojuegos'),
                'icon' => '<i class="far fa-game-console-handheld"></i>',
            ],
            [
                'name' => 'Computacion',
                'slug' =>  Str::slug('Computacion'),
                'icon' => '<i class="fas fa-computer-speaker"></i>',
            ],
            [
                'name' => 'Moda',
                'slug' =>  Str::slug('Moda'),
                'icon' => '<i class="fas fa-tshirt"></i>',
            ],
        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
