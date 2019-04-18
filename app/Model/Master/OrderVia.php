<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class OrderVia extends Model
{
    protected $table = "order_vias";

    public $timestamps = false; 

    protected $guarded = array('');

    public function Sending()
    {
        return $this->hasMany('App\model\Transaction\Sending');
    }
}
