<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class Bill extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array("bill" => App\Order::all());
        return view('admin.bill', $result);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $origin_bill = App\Order::find($id)->UserOrder[0]->Product->shop->address;
        $detail = App\Order::find($id);
        
        return view('admin.detailbill', compact('origin_bill', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = array("bill" => App\Order::find($id));
        return view('admin.editbill', $result);
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
        $status = $request->status;
        $order = App\Order::find($id);
        $order->status = $status;
        if($order->save()){
            return redirect('admin/bill');
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
        $userorder = App\UserOrder::where('order_id', $id);
        $userorder->delete();
        $order = App\Order::find($id);
        if($order->delete()){
            return redirect('admin/bill');
        }
    }
}
