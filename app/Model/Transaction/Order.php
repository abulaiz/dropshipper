<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "product_orders";

	protected $guarded = [''];

	public $autoincrement = false;

	public $timestamps = false; 

	public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }
}
