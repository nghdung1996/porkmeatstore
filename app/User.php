<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'email', 'password','admin', 'phone', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comment(){
      return $this->hasMany('App\Comment','id_user','id');
    }
    public function like(){
      return $this->hasMany('App\Like','id_user','id');
    }
    public function rate(){
      return $this->hasMany('App\Rate','id_user','id');
    }
    public function order(){
      return $this->hasMany('App\Order','id_user','id');
    }
    
}
