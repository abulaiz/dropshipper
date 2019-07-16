<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index(){
    	$data = array_reverse(json_decode(Storage::get('info.json')));

    	return View('front_end.layout.home', compact('data'));
    }

    public function store(Request $req){
		if(!Storage::exists('info.json'))
			Storage::put('info.json' , '[]');
		$arr =  json_decode( Storage::get('info.json') );
		$attachment = [];
		foreach(json_decode($req->imgs) as $item){
			$slash = explode('/', $item);
			Storage::move($item, 'attachment/info/'.$slash[2]);
			$attachment[] = $slash[2];
		}

		$arr [] = [
			'id' => strtoupper( uniqid('I') ),
			'subject' => $req->subject,
			'text' => $req->text,
			'attachment' => $attachment
		];    	

		Storage::put('info.json', json_encode(array_values($arr), JSON_PRETTY_PRINT));

		return redirect()->back()->with(['_msg'=>"Berhasil memposting info.",'_e'=>'success']);
    }

    public function delete(Request $req){
    	$arr =  json_decode( Storage::get('info.json') );
    	foreach ($arr as $key => $item) {
    		if($req->id == $item->id){
    			foreach ($item->attachment as $img) {
    				Storage::delete('attachment/info/'.$img);
    			}
    			unset($arr[$key]);
    			break;
    		}
    	}

		Storage::put('info.json', json_encode(array_values($arr), JSON_PRETTY_PRINT));

		return redirect()->back()->with(['_msg'=>"Berhasil menghapus info.",'_e'=>'info']);

    }
}
