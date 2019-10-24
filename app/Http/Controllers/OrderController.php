<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_detail;

use Carbon\Carbon;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::select()->get();
        return view('admin.order.list',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.order.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::content();
        $tongtien = 0;
        foreach ($carts as $key => $cart) {
            $thanhtien = $cart->qty * $cart->price ; 
            $tongtien += $thanhtien;
        }
        $date = Carbon::now()->toDateTimeString();
        $data_request = $request->all();
        $rule= [
            "shipment_address" => "required",
            "shipment_name" => "required",
        ];
        $request->validate($rule);
        $data_order = [
           "user_id" => auth()->user()->id,
           "order_date" => $date,
           "shipment_address" => $data_request['shipment_address'],
           "shipment_name" => $data_request['shipment_name'],
           "received_date" => $date,
           "status" => auth()->user()->id,
           "total" => $tongtien,
        ];
        
        
        if ($order = Order::create($data_order)) {
            foreach ($carts as $key => $cart) {
                $data_order_detail = [
                   "product_id" => $cart->id,
                   "order_id" => $order->id,
                   "quatity" => $cart->qty,
                   "until_price" => $cart->price,
                ];
                Order_detail::create($data_order_detail);
            }
        }
        
        // return redirect()->route('admin.product_index');
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
        $order = Order::find($id);
        return view('admin.order.form',[ 'order' => $order ]);
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
        $rule= [
            "user_id" => "required",
        ];
        $request->validate($rule);
        $order = Order::find($id);
        $order->update($request->all());
        return redirect()->route('admin.order_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('admin.product_index');
    }
}
