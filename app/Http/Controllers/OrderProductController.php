<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libs\UIDGenerator;
use App\Model\Transaction\Order;

use Validator;
use Auth;

class OrderProductController extends Controller
{
    public function store(Request $req){
    	$rules = [
    		'product_id' => 'required|exists:products,id',
    		'qty' => 'required|integer|min:1'
    	];
    	$v = Validator::make($req->all(), $rules);
    	if($v->passes()){
    		Order::create([
    			'id' => UIDGenerator::orderId(),
    			'product_id' => $req->product_id,
    			'user_id' => Auth::user()->id,
    			'qty' => $req->qty,
    			'status' => '1'
    		]);
    		return redirect('/order')->with(['_e'=>'success', '_msg' => 'Pesanan anda sudah tercatat, silahkan tunggu respon dari sistem']);  
    	} else {

    	}
    }

    public function progress(){
        $statues = [
            '1' => 'Menunggu Konfirmasi'
        ];
        $user_id = Auth::user()->id;
        $data = Order::all();
        $res = [];
        foreach ($data as $item) {
            $res[] = [
                'id' => $item->id, 'nama_produk' => $item->product->name,
                'qty' => $item->qty, 'status' => $statues[ $item->status ]
            ];
        }
        return response()->json($res);
    }
}
