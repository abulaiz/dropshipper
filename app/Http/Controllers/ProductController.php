<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\Product;

class ProductController extends Controller
{
    public function available(){
    	$data = Product::where('qty', '>=', 0)->get();
    	return response()->json(['data' => $data]);
    }

    public function checkAv(Request $req){
    	$data = Product::find($req->product_id);
    	$stok = $data->qty - $data->booked;
    	if($req->qty <= $stok){
    		// jika berhasil
    		$data->booked += $req->qty;
    		$data->save();
    		return response()->json(['success' => true]);
    	} else {
    		// Jika gagal
    		return response()->json(['success' => false, 'available' => $stok]);
    	}
    }

}
