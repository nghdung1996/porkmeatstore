<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    protected $table = "line_items";
    public $timestamp = false;

    public function product(){
        return $this->belongsTo('App\Product','id_product','id');
    }
    public function order(){
        return $this->belongsTo('App\Order','order_id','id');
    }
}
