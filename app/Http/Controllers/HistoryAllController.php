<?php

namespace App\Http\Controllers;
use App\Model\Transaction\Order;

use Illuminate\Http\Request;

class HistoryAllController extends Controller
{
    public function index()
    {
    	$data = Order::where('status', '2')->get();
    	
    	return response()->json($data);
    }
}
