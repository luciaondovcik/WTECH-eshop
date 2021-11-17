<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Chapman',
            'description' => "Chapman Guitars je gitarová spoločnosť založená v roku 2009 Robom Chapmanom, gitaristom známym predovšetkým zo svojich videí na YouTube.",
        ]);

        Brand::create([
            'name' => 'Pasadena',
            'description' => "Na úpätí Skalistých hôr, v americkej Californii, leží malé mesto Pasadena, opradené povesťami a históriou už od čias divokého západu. Akustické gitary Pasadena sú telom i dušou verné svojmu menu a každým tónom, či akordom nás presviedčajú o svojej nespútanosti a kráse.",
        ]);

        Brand::create([
            'name' => 'Fender',
            'description' => "Fender Musical Instruments Corporation je americký výrobca hudobných nástrojov a zosilňovačov. Túto firmu založil Američan Clarence Leonidas Fender, pod názvom Fender Electric Instrument Manufacturing Company. Spoločnosť sídli v meste Scottsdale v Arizone.",
        ]);

        Brand::create([
            'name' => 'Yamaha',
            'description' => "Yamaha Corporation is the world's largest digital and acoustic piano manufacturer. Yamaha Corporation has been offering its customers several products and services for 131 years. Some of the products offered by this corporation are as follows musical instruments, audio equipment and its subsidiary of Yamaha Motors.",
        ]);

        Brand::create([
            'name' => 'Kurzweil',
            'description' => "Kurzweil Music Systems je výrobce elektronických hudebních nástrojů. Firmu v roce 1982 založil Raymond Kurzweil. Kurzweil byl vývojářem čtecích strojů pro nevidomé a podobné technologie využíval i u těchto nástrojů. První typ kláves byl vytvořen v roce 1983, jednalo se o Kurzweil K250.",
        ]);
    }
}
