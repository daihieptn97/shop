<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
    	$productNew = Product::select('image', 'name', 'price', 'id', 'unit')->where('count', '>', '0')->orderBy('created_at', 'desc')->take(8)->get();

	$productTop = DB::table('products')
    					->select('image', 'products.name', 'products.price', 'products.id' , 'products.unit', DB::raw('SUM(user_order.count) as trend'))
    					->leftJoin('user_order', 'products.id', '=', 'user_order.product_id')
    					->groupBy('products.id')
    					->take(8)
    					->get();

    	return view('user.page.dashboard', compact('productNew', 'productTop'));
    }
}
