<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Gitary',
            'slug' => 'gitary'
        ]);
        Category::create([
            'name' => 'Basitary',
            'slug' => 'basgitary'
        ]);
        Category::create([
            'name' => 'Klávesy',
            'slug' => 'klavesy'
        ]);
        Category::create([
            'name' => 'Bicie',
            'slug' => 'bicie'
        ]);
        Category::create([
            'name' => 'Dychy',
            'slug' => 'dychy'
        ]);
        Category::create([
            'name' => 'Sláčiky',
            'slug' => 'slaciky'
        ]);
        Category::create([
            'name' => 'Tradičné',
            'slug' => 'tradicne'
        ]);
    }
}
