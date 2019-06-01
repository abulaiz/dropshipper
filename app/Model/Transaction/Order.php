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

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function newId($user_id){
        return strtoupper( uniqid('O') ).str_pad($user_id, 4, '0', STR_PAD_LEFT);
    }  
}
