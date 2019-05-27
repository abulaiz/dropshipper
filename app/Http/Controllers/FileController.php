<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class FileController extends Controller
{
    public function upload(Request $request){
    	$file = $request->file('attachment');
    	$user_id = Auth::user()->id;
    	return Storage::put('tmp/'.$user_id, $file);
    }
    
}
