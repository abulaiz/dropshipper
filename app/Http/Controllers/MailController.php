<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Mail;
use App\Libs\SimpleCry;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
use App\User;

class MailController extends Controller
{
	// $type = 'inbox' / 'sent'
    public function index(Request $req)
    {
    	$flag = Auth::user()->hasRole('member') ? 'M' : 'A';
    	$user_id = Auth::user()->id;
        $count = isset($req->count) ? $req->count : null;
    	if($req->type == 'inbox'){
    		$data = Mail::getInstance()->readInbox($flag, $user_id, ['file' => $req->last_file, 'id' => $req->last_id], $count);
    	} else {
    		$data = Mail::getInstance()->readOutbox($flag, $user_id, ['file' => $req->last_file, 'id' => $req->last_id], $count);
    	}

    	return response()->json($data);	
    }

    public function read(Request $req){
        $flag = Auth::user()->hasRole('member') ? 'M' : 'A';
        $user_id = Auth::user()->id;      
        $data = Mail::getInstance()->detailMail($flag, $user_id, $req->id, $req->file);
        
        if($req->file == 'inbox')
            Mail::getInstance()->markAsReadInbox($flag, $user_id, $req->id);
        
        return response()->json($data);   
    }

    public function write(Request $req){
        $rules = [
            'subject' => 'required',
            'text' => 'required'
        ];
        $v = Validator::make($req->all(), $rules);
        if(!$v->passes())
            return response()->json(['success' => false, 'reason' => 'Isi subject dan pesannya !.']);

        if(Auth::user()->hasRole('member')){
            $flag_sender = 'M';
            $flag_receiper = 'A';
            $sender_name = Auth::user()->name;
            $sender_id = Auth::user()->id;
            $receiper_name = 'Admin';
            $receiper_id = null;
            $receiper_mail = 'Admin';
            $sender_mail = Auth::user()->email;            
        } else {
            $email_address = isset($req->email) ? $req->email : '';
            if(!User::where('email', $email_address)->exists())
                return response()->json(['success' => false, 'reason' => 'Email tujuan tidak terdaftar pada sistem ini.']);
            
            $u = User::where('email', $email_address)->get();
            $flag_sender = 'A';
            $flag_receiper = 'M';
            $sender_name = 'Admin';
            $sender_id = null;
            $receiper_name = $u[0]->name;
            $receiper_id = $u[0]->id;     
            $receiper_mail = $u[0]->email;
            $sender_mail = 'Admin';                
        }

        $attachment = [];
        $user_id = Auth::user()->hasRole('member') ? Auth::user()->id.'/0' : '0/'.$u[0]->id;
        $key = explode('/', $user_id);
        $scr = new SimpleCry();

        foreach ($req->attachment as $item) {
            $slash = explode('/', $item);
            Storage::move($item, 'attachment/mail/'.$user_id.'/'.$slash[2]);
            $attachment[] = $scr->encrypt($key[0]) . '/'. $scr->encrypt($key[1]) .'/'.$slash[2];            
        }

        Mail::getInstance()->write([
            'subject' => $req->subject,
            'receiper_mail' => $receiper_mail,
            'sender_mail' => $sender_mail,
            'flag_sender' => $flag_sender,
            'flag_receiper' => $flag_receiper,
            'text' => $req->text,
            'sender_name' => $sender_name,
            'sender_id' => $sender_id,
            'receiper_name' => $receiper_name,
            'receiper_id' => $receiper_id,
            'attachment' => $attachment
        ]);

        return response()->json(['success' => true]);
    }

    public function delete(Request $req){
        $user_id = Auth::user()->id;
        $flag = Auth::user()->hasRole('member') ? 'M' : 'A';
        foreach ($req->data as $item) {
            Mail::getInstance()->delete($flag, $user_id, $item['mail_id'], $item['file']);   
        }
    }

    public function search(Request $req){
        $user_id = Auth::user()->id;
        $flag = Auth::user()->hasRole('member') ? 'M' : 'A';
        $res = Mail::getInstance()->find($req->keyword, $req->type, $flag, $user_id);
        return response()->json($res);
    }
}
