<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class Order extends Controller
{
    public function order($id)
    {
    	$order = Order::find($id);
        $result = array("order" => $order);
        return view('user.page.order', $result);
    }
}
