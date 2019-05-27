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
                'product_id' => $item->product_id,
    			'name' => $item->product->name,
    			'price' => number_format($item->product->price),
    			'qty' => $item->qty,
                'type' => $item->product->type
    		];
    	}

    	return response()->json(['data' => $res]);    	
    }

    public function addStock($id, $qty, $user_id = null){
        $user_id = $user_id == null ? Auth::user()->id : $user_id;
        if(UserStock::where([['user_id',$user_id],['product_id', $id]])->exists()){
            UserStock::increment('qty', $qty)->where([['user_id',$user_id],['product_id', $id]]);
        } else {
            UserStock::create([
                'user_id' => $user_id,
                'product_id' => $id,
                'qty' => $qty
            ]);
        }
    }

}
