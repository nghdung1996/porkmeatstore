<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public $timestamp = true;

    public function lineitem(){
        return $this->hasmany('App\LineItem','order_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
