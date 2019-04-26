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
    	$prod->name = 'Super Boy';
    	$prod->qty = 100;
    	$prod->price = 20000;
    	$prod->type = 'Philek';
    	$prod->save();

    	$prod1 = new Product();
    	$prod1->name = 'Super Nil';
    	$prod1->qty = 200;
    	$prod1->price = 30000;
    	$prod1->type = 'Phil';
    	$prod1->save();

    	$prod2 = new Product();
    	$prod2->name = 'Super Super';
    	$prod2->qty = 300;
    	$prod2->price = 20000;
    	$prod2->type = 'Phi';
    	$prod2->save();
    }
}
