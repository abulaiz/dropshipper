<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public $timestamps = false; 

    protected $guarded = array('');

	public function sending()
    {
        return $this->hasMany('App\model\Transaction\Sending');
    }
}
