<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class UserStock extends Model
{
	protected $table = "user_has_product";

	public $timestamps = false; 

	protected $guarded = array('');

	public function products()
    {
        return $this->belongsTo('App\model\Product\Product');
    }
}
