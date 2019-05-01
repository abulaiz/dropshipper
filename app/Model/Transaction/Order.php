<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "product_orders";

	protected $guarded = ['created_at', 'updated_at'];

	public $autoincrement = false;
	protected $keyType = 'char';

	public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }

	public static function newId(){
		return strtoupper( uniqid('O') );
	}
}
