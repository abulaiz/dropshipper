<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Libs\Mail;

class NotificationController extends Controller
{
    public function unread_inbox(){
    	$flag = Auth::user()->hasRole('member') ? 'M' : 'A';
    	$user_id = Auth::user()->id;
    	$count = Mail::getInstance()->countUnreadMessage($flag, $user_id);
    	Mail::getInstance()->setStatus($flag, $user_id, 'unread', "$count");
    	return response()->json(['data' => $count]);
    }
}
