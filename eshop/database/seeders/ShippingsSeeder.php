<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Seeder;

class ShippingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipping::create([
            'shipping_price' => 3.5,
            'shipping_type' => 'dpd',
        ]);

        Shipping::create([
            'shipping_price' => 4.5,
            'shipping_type' => 'packeta',
        ]);

        Shipping::create([
            'shipping_price' => 5.5,
            'shipping_type' => 'gls',
        ]);

    }
}
