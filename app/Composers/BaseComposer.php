<?php namespace App\Composers;

use Illuminate\View\View;

use App\Libs\Alert;

class BaseComposer
{
	private $alert;

	public function __construct()
	{
		$this->alert = new Alert;
	}

	public function compose(View $v)
	{
		$v->with('_alert',$this->alert);
	}

}