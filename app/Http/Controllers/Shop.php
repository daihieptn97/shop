<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class Shop extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array("shop" => App\User::find(1)->shop);
        return view('admin/shop', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addshop');
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
            'name' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'image' => ''
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

        var_dump($data);
        $shop = new App\Shop();
        $shop->shop_name = $data['name'];
        $shop->address = $data['address'];
        $shop->phone = $data['phonenumber'];
        $shop->email = $data['email'];
        if ($request->hasFile('image')) {
            $shop->avatar = 'img/product/'.$fileName;
        }
        if($shop->save()){
            $usershop = new App\UserShop();
            $usershop->user_id = 1;
            $usershop->shop_id = $shop->id;
            if($usershop->save()){
                return redirect('admin/shop');
            }
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
        $result = array("shop" => App\Shop::where('id', $id)->firstOrFail());
        return view('admin/editshop', $result);
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
            'name' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'image' => ''
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

        $shop = App\Shop::find($id);
        $shop->shop_name = $data['name'];
        $shop->address = $data['address'];
        $shop->phone = $data['phonenumber'];
        $shop->email = $data['email'];
        if ($request->hasFile('image')) {
            $shop->avatar = 'img/product/'.$fileName;
        }
        if($shop->save()){
            return redirect('admin/shop');
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
        $shop = App\Shop::find($id);
        if($shop->delete()){
            return redirect('admin/shop');
        }
    }
}
