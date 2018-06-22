<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shop";

    public function user()
    {
         return $this->belongsToMany('App\User','user_shop','shop_id','user_id');
    }

    public function product()
    {
    	return $this->hasMany('App\Product', 'shop_id', 'id');
    }

    public function usershop()
    {
    	return $this->hasOne('App\UserShop', 'shop_id', 'id');
    }
}
