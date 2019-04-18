<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Sending extends Model
{
   	public $autoincrement = false;

	protected $guarded = array('id','created_at','update_at');

   	public function order_vias()
    {
        return $this->belongsTo('App\model\Master\order_vias');
    }

    public function product()
    {
        return $this->belongsTo('App\model\Product\Product');
    }

    public function courier()
    {
        return $this->belongsTo('App\model\Master\Courier');
    }
}
