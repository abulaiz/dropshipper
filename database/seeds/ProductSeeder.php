<?php

use Illuminate\Database\Seeder;
use App\Model\Product\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$prod = new Product();
        $prod->name = 'Super Grow Up';
        $prod->qty = 1;
        $prod->price = 485000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Weight';
        $prod->qty = 1;
        $prod->price = 403000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Perfect Eye';
        $prod->qty = 1;
        $prod->price = 561000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'PB';
        $prod->qty = 1;
        $prod->price = 605000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'PBM';
        $prod->qty = 1;
        $prod->price = 373000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Perfect Slim';
        $prod->qty = 1;
        $prod->price = 410000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Super Grow Up Mini + Bonus';
        $prod->qty = 1;
        $prod->price = 265000;
        $prod->type = 'Paket';
        $prod->weight = 750;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Weight Mini';
        $prod->qty = 1;
        $prod->price = 160000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();


        $prod = new Product();
        $prod->name = 'PB Mini';
        $prod->qty = 1;
        $prod->price = 295000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Perfect Slim Mini';
        $prod->qty = 1;
        $prod->price = 285000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse Super Grow Up';
        $prod->qty = 1;
        $prod->price = 25000;
        $prod->type = 'Box';
        $prod->weight = 500;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Dus Endorse Smart Weight';
        $prod->qty = 1;
        $prod->price = 25000;
        $prod->type = 'Box';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse Perfect Eye';
        $prod->qty = 1;
        $prod->price = 25000;
        $prod->type = 'Box';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse PB';
        $prod->qty = 1;
        $prod->price = 25000;
        $prod->type = 'Box';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse PBM';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Box';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse Perfect Mask';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Box';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Calcium';
        $prod->qty = 1;
        $prod->price = 230000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Calcium Children';
        $prod->qty = 1;
        $prod->price = 243000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Calcium Shutang';
        $prod->qty = 1;
        $prod->price = 282000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Chewable';
        $prod->qty = 1;
        $prod->price = 243000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Jiang Zhi Tea';
        $prod->qty = 1;
        $prod->price = 130000;
        $prod->type = 'Pcs';
        $prod->weight = 350;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Renuves';
        $prod->qty = 150;
        $prod->price = 511000;
        $prod->type = 'Kaps';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Vitaline';
        $prod->qty = 1;
        $prod->price = 310000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Spirulina';
        $prod->qty = 100;
        $prod->price = 343000;
        $prod->type = 'Kaps';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Chitosan';
        $prod->qty = 1;
        $prod->price = 429000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Double Cellulose';
        $prod->qty = 1;
        $prod->price = 255000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Muncord';
        $prod->qty = 1;
        $prod->price = 470000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Grape Extract';
        $prod->qty = 1;
        $prod->price = 577000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Zinc';
        $prod->qty = 1;
        $prod->price = 135000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Diacont';
        $prod->qty = 1;
        $prod->price = 390000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Glucosamine';
        $prod->qty = 1;
        $prod->price = 218000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Shampoo';
        $prod->qty = 1;
        $prod->price = 54000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Conditioner';
        $prod->qty = 1;
        $prod->price = 60000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Spakare Shower Wash';
        $prod->qty = 1;
        $prod->price = 87000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Airiz Panty';
        $prod->qty = 1;
        $prod->price = 57000;
        $prod->type = 'Pcs';
        $prod->weight = 200;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Airiz Day';
        $prod->qty = 1;
        $prod->price = 43000;
        $prod->type = 'Pcs';
        $prod->weight = 200;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Airiz Night';
        $prod->qty = 1;
        $prod->price = 42000;
        $prod->type = 'Pcs';
        $prod->weight = 200;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Starter Kit + New ID';
        $prod->qty = 1;
        $prod->price = 99000;
        $prod->type = 'Pcs';
        $prod->weight = 1000;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Odol';
        $prod->qty = 1;
        $prod->price = 90000;
        $prod->type = 'Pcs';
        $prod->weight = 200;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Pupuk';
        $prod->qty = 1;
        $prod->price = 103000;
        $prod->type = 'Pcs';
        $prod->weight = 1000;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Tiens Health Mattress';
        $prod->qty = 1;
        $prod->price = 18200000;
        $prod->type = 'Pcs';
        $prod->weight = 10000;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Tiens Oli Motor';
        $prod->qty = 1;
        $prod->price = 124000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Kemasan Perfect Mask';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Kemasan PBM';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Kemasan Perfect Eye + Bonus';
        $prod->qty = 1;
        $prod->price = 55000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Bonus Akupuntur';
        $prod->qty = 1;
        $prod->price = 25000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Bonus Honey';
        $prod->qty = 1;
        $prod->price = 35000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Bonus Kacamata';
        $prod->qty = 1;
        $prod->price = 25000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Bonus Gel PM';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Bonus Gel PBM';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 250;
        $prod->save();


        $prod = new Product();
        $prod->name = 'Master Grow Up';
        $prod->qty = 1;
        $prod->price = 290000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();


        $prod = new Product();
        $prod->name = '(MP) Master Weight Gain';
        $prod->qty = 1;
        $prod->price = 110000;
        $prod->type = 'Paket';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = '(MP) V-Beauty';
        $prod->qty = 1;
        $prod->price = 125000;
        $prod->type = 'Paket';
        $prod->weight = 750;
        $prod->save();

        $prod = new Product();
        $prod->name = '(MP) LQ-Man';
        $prod->qty = 1;
        $prod->price = 125000;
        $prod->type = 'Paket';
        $prod->weight = 750;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse Master Grow Up';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse Master Weight';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse V-Beauty';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Dus Endorse LQ-Man';
        $prod->qty = 1;
        $prod->price = 30000;
        $prod->type = 'Pcs';
        $prod->weight = 500;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Extra Packing Dus + Bubble Wrap';
        $prod->qty = 1;
        $prod->price = 10000;
        $prod->type = 'Pcs';
        $prod->weight = 100;
        $prod->save();
    }
}
