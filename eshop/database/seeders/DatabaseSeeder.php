<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //to je len ze ked dojebes nieco v tabulke tak ti ju zhodi a vytvori zaznamy nanovo
        //php artisan db:seed
//        BrandsTableSeeder::truncate();
//        ProductsTableSeeder::truncate();

        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ShippingsSeeder::class);

    }
}
