<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
    	return $this->belongsTo('App\Category', 'cate_id', 'id');
    }

    public function shop()
    {
    	return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function userorder()
    {
    	return $this->hasMany('App\UserOrder', 'product_id', 'id');
    }
}
