<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShop extends Model
{
	protected $table = "user_shop";

	public function shop()
	{
		return $this->belongsTo('App\Shop', 'shop_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
