<?php 

namespace App\Libs;

class PasswordGenerator
{

	public static $maxChar = 10;

	public static function make($clue){
		// Generating Password
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$str = $clue."".substr(str_shuffle($chars), 0, Self::$maxChar-strlen($clue));
		$password = substr( str_shuffle( $str ), 0, Self::$maxChar );
		return $password;
	}

}
