<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use App\Libs\EmailSender;
use Hash;
use App\Libs\PasswordGenerator;

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

    public function registrant(){
        $data = User::where('activate', false)->get();

        return response()->json(['res1' => $data]);        
    }

    public function show()
    {
        $data = User::whereHas('roles', function ($query) {
            return $query->where('name', 'member');
        })->get();
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

    public function edit_password(Request $req)
    {
    	$usr = User::find($req->id);
    	$usr->password = bcrypt($req->password);
    	$usr->save();

    	return response()->json(['success' => true]);
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

    public function activate(Request $req){
        $user = User::find($req->id);
        $user->activate = true;
        $password = PasswordGenerator::make($user->name);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'gender' => $user->gender == '1' ? "Laki - laki" : "Perempuan",
            'address' => $user->address,
            'phone' => $user->phone,
            'password' => $password
        ];
        $sent = EmailSender::send($data, 'emails.accountActivation', 'Akun Sudah Aktif', $user->email, $user->name);
        if($sent){
            $user->password = Hash::make($password);
            $user->save();
            $user->assignRole('member');          
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

    }

    public function tes(){
        EmailSender::send([], 'emails.accountActivation', 'Akun Sudah Aktif', 'ronabulaiz@gmail.com', "Imron");
    }    
}
