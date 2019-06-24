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

    private function mailSystemResponse($user_id, $subject, $textMail){
        Mail::getInstance()->write([
            'flag_sender' => 'S',
            'sender_mail' => 'System',
            'flag_receiper' => 'M',
            'receiper_mail' => 'System',
            'receiper_id' => $user_id,
            'sender_name' => 'System',
            'receiper_name' => Auth::user()->name,
            'subject' => $subject,
            'text' => $textMail
        ]);        
    }

    public function store(Request $req){
    	$rules = [
    		'product_id' => 'required|exists:products,id',
    		'qty' => 'required|integer|min:1'
    	];
    	$v = Validator::make($req->all(), $rules);
    	if($v->passes()){
            $id = Order::newId(Auth::user()->id);
    		Order::create([
    			'id' => $id,
    			'product_id' => $req->product_id,
    			'user_id' => Auth::user()->id,
    			'qty' => $req->qty,
    			'status' => '1'
    		]);
            
            $price = number_format(Product::find($req->product_id)->price * $req->qty);    
            $textMail = "Pesanan anda sudah tercatat dengan kode $id . 
                Segera selesaikan pembayaran dalam waktu 60 menit kedepan, ke nomer rekening BCA 6300730777 dengan nominal pembayaran Rp $price"; 
            $this->mailSystemResponse(Auth::user()->id, 'Menunggu Pembayaran', $textMail);   

    		return redirect('/order')->with(['_e'=>'success', '_msg' => 'Pesanan anda sudah tercatat, selesaikan proses pembayaran.']);  
    	} else {
            return redirect('/order')->with(['_e'=>'warning', '_msg' => 'Harap lengkapi form isian.']);  
    	}
    }

    public function progress(){
        $statues = [
            '1' => 'Menunggu Pembayaran',
            '3' => 'Dibatalkan Admin'
        ];
        $user_id = Auth::user()->id;
        $data = Order::where('user_id', $user_id)->where('status', '!=', '2')->get();
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
            } elseif($item->status == '3') {
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

    public function member_history(Request $req){
        // Asking for 'year' and 'month' variable

        $data = Order::whereMonth('created_at', $req->month)
                ->whereYear('created_at', $req->year)
                ->where('status', '2')
                ->get();

        // Contain all data
        $res1 = [];
        // Contain data per date
        $res2 = [];

        foreach ($data as $item) {
            // Fetching for all data
            $flag1 = $item->product_id;
            if( !isset($res1[$flag1]) ){
                $res1[$flag1] = [
                    'product_name' => $item->product->name, 
                    'qty' => $item->qty,
                    'description' => $item->product->type
                ];                    
            } else {
                $res1[$flag1]['qty'] += $item->qty;
            }

            // Fetching for data per date
            $flag2 = substr($item->created_at, 8, 2).'_'.$item->product_id;
            if( !isset($res2[$flag2]) ){
                $res2[$flag2] = [
                    'product_name' => $item->product->name, 
                    'qty' => $item->qty,
                    'date' => $this->_str->tanggalFormal($item->created_at),
                    'description' => $item->product->type
                ];                    
            } else {
                $res2[$flag2]['qty'] += $item->qty;
            }
        }

        return response()->json(['res1' => $res1, 'res2' => $res2]);
    }

    public function request(){
        $user_id = Auth::user()->id;
        $data = Order::where('status', '1')->get();
        $res = [];
        foreach ($data as $item) {
            $res[] = [
                'id' => $item->id,
                'member' => $item->user->email,
                'produk' => $item->product->name,
                'jumlah' => $item->qty
            ];
        }
        return response()->json($res);
    }

    public function request_detail($id){
        $data = Order::find($id);
        $response = [
            'id' => $data->id,
            'nama' => $data->user->name,
            'email' => $data->user->email,
            'nama_produk' => $data->product->name,
            'jumlah' => $data->qty,
            'total' => $data->qty * $data->product->price
        ];  
        return response()->json($response); 
    }

    public function confirmOrder(Request $req){
        $rules = [
            'id' => 'required|exists:product_orders,id'
        ];
        $v = Validator::make($req->all(), $rules);
        if($v->passes()){
            $order = Order::find($req->id);
            $order->status = '2';
            
            $product = Product::find($order->product_id);
            $product->booked -= $order->qty;
            $product->qty -= $order->qty;

            app('App\Http\Controllers\UserStockController')->addStock($order->product_id, $order->qty, $order->user_id);

            $product->save();
            $order->save();

            $textMail = "Pesanan Produk $product->name sejumlah $order->qty telah dikonfirmasi dan telah ditambahkan ke stok produk anda";
            $this->mailSystemResponse($order->user_id, 'Pesanan Produk dikonfirmasi', $textMail);
        }         
    } 
    
    public function rejectOrder(Request $req){
        $rules = [
            'id' => 'required|exists:product_orders,id'
        ];
        $v = Validator::make($req->all(), $rules);
        if($v->passes()){
            $order = Order::find($req->id);
            $order->status = '3';
            
            $product = Product::find($order->product_id);
            $product->booked -= $order->qty;

            $product->save();
            $order->save();
            $textMail = "Pesanan Produk dengan ID $order->id ditolak oleh admin, silahkan hubungi admin untuk lebih lanjut";
            $this->mailSystemResponse($order->user_id, 'Pesanan Produk ditolak', $textMail);            
        }         
    }   

    public function user_history($id){
        $data  = Order::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($data as $item) {
            $res[] = [
                'name' => $item->product->name,
                'qty' => $item->qty,
                'type' => $item->product->type,
                'created_at' => substr($item->created_at, 0, 10),
                'status' => $item->status,
            ];
        }

        return response()->json($res);
    }
}
