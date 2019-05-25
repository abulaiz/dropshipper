<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Model\Transaction\Order;

class HistoriPeriodeController extends Controller
{
	// $req->month , $req->year
    public function periode(Request $req){
    	$x = $req->year.'-'.$req->month;
    	$data = Order::where('created_at','like', $x.'%')
    			->where('status', '2')
    			->get();
    	return response()->json($data);
    }
}