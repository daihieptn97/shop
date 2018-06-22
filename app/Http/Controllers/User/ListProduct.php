<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ListProduct extends Controller
{
    public function index($id = 0)
    {

    	if($id == 0) {
    		/**
	         * return list product when ID  == 0
	         * @param Author  : Hiep
	         * @param $id : id category
	         * @return view()
	         * @return numberProduct : Sum number product of category
	         * @return nameCategory : name category
	         * @return listProductsByCategory : List pagination product of category id = $id
	        **/
    		$listProductsByCategory = Product::paginate(6);
    		$nameCategory = "Tất cả sản phẩm";
    		$numberProduct =  count(Product::all());
    	}
    	else{
    		/**
	         * return list product
	         * @param Author  : Hiep
	         * @param $id : id category
	         * @return view()
	         * @return numberProduct : Sum number product of category
	         * @return nameCategory : name category
	         * @return listProductsByCategory : List pagination product of category id = $id
	        **/
    		$numberProduct =  count(Product::where('cate_id',$id)->get() );
    		$listProductsByCategory =  Product::where('cate_id',$id)->paginate(6);
    		$nameCategory = Category::find($id)->name;
    	}

    	return view('user.page.list_product', compact('listProductsByCategory', 'nameCategory', 'numberProduct'));
    }
}
