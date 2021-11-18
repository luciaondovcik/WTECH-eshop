<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'brand_id' => 1,
            'name' => 'Chapman Guitars ML1B Modern Storm Burst',
            'price' => 759,
            'discount' => 0,
            'category' => 'Gitary',
            'color' => 'čierna',
            'availability' => 'dostupné',
            'description' => "Ak máte radi agresívne, melodické a silné nástroje s rozšírenou menzúrou, nehľadajte nič iné ako ML1 Modern Baritone. Je nabitý strunami s hrúbkou 10-46 vďaka čomu sa môžete bez námahy naladiť na drop A a otriasť nebesami. Každá nota má extrémnu silu a hutnosť, čo zabezpečujú humbuckery Seymour Duncan Pegasus a Sentient.\n\n
                            Nenechajte sa však zmiasť myšlienkou, že ML1 Modern Baritone je jednoducho len „djentový stroj“. So svojím mahagónovým telom, javorovým krkom so saténovým povrchom a ebenovým hmatníkom je pre vás pripravená skutočná hojnosť tónov po stlačení trojpolohového prepínača alebo potiahnutím potenciometra s funkciou rozdelenia snímačov na single coil.\n\n
                            Akčná gitara nabitá funkciami, ako sú valcované hrany a uzamykacie ladiace mechaniky, zakončená prírodným naturálnym bindingom.",
        ]);

        Product::create([
            'brand_id' => 2,
            'name' => 'Pasadena ST-11 Biela',
            'price' => 82.55,
            'discount' => 0,
            'category' => 'Gitary',
            'color' => 'biela',
            'availability' => 'dostupné',
            'description' => "Elektrická gitara - Stratocaster spoločnosti Pasadena. Všestranná gitara je vyrobená z kvalitných materiálov – lipové telo, krk vyrobený z Kanadského javora a javorový hmatník (model sa vyrába aj s palisandrovým hmatníkom). Gitara je vybavená 3 single snímačmi, ktoré zabezpečujú vynikajúci plný tón v celom frekvenčnom rozsahu."
        ]);

        Product::create([
            'brand_id' => 3,
            'name' => 'Fender Squier Affinity Series Stratocaster HSS Pack MN Lake Placid Blue',
            'price' => 289,
            'discount' => 10,
            'category' => 'Gitary',
            'color' => 'modrá',
            'availability' => 'dostupné',
            'description' => "Squier® Affinity Series ™ Stratocaster® HSS, vstupná brána do osvedčenej rodiny Fender®, prináša legendárny dizajn a typický tón pre moderného gitaristu. Tento Strat® ponúka niekoľko vylepšení, ako je tenké a ľahké telo, tenký a pohodlný profil krku v tvare „C“, 2-bodová tremolo kobylka pre vynikajúcu prácu s tremolom a zapečatené die-cast ladiace mechaniky s delenými hriadeľmi pre plynulé, presné ladenie a ľahké prestrunenie. Tento model je vybavený humbucker snímačom Squier a single-coil snímačmi pri krku a v strede pre zvukovo žánrovú rozmanitosť a je pripravený sprevádzať každého hráča v akejkoľvek fáze.\n
                            Zosilňovač Frontman 15G, ktorý prináša 15 wattov čistého tónu Fender, ponúka čisté aj overdrive kanály, trojpásmový ekvalizér, konektor pre slúchadlá na tiché cvičenie a pomocný vstup na pripojenie mediálneho zariadenia. Set Squier Affinity Stratocaster HSS Pack obsahuje pribalenú polstrovanú tašku, trsátka, popruh a 10' kábel. Má všetko, čo potrebujete, aby sa vaša afinita k hudbe stala celoživotnou vášňou.",
        ]);

        Product::create([
            'brand_id' => 3,
            'name' => 'Fender Squier Affinity Series Stratocaster HSS Pack LRL Charcoal Frost Metallic',
            'price' => 289,
            'discount' => 0,
            'category' => 'Gitary',
            'color' => 'modrá',
            'availability' => 'nedostupné',
            'description' => "Squier® Affinity Series ™ Stratocaster® HSS, vstupná brána do osvedčenej rodiny Fender®, prináša legendárny dizajn a typický tón pre moderného gitaristu. Tento Strat® ponúka niekoľko vylepšení, ako je tenké a ľahké telo, tenký a pohodlný profil krku v tvare „C“, 2-bodová tremolo kobylka pre vynikajúcu prácu s tremolom a zapečatené die-cast ladiace mechaniky s delenými hriadeľmi pre plynulé, presné ladenie a ľahké prestrunenie. Tento model je vybavený humbucker snímačom Squier a single-coil snímačmi pri krku a v strede pre zvukovo žánrovú rozmanitosť a je pripravený sprevádzať každého hráča v akejkoľvek fáze.\n
                            Zosilňovač Frontman 15G, ktorý prináša 15 wattov čistého tónu Fender, ponúka čisté aj overdrive kanály, trojpásmový ekvalizér, konektor pre slúchadlá na tiché cvičenie a pomocný vstup na pripojenie mediálneho zariadenia. Set Squier Affinity Stratocaster HSS Pack obsahuje pribalenú polstrovanú tašku, trsátka, popruh a 10' kábel. Má všetko, čo potrebujete, aby sa vaša afinita k hudbe stala celoživotnou vášňou.",
        ]);

        Product::create([
            'brand_id' => 4,
            'name' => 'Yamaha P 116 M Polished Ebony black',
            'price' => 7419,
            'discount' => 30,
            'category' => 'Klávesy',
            'color' => 'čierna',
            'availability' => 'dostupné',
            'description' => "Pianino zo série P 116, stredná trieda s tradičným skriňovým dizajnom vhodné najmä pre ZUŠ a študentov, ponúka hráčovi komfort pri hraní, sýty zvuk a tónovú rovnováhu, disponuje 88 kvalitnými a vyváženými klávesmi, 3 pedálmi, aj napriek výške 116cm Vás ohromí svojim mohutným zvukom s obrovským potenciálom, rozmery 116 x 152 x 58 cm, váha 216kg, prevedenie Polished Ebony.",
        ]);

        Product::create([
            'brand_id' => 4,
            'name' => 'Yamaha P 116 M Polished Ebony white',
            'price' => 7419,
            'discount' => 30,
            'category' => 'Klávesy',
            'color' => 'biela',
            'availability' => 'dostupné',
            'description' => "Pianino zo série P 116, stredná trieda s tradičným skriňovým dizajnom vhodné najmä pre ZUŠ a študentov, ponúka hráčovi komfort pri hraní, sýty zvuk a tónovú rovnováhu, disponuje 88 kvalitnými a vyváženými klávesmi, 3 pedálmi, aj napriek výške 116cm Vás ohromí svojim mohutným zvukom s obrovským potenciálom, rozmery 116 x 152 x 58 cm, váha 216kg, prevedenie Polished Ebony.",
        ]);

        Product::create([
            'brand_id' => 4,
            'name' => 'Yamaha MODX6',
            'price' => 1199,
            'discount' => 0,
            'category' => 'Klávesy',
            'color' => 'čierna',
            'availability' => 'dostupné',
            'description' => "Yamaha MODX6 je 61-kľúčovým modelom cenovo dostupných syntetizátorov novej generácie MODX novej generácie. Rad Yamaha MODX, ktorý je dodávaný so špičkovou technológiou Yamaha, ktorá je vlajkovou loďou Montage, obsahuje množstvo najmodernejších inovácií svojich predchodcov MOXF, vrátane vzorového a syntetického motora AWM2 obohateného o osemkrát viac tvarov vĺn, výkonného nového 8-operátora FM -X motor modernizovaný pre neuveriteľne dynamickú soniku a zložitý zvukový dizajn a syntéza riadenia pohybu pre bezproblémovú integráciu a výkonné ovládanie oboch zvukových motorov.",
        ]);

        Product::create([
            'brand_id' => 5,
            'name' => 'Kurzweil KP110',
            'price' => 240,
            'discount' => 0,
            'category' => 'Klávesy',
            'color' => 'čierna',
            'availability' => 'nedostupné',
            'description' => "Keyboard s klaviatúrou so 61 dynamickými synth klávesami. Piano umožňuje nastavenie 3 typov odozvy klaviatúry a ponúka polyfóniu 128 hlasov. Multi funkčný LCD displej výrazne napomáha pri celkovom ovládaní a výbere z bohatej ponuky až 653 zvukov. Nástroj ponúka okrem zvukov aj 48 pamäťových miest pre uloženie obľúbených zvukov a nastavení. Samozrejmosťou je funkcia Split a Layer a plná transpozícia v rozpätí +/- 1 oktáva. K dispozícii je aj trojica efektov EQ, Reverb a Chorus, ktoré obohacujú finálny zvuk. Pri skladaní vlastných trackov určite poteší vstavaný šesťkanálový sekvencér s pamäťou pre 10 skladieb a 240 prednahratých patternov rôznych žánrov. Pomerne bohatá je aj konektorová výbava, ktorá ponúka dvojicu výstupov pre Audio Out, ďalej stereo Audio In, USB port, výstup pre slúchadlá a vstup pre mikrofón. Rozmery: 13,3 x 95,6 x 36 cm. Hmotnosť: 5,3 kg. Súčasťou balenia je aj adaptér a držiak na noty. Farebné prevedenie: Black.",
        ]);
    }
}
