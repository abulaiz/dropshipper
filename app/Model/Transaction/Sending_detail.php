<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Sending_detail extends Model
{
	protected $table = "sending_details";
	
	public $timestamps = false; 

	protected $guarded = array('');
}
