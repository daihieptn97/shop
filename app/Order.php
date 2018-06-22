<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function UserOrder()
    {
    	return $this->hasMany('App\UserOrder', 'order_id', 'id');
    }
}
