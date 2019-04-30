<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table ="products";
  public $timestamp = true;

  public function comment(){
    return $this->hasMany('App\Comment','id_product','id');
  }
  public function like(){
    return $this->hasMany('App\Like','id_product','id');
  }
  public function lineitem(){
    return $this->hasMany('App\LineItem','id_product','id');
  }
}
