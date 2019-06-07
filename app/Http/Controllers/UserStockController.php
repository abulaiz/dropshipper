<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\UserStock;
use App\Model\Transaction\Sending;

use Auth;

class UserStockController extends Controller
{

    private function onSending($user_id, $product_id){
        return Sending::where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->where(function($q){
                            $q->where('status', '1')
                            ->orWhere('status', '2');
                        })->sum('qty');
    }

    public function index(){

    	$data = UserStock::where('user_id', Auth::user()->id)->get();
    	$res = [];
    	foreach ($data as $item) {
            $qty = $item->qty - $this->onSending($item->user_id, $item->product_id);
            if($qty > 0){
                $res[] = [
                    'product_id' => $item->product_id,
                    'name' => $item->product->name,
                    'price' => number_format($item->product->price),
                    'qty' => $qty,
                    'type' => $item->product->type
                ];
            }
    	}

    	return response()->json(['data' => $res]);    	
    }

    public function addStock($id, $qty, $user_id = null){
        $user_id = $user_id == null ? Auth::user()->id : $user_id;
        if(UserStock::where([['user_id',$user_id],['product_id', $id]])->exists()){
            UserStock::where([['user_id',$user_id],['product_id', $id]])->increment('qty', $qty);
        } else {
            UserStock::create([
                'user_id' => $user_id,
                'product_id' => $id,
                'qty' => $qty
            ]);
        }
    }

    public function stealStock($id, $qty, $user_id){
        UserStock::where([['user_id',$user_id],['product_id', $id]])->decrement('qty', $qty);
    }

}
