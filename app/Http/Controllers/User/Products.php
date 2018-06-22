<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

use Illuminate\Support\Facades\DB;
class Products extends Controller
{
    public function index($id = 0)
    {
       /**
         * return product info
         * @param Author  : Hiep
         * @param $id : id product
         * @return view()
         * @return ortherProduct : List 3 products include ('image', 'name', 'price', 'id') and sort ASC
         * @return detailProduct : detail product by $id
        **/
    	$detailProduct =  Product::find($id);


    	$ortherProduct =  Product::select('image', 'name', 'price', 'id', 'created_at')->whereRaw('count > 0 and id !='. $id .' and cate_id = ' . $detailProduct->cate_id)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        $productNew = Product::select('image', 'name', 'price', 'id', 'unit')->whereRaw('count > 0 and id <>'. $id )->orderBy('created_at', 'desc')->take(8)->get();

        // var_dump($cate);die();
    	return view('user.page.product', compact('detailProduct', 'ortherProduct', 'productNew'));
    }
}
