<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Sending extends Model
{
   	public $autoincrement = false;
    protected $keyType = 'char';

	protected $guarded = array('created_at','update_at');

   	public function order_vias()
    {
        return $this->belongsTo('App\Model\Master\OrderVia','order_via_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }

    public function courier()
    {
        return $this->belongsTo('App\Model\Master\Courier');
    }

    public static function newId($user_id){
        return strtoupper( uniqid('P') ).str_pad($user_id, 4, '0', STR_PAD_LEFT);
    }    
}
