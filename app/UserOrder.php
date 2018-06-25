<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $table = "user_order";

    public function Order()
    {
    	return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function Product()
    {
    	return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
