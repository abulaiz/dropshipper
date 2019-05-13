<?php namespace App\Composers;

use Illuminate\View\View;

use App\Libs\Alert;
use App\Libs\Mail;
use Auth;

class BaseComposer
{
	private $alert;

	public function __construct()
	{
		$this->alert = new Alert;
	}

	public function compose(View $v)
	{
		$v->with('_alert',$this->alert)
			->with('_inbox', $this->unreadMessage());
	}

	private function unreadMessage(){
		if(Auth::check()){
			if(Auth::user()->hasRole('member')){
				$flag = 'M';
			} else {
				$flag = 'A';
			}
			return Mail::getInstance()->readStatus($flag, Auth::user()->id, 'unread');
		} else {
			return '';
		}
	}
}