<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class UserStock extends Model
{
	protected $table = "user_has_products";

	public $timestamps = false; 

	protected $guarded = array('');

	public function product()
    {
        return $this->belongsTo('App\Model\Product\Product');
    }
}
