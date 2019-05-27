<?php

use Illuminate\Database\Seeder;

use App\Model\Master\Courier;
use App\Model\Master\OrderVia;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courier::create([
        	'id' => '1',
        	'name' => 'Sicepat'
        ]);
        Courier::create([
        	'id' => '2',
        	'name' => 'JNE'
        ]);        
        Courier::create([
        	'id' => '3',
        	'name' => 'J&T Express'
        ]);     

        $orderVias = ['Whatsapp', 'Instagram', 'Line', 'BukaLapak', 'Tokopedia', 'Shopee'];
        $i = 1;
        foreach($orderVias as $item){
        	OrderVia::create([
        		'id' => $i, 'name' => $item
        	]);
        	$i++;
        }

    }
}
