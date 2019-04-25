<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = array('id','created_at','update_at');

    public function user_has_product()
    {
        return $this->hasMany('App\model\Product\UserStock');
    }

    public function product_categories()
    {
        return $this->belongsTo('App\model\Product\Category');
    }

    public function product_mutation()
    {
        return $this->hasMany('App\model\Product\Mutation');
    }
    
    public function product_orders()
    {
        return $this->belongsTo('App\model\Transaction\Order');	
    }
}
