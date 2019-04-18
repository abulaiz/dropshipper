<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "product_categories";

	public $timestamps = false; 

	protected $guarded = array('');

	public function products()
    {
        return $this->belongsTo('App\model\Product\Product');
    }
}
