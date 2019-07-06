<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{

	private $key = '0dc41785e08debe687ea8331bfd22ed3';

	private $originCity = [
		'id' => 155, 'name' => 'Kota Jakarta Utara'
	];

	private $originSubdistrict = [
		'id' => 2123, 'name' => 'Cilincing'
	];

    public function province(){
		$curl = \curl_init();

		\curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: " . $this->key
		  ),
		));

		$response = json_decode(\curl_exec($curl));
		$err = \curl_error($curl);

		\curl_close($curl);

		if ($err) {
		  return response()->json(['success' => false]);
		} else {
		  return response()->json(['success' => true, 'data' => $response->rajaongkir->results ]);
		}    	
    }

    public function city($province_id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=".$province_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ". $this->key
		  ),
		));

		$response = json_decode(\curl_exec($curl));
		$err = \curl_error($curl);

		\curl_close($curl);

		if ($err) {
		  return response()->json(['success' => false]);
		} else {
		  return response()->json(['success' => true, 'data' => $response->rajaongkir->results ]);
		}    	  	
    }

    public function subdistrict($city_id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=". $city_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ". $this->key
		  ),
		));

		$response = json_decode(\curl_exec($curl));
		$err = \curl_error($curl);

		\curl_close($curl);

		if ($err) {
		  return response()->json(['success' => false]);
		} else {
		  return response()->json(['success' => true, 'data' => $response->rajaongkir->results ]);
		}   	
    }

    public function international(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/v2/internationalDestination",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: " . $this->key
		  ),
		));

		$response = json_decode(\curl_exec($curl));
		$err = \curl_error($curl);

		\curl_close($curl);

		if ($err) {
		  return response()->json(['success' => false]);
		} else {
		  return response()->json(['success' => true, 'data' => $response->rajaongkir->results ]);
		}  

    }

    public function getPrice(Request $req){
    	// $req index :
    	// 'type' = 'domestik' / 'international' ,
    	// 'destination', 'weight', 'courier'
    	$couriers = ['sicepat', 'jne', 'jnt'];
    	$courier = $couriers[$req->courier-1];
    	if($req->type == 'domestik'){
    		$postData = "originType=subdistrict&destinationType=subdistrict";
    		$postData .= "&origin=".$this->originSubdistrict['id']."&destination=".$req->destination;
    		$postData .= "&weight=".$req->weight."&courier=".$courier;
    	} else {
    		$postData = "origin=".$this->originCity['id']."&destination=".$req->destination;
    		$postData .= "&weight=".$req->weight."&courier=".$courier;
    	}

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $req->type == 'domestik' ? "https://pro.rajaongkir.com/api/cost" : "https://pro.rajaongkir.com/api/v2/internationalCost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $postData,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: " . $this->key
		  ),
		));

		$response = json_decode(\curl_exec($curl));
		$err = \curl_error($curl);

		\curl_close($curl);

		if ($err) {
		  return response()->json(['success' => false]);
		} else {
		  return response()->json(['success' => true, 'data' => $response->rajaongkir->results[0]->costs ]);
		}  

    }
}
