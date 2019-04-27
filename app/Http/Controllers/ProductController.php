<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product\Product;

class ProductController extends Controller
{
    public function available(){
    	$data = Product::where('qty', '>=', 0)->get();
    	return response()->json(['data' => $data]);
    }

}
