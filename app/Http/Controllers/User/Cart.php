<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\UserOrder;

class Cart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $o = new Order();
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request = $request->value;
        $product_id = $request[0]['productID'];

        $o = new Order();
        $o->payment = $request[0]['totalPrice'];
        $o->fullname = $request[0]['name'];
        $o->address = $request[0]['address'];
        $o->phonenumber = $request[0]['number'];
        $o->email = $request[0]['email'];
        $o->shipping = $request[0]['shipping'];
        $o->status = 0;

        $o->save();
        


        $idOderNew = $o->id;
       
        $userOder =  new UserOrder();
        $userOder->order_id = $idOderNew;
        $userOder->product_id = $request[0]['productID'];
        $userOder->count = $request[0]['numberProduct'];
        $userOder->payment = $request[0]['totalPrice'];
        $userOder->save();

        $product = Product::find($product_id);
        $count = (int)$product->count;
        if($count > 0){
            $product->count = $count-1;
            $product->save();
            echo 'true';
        }
        else{
            echo false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        $infoProduct = Product::find($id);
        return view('user.page.cart', compact('infoProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDistance($origin, $destination)
    {
        $origin = urlencode($origin);
        $destination = urlencode($destination);
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        echo $response_a->rows[0]->elements[0]->distance->text;
    }
}
