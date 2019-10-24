<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function shop()
    {
        $products = Product::select()->get();
        return view('user.shop',['products' => $products]);
    }
    public function single_shop($id)
    {
        $product = Product::find($id);
        return view('user.single_shop',['product' => $product]);
    }
    public function addtocart($id)
    {
        // dd('123');
        // Cart::destroy();
        $product = Product::find($id);
        $product_image = $product->images()->select()->get();
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 550, 'options' => ['image' => $product_image[0]->src]]);
        $a = Cart::count();
        $b = Cart::content();
        $c = Cart::weight();
        return response()->json(['count' => $a,'content'=>$b,'weight'=>$c]);
        return response()->json($b);
        return response($a);
        return view('user.single_shop',['product' => $product]);
    }
    public function list_cart()
    {
       
        $carts = Cart::content();
        return view('user.list_cart',['carts' => $carts]);
    }
    public function user_edit_cart()
    {
        $carts = Cart::content();
        return view('user.list_cart',['carts' => $carts]);
    }
    public function user_remove_cart($rowid)
    {
        Cart::remove($rowid);
       return 1;
        
    }
    public function destroy_list_cart()
    {
        dd('destroy_list_cart');
        Cart::destroy();
        return view('user.shop',['products' => $products]);
    }
    public function user_order_list_cart()
    {
        
        dd('user_order_list_cart');
        $rule= [
            "user_id" => "required",
        ];
        $request->validate($rule);
        $order = $request->all();
        $order['status'] = 1;
        Order::create($order);
    }
}
