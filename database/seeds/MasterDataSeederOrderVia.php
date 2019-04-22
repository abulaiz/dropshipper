<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Model\Master\OrderVia;

class MasterDataSeederOrderVia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordervias = [
        	['name' => 'Bukalapak'],
        	['name' => 'Tokopedia'],
        	['name' => 'Akulaku'],
        	['name' => 'Lazada'],
        ];

        //seed master data ordervia
        foreach ($ordervias as $item) {
        	if (!OrderVia::where('name', $item['name'])->exists() ){
        		$item['name'] = OrderVia::create(['name' => $item['name']]);
        	}
        }
    }
}
