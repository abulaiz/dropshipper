<?php

namespace App\Libs;

class UIDGenerator
{
	public static function orderId(){
		return strtoupper( uniqid('O') );
	}
}
