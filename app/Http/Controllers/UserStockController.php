<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\UserStock;

use Auth;

class UserStockController extends Controller
{
    public function index(){

    	$data = UserStock::where('user_id', Auth::user()->id)->get();
    	$res = [];
    	foreach ($data as $item) {
    		$res[] = [
    			'name' => $item->product->name,
    			'price' => number_format($item->product->price),
    			'qty' => $item->qty." ".$item->product->type
    		];
    	}

    	return response()->json(['data' => $res]);    	
    }

}
