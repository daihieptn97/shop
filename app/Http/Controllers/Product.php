<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array('data' => App\Product::all());
        return view('admin.product',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = App\User::where('id',1)->firstOrFail()->shop;
        $category = App\Category::all();
        $result = array('shop'=>$shop,'category'=>$category);
        return view('admin.addproduct', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'shop_id' => 'required',
            'cate_id' => 'required',
            'name' => 'required',
            'count' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $extend = $data['image']->getClientOriginalExtension();
        $sizeimg = $data['image']->getSize();
        if($extend == "jpg" || $extend == "jpeg" || $extend == "png" || $extend == "gif"){
            if($sizeimg > 10000){
                $fileExtension = $request->file('image')->getClientOriginalExtension();
                $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
                $request->file('image')->move('img/product', $fileName);
            }
            else{
                die("Kích thước file quá lớn. Chỉ chấp nhận file nhỏ hơn 10MB");
            }
        }
        else{
            die("Loại file không đúng. Chỉ chấp nhận file hình ảnh");
        }

        $product = new App\Product();
        $product->cate_id = $data['cate_id'];
        $product->shop_id = $data['shop_id'];
        $product->name = $data['name'];
        $product->unit = $data['unit'];
        $product->count = $data['count'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        $product->image = 'img/product/'.$fileName;
        if($product->save()){
            return redirect('admin/product');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = App\Product::where('id', $id)->firstOrFail();
        $shop = App\User::where('id',1)->firstOrFail()->shop;
        $category = App\Category::all();
        $result = array('product' => $product, 'shop' => $shop, 'category' => $category);
        return view('admin.editproduct', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'shop_id' => 'required',
            'cate_id' => 'required',
            'name' => 'required',
            'count' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'description' => 'required',
            'image' => '',
        ]);

        if ($request->hasFile('image')) {
            $extend = $data['image']->getClientOriginalExtension();
            $sizeimg = $data['image']->getSize();
            if($extend == "jpg" || $extend == "jpeg" || $extend == "png" || $extend == "gif"){
                if($sizeimg > 10000){
                    $fileExtension = $request->file('image')->getClientOriginalExtension();
                    $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
                    $request->file('image')->move('img/product', $fileName);
                }
                else{
                    die("Kích thước file quá lớn. Chỉ chấp nhận file nhỏ hơn 10MB");
                }
            }
            else{
                die("Loại file không đúng. Chỉ chấp nhận file hình ảnh");
            }
        }

        $product = App\Product::find($id);
        $product->cate_id = $data['cate_id'];
        $product->shop_id = $data['shop_id'];
        $product->name = $data['name'];
        $product->unit = $data['unit'];
        $product->count = $data['count'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        if ($request->hasFile('image')) {
            $product->image = 'img/product/'.$fileName;
        }
        if($product->save()){
            return redirect('admin/product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = App\Product::find($id);
        if($product->delete()){
            return redirect('admin/product');
        }
    }
}
