<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "product_orders";

	public $autoincrement = false;

	protected $guarded = array('id','created_at','update_at');

	public function products()
    {
        return $this->belongsTo('App\model\Product\Product');
    }
}
