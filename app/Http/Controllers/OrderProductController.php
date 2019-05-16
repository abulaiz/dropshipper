<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Transaction\Order;
use App\Model\Product\Product;
use App\Libs\Mail;

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
            $id = Order::newId();
    		Order::create([
    			'id' => $id,
    			'product_id' => $req->product_id,
    			'user_id' => Auth::user()->id,
    			'qty' => $req->qty,
    			'status' => '1'
    		]);
        
            Mail::getInstance()->write([
                'flag_sender' => 'S',
                'sender_mail' => 'System',
                'flag_receiper' => 'M',
                'receiper_mail' => 'System',
                'receiper_id' => Auth::user()->id,
                'sender_name' => 'System',
                'receiper_name' => Auth::user()->name,
                'subject' => 'Menunggu Pembayaran',
                'text' => 'Segera selesaikan pembayaran untuk order '. $id
            ]);

    		return redirect('/order')->with(['_e'=>'success', '_msg' => 'Pesanan anda sudah tercatat, selesaikan proses pembayaran.']);  
    	} else {
            return redirect('/order')->with(['_e'=>'warning', '_msg' => 'Harap lengkapi form isian.']);  
    	}
    }

    public function progress(){
        $statues = [
            '1' => 'Menunggu Pembayaran'
        ];
        $user_id = Auth::user()->id;
        $data = Order::all();
        $res1 = []; // cancelable 
        $res2 = []; // not cancelable
        foreach ($data as $item) {
            if($item->status == '1'){
                $res1[] = [
                    'id' => $item->id, 'nama_produk' => $item->product->name,
                    'qty' => $item->qty, 
                    'status' => $statues[ $item->status ], 
                    'tanggal' => substr($item->created_at, 0, 10)
                ];
            } else {
                $res2[] = [
                    'id' => $item->id, 'nama_produk' => $item->product->name,
                    'qty' => $item->qty, 
                    'status' => $statues[ $item->status ], 
                    'tanggal' => substr($item->created_at, 0, 10)
                ];                
            }
        }
        return response()->json(['res1' => $res1, 'res2' => $res2]);
    }

    public function cancel(Request $req){
        $data = Order::find($req->id);
        $product = Product::find($data->product_id);
        $product->booked -= $data->qty;
        $product->save();        
        $data->delete();

        return response()->json(['success' => true]);
    }
}
