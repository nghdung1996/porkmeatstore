<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $table ="likes";
  public $timestamp = true;

  public function user(){
    return $this->belongsTo('App\User','id_user','id');
  }
  public function product(){
    return $this->belongsTo('App\Product','id_product','id');
  }

  public static function is_like($id_user, $id_product){
    $like = Like::where('id_user',$id_user)->where('id_product', $id_product)->get();
    if (count($like)) {
      return true;
    } else {
      return false;
    }
    
  }
}
