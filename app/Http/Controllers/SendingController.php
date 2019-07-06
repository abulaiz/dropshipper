<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Transaction\Sending;
use App\Model\Transaction\Sending_detail;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Libs\Mail;

class SendingController extends Controller
{
    public function memberRequest(Request $req){
    	$user_id = Auth::user()->id;
    	$qty = Auth::user()->whereHas('stock',function($q) use($req) {
                            $q->where('product_id',$req->product_id);
                          })->get()[0]->stock[0]->qty;
    	if($req->qty > $qty){
    		return response()->json(['success' => false, 'reason' => 'Stok barang yang anda kirim tidak cukup.', 'eRtype' => 1]);
    	}

    	$sending_id = Sending::newId($user_id);

    	if($req->order_via_id > 3 && !Storage::exists($req->attachment)){
    		return response()->json(['success' => false, 'reason' => 'Terjadi kesalahan pada server, harap ulangi proses pengiriman.', 'eRtype' => 2]);
    	}

    	Sending::create([
    		'id' => $sending_id,
    		'product_id' => $req->product_id,
    		'user_id' => $user_id,
    		'courier_id' => $req->courier_id,
    		'qty' => $req->qty,
    		'order_via_id' => $req->order_via_id,
    		'status' => '1'
    	]);

        Sending_detail::create([
            'sending_id' => $sending_id,
            'free_code' => $req->free_code,
            'sender_name' => $req->sender_name,
            'receiver_name' => $req->receiver_name,
            'phone_number' => $req->phone_number,
            'address' => $req->address,
            'province' => $req->province,
            'city' => $req->city,
            'subdistrict' => $req->subdistrict,
            'country' => $req->country,
            'courier_service' => $req->courier_service,
            'price' => json_encode($req->price)
        ]);

    	if($req->order_via_id > 3){
    		$slash = explode('/', $req->attachment);
    		Storage::move($req->attachment, 'attachment/sending/'.$user_id.'/'.$sending_id.'/'.$slash[2]);
    	}
    	return response()->json(['success' => true]);
    }

    public function memberStatus(){
        $data = Sending::where('user_id', Auth::user()->id)->get();
        $res = [];
        foreach ($data as $item) {
            $res[] = [
                'id' => $item->id,
                'tanggal' => substr($item->created_at, 0, 10),
                'nama_produk' => $item->product->name,
                'tujuan' => $item->detail->country == null ? $item->detail->subdistrict.', '.$item->detail->city : $item->detail->country,
                'status' => $item->status
            ];
        }

        return response()->json($res);
    }

    public function getAttachmentPath($id, $user_id){
        $dir = 'attachment/sending/'.$user_id.'/'.$id;
        $files = Storage::files($dir);
        $eF = explode('/', $files[0]);
        return $eF[ count($eF)-1 ];
    } 

    public function detailRequest($id){
        $data  = Sending::find($id);

        if(Auth::user()->hasRole('member') && Auth::user()->id != $data->user_id){
            return;
        }

        $res = [
            'id' => $data->id,
            'product_name' => $data->product->name,
            'product_type' => $data->product->type,
            'product_weight' => $data->product->weight,
            'courier' => $data->courier->name,
            'order_via' => $data->order_vias->name,
            'qty' => $data->qty,
            'free_code' => $data->detail->free_code == null ? '' : $data->detail->free_code,
            'attachment_path' => ($data->order_via_id > 3 ? $this->getAttachmentPath($data->id, $data->user_id) : ''),
            'sender_name' => $data->detail->sender_name,
            'receiver_name' => $data->detail->receiver_name,
            'phone_number' => $data->detail->phone_number,
            'address' => $data->detail->address,
            'courier_service' => $data->detail->courier_service,
            'price' => json_decode($data->detail->price),
            'destination' => $data->detail->country == null ? $data->detail->subdistrict.', '.$data->detail->city : $data->detail->country,
            'status' => $data->status,
        ];

        return response()->json($res);
    }

    public function cancel(Request $req){
        Sending::find($req->id)->delete();
    }

    public function reject(Request $req){
        $data = Sending::find($req->id);
        $data->status = '4';
        $data->save();
        Mail::getInstance()->write([
            'flag_sender' => 'S',
            'sender_mail' => 'System',
            'flag_receiper' => 'M',
            'receiper_mail' => 'System',
            'receiper_id' => $data->user_id,
            'sender_name' => 'System',
            'receiper_name' => $data->user->name,
            'subject' => "Pengiriman ". $data->id." ditolak",
            'text' => "Permintaan Pengiriman dengan ID $data->id ditolak oleh admin, silahkan hubungi admin untuk lebih lanjut."
        ]);          
    }

    public function sendingRequest(Request $req){
        $data = Sending::where('status', '1')->orWhere('status', '2')->get();
        $res = [];
        foreach ($data as $item) {
            $res[] = [
                'id' => $item->id,
                'tanggal' => substr($item->created_at, 0, 16),
                'member' => $item->user->email,
                'nama_produk' => $item->product->name,
                'status' => $item->status,
                'tujuan' => $item->detail->country == null ? $item->detail->subdistrict.', '.$item->detail->city : $item->detail->country,
            ];
        }

        return response()->json($res);        
    }

    public function changeStatus(Request $req){
        $data = Sending::find($req->id);
        $data->status = $req->status;
        $data->save();
        if($req->status == '3'){
            app('App\Http\Controllers\UserStockController')->stealStock($data->product_id, $data->qty, $data->user_id);
        }
    }
}
