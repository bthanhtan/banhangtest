<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Cart;

class User_ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $products = Product::select()->get();
        return view('user.shop',['products'=>$products]);
    }
    public function product_detail($id)
    {
        $product = Product::find($id);
        // dd($product);
        Cart::destroy();
        // $a = Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 550, 'options' => ['image' => $product->image]]);
        return view('user.product_detail',['product'=>$product]);
    }
    public function shop_add_cart($id)
    {
        $product = Product::find($id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 550, 'options' => ['image' => $product->image]]);
        $a = Cart::count();
        $b = Cart::content();
        return response()->json(['count' => $a,'content'=>$b]);
        return response()->json($b);
        return response($a);
    }

    public function shop_show_cart()
    {   
        $Carts = Cart::content();
        return view('user.cart',['Carts'=>$Carts]);
    }
    public function cart_count()
    {   
        $a = Cart::count();
        dd($a);
    }
    public function shop_delete_cart($id)
    {   
        // Cart::remove($id);
    }
    public function cart_checkout()
    {   
        return view('user.checkout');
    }
    
    public function cart_db(Request $request)
    {   
        $id = Auth::user()->id;
        $order_total = 0;
        $carts = Cart::content();
        foreach ($carts as  $cart) {
            $order_total += ($cart->price * $cart->qty) ;
        }
        // $b =\Carbon\Carbon::parse($a)->now()->format('y-m-d h:i:s');
        $c =\Carbon\Carbon::now()->toDateTimeString();
        // $rule= [
        //     "customer_id" => "required",
        //     "delivery_address" => "required",
        //     "order_at" => "required",
        //     "delivery_at" => "required",
        // ];
        $data_order = [
            "customer_id" => $id,
            "total" => $order_total,
            "status" => '1',
            "delivery_address" => $request->delivery_address,
            "name" => $request->name,
            "phone" => $request->phone,
            "order_at" => Carbon::now()->toDateTimeString(),
            "delivery_at" => Carbon::now()->toDateTimeString(),
        ];
        $order = Order::create($data_order);
        $products = Cart::content();
        foreach($products as $product)
        {
            $order_detail = [
              "order_id" => $order->id ,
              "product_id" => $product->id,
              "quantity" => $product->qty,
            ];
            $order->orderDetail()->create($order_detail);
            // OrderDetail::create($order_detail);
        }
        return view('user.ordercomplete');
    }
    public function cart_ordercomplete()
    {   
        return view('user.ordercomplete');
    }
    public function shop_db_cart($id)
    {   
        dd(Cart::store('id'));
    }
    
    public function content_cart_load_more_ajax(Request $request)
    {
        $Carts = Cart::content();     
        return response()->json(view()->make('user.content_cart_load_more_ajax', array('Carts' => $Carts))->render());
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
}
