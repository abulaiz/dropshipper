<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

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

    public function profile(Request $req){
        $user = User::find(Auth::user()->id);
        return View('front_end.layout.user.profile', compact('user'));
    }

    public function update_info(Request $request){
        $rule = [
            "name" => "required", "gender" => 'required',
            "phone" => "required", "address" => "required"
        ];
        $v = Validator::make($request->all(), $rule);
        if($v->passes()){       
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();
            return redirect()->back()->with(['_msg'=>"Your Basic Info has changed",'_e'=>'success']);
        } else {
            return redirect()->back()->with(['_w'=>$v->messages()]);
        }
    }

    public function update_password(Request $request){
        $rule = ['oldPas' => 'required', 'newPas' => 'required', 'cfrPas' => 'required'];
        $v = Validator::make($request->all(), $rule);
        if($v->passes()){
            $userId = Auth::user()->id;
            // $encPas = Hash::make();
            $currPas = Auth::user()->password;
            // Password Validation
            if(!Hash::check($request->oldPas, $currPas))
                return redirect()->back()->with(['_msg'=>'Your old password is not recognized','_e'=>'danger']);
            if($request->newPas!=$request->cfrPas) 
                return redirect()->back()->with(['_msg'=>'Your new Password Confirmation is wrong','_e'=>'danger']);
            $v = Validator::make($request->all(), ['newPas' => 'min:5']);
            if(!$v->passes()) 
                return redirect()->back()->with(['_w'=>$v->messages()]);

            // Simpan perubahan
            User::find($userId)->update(["password" => Hash::make($request->newPas)]);

            return redirect()->back()->with(['_msg'=>"Your Password has changed",'_e'=>'success']);
        } else {
            return redirect()->back()->with(['_w'=>$v->messages()]);
        }
    }    
}
