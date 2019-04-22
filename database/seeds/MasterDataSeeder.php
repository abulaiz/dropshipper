<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Model\Master\Courier;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $couriers = [
      	['name' => 'JNE'],
      	['name' => 'J&T'],
      	['name' => 'TIKI'],
      	['name' => 'SiCepat'],
      	['name' => 'PosIndonesia'],
      ];

      //seed master data courier
      foreach ($couriers as $item) {
      	if( !Courier::where('name', $item['name'])->exists() ){
      		$item['name'] = Courier::create(['name' => $item['name']]);
      	}
      }
    }
}
