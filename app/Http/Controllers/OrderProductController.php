<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Transaction\Order;
use App\Model\Product\Product;
use App\Libs\Mail;
use App\Libs\Strings;

use Validator;
use Auth;

class OrderProductController extends Controller
{
    private $_str;

    public function __construct(){
        $this->_str = new Strings;
    }

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
        $data = Order::where('status', '1')->get();
        $res1 = []; // cancelable 
        $res2 = []; // not cancelable
        foreach ($data as $item) {
            if($item->status == '1'){
                $res1[] = [
                    'id' => $item->id, 'nama_produk' => $item->product->name,
                    'qty' => $item->qty, 
                    'status' => $statues[ $item->status ], 
                    'tanggal' => $this->_str->tanggalFormal( $item->created_at )
                ];
            } else {
                $res2[] = [
                    'id' => $item->id, 'nama_produk' => $item->product->name,
                    'qty' => $item->qty, 
                    'status' => $statues[ $item->status ], 
                    'tanggal' => $this->_str->tanggalFormal( $item->created_at )
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

    public function member_history(){
        if(  request()->isMethod('get') ){
            // Indicate GET method , using for show all history
            $data = Order::where('status', '2')->get();
            $res = [];
            foreach ($data as $item) {
                if( !isset($res[$item->product_id]) )
                    $res[$item->product_id] = [
                        'product_name' => $item->product->name, 
                        'qty' => $item->qty,
                        'description' => $item->product->type
                    ];
                else
                    $res[$item->product_id]['qty'] += $item->qty;
            }
            return response()->json($res);
        } else {
            // Indicate POST method, using for show history by periode

            // Asking for 'year' and 'month' variable
            if( request()->input('month') == null || request()->input('year') == null)
                return response()->json([]);

            $x = request()->input('year').'-'.request()->input('month');
            $data = Order::where('created_at','like', $x.'%')
                    ->where('status', '2')
                    ->get();

            $res = [];
            foreach ($data as $item) {
                // using date as flag
                $flag = substr($item->created_at, 8, 2);
                if( !isset($res[$flag]) )
                    $res[$flag] = [
                        'product_name' => $item->product->name, 
                        'qty' => $item->qty,
                        'date' => $this->_str->tanggalFormal($item->created_at),
                        'description' => $item->product->type
                    ];
                else
                    $res[$flag]['qty'] += $item->qty;
            }
            return response()->json($res);
        }
    }
}
