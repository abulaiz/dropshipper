<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    protected $table = "product_mutation";

    public $timestamps = false; 

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    protected $guarded = array('');

    public function product()
    {
        return $this->belongsTo('App\model\Product\Product');
    }
}
