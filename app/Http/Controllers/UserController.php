<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UserController extends Controller
{
    public function save(Request $req){
    	$rules = [
    		'name' => 'required|text',
    		'email' => 'required|email',
    		'password' => 'required'
    	];
    	// $v = Validator::make($req->all(), $rules);
    	// if($v->passes()){
    		User::create([
    			'name' => $req->name,
    			'email' => $req->email,
    			'password' => bcrypt($req->password)
    		]);
            
    		return redirect('/user')->with(['_e'=>'success', '_msg' => 'Anda sudah terdaftar']);  
    	// } else {
     //        return redirect('/user')->with(['_e'=>'warning', '_msg' => 'Harap lengkapi form isian.']);  
    	// }
    }

    public function show()
    {
		$data = User::all();
        $res1 = [];
        foreach ($data as $item) {
        	$res1[] = [
        	'id' => $item->id,
        	'name' => $item->name,
        	'email' => $item->email
        	];
          }
        return response()->json(['res1' => $res1]);
    }

    public function edituser($id, Request $req)
    {
    	$usr = User::find($id);
    	$usr->password = bcrypt($req->password);
    	$usr->save();

    	return redirect('/user')->with(['_e'=>'success', '_msg' => 'Password berhasil dirubah']);
    }

    public function delete(Request $req)
    {
        User::find($req->id)->delete();
        return response()->json(['success' => true]);
    }
}
