<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Libs\Mail;
use App\Model\Transaction\Sending;
use App\Model\Transaction\Order;
use App\User;

class NotificationController extends Controller
{
    public function unread_inbox(){
    	$flag = Auth::user()->hasRole('member') ? 'M' : 'A';
    	$user_id = Auth::user()->id;
    	$count = Mail::getInstance()->countUnreadMessage($flag, $user_id);
    	Mail::getInstance()->setStatus($flag, $user_id, 'unread', "$count");
    	return response()->json(['data' => $count]);
    }

    public function admin_badge(){
        if(Auth::user()->hasRole('member'))
            return;

    	// Get Request Order Count
        $sending = Sending::where('status', '1')->count();
        $order = Order::where('status', '1')->count();
        $user = Auth::user()->hasRole('superadmin') ? User::where('activate', false)->count() : 0;
        return response()->json(['order' => $order, 'sending' => $sending, 'user' => $user]);
    }
}
