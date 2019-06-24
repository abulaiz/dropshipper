<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\Product;
use App\Model\Product\Mutation;
use Validator;

use Auth;

class ProductController extends Controller
{
    public function available(){
    	$data = Product::whereRaw('qty-booked > 0')->get();
    	return response()->json(['data' => $data]);
    }

    // input = product_id, qty
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

    public function stock(){
        $data = Product::all();
        $res = [];
        $last_update = "0000-00-00 00:00:00";
        foreach ($data as $item) {
            $last_update = $last_update > $item->updated_at ? $last_update : $item->updated_at; 
            $res[] = [
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'qty' => $item->qty,
                'in' => Mutation::where('product_id', $item->id)->where('status', '2')->sum('qty'),
                'out' => Mutation::where('product_id', $item->id)->where('status', '1')->sum('qty'),
            ];
        }

        return response()->json(['data' => $res, 'last_updated' => $last_update]);
    }

    public function add(Request $req){
        $rules = ['qty' => 'required|integer|min:1'];
        $v = Validator::make($req->all(), $rules);
        if($v->passes()){

            $p = Product::find($req->id);
            $p->qty += $req->qty;
            $p->save();
            Mutation::create([
                'user_id' => Auth::user()->id,
                'product_id' => $req->id,
                'qty' => $req->qty,
                'status' => '2',
                'description' => 'Ditambahkan oleh admin'
            ]);
            return response()->json(['success' => true]);

        } else {
            return response()->json(['success' => false]);            
        }
    }

}
