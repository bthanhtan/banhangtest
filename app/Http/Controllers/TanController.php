<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Category_product;
use App\Product;
use App\Image;
use Cart;
class TanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        return view('tan.trangchu',['products' => $products]);
    }
    public function chitiet($id)
    {
        // dd('1');
        $product = Product::find($id);
        return view('tan.chitietsanpham',['product' => $product]);
    }
    public function addtocart($id)
    {
        $product = Product::find($id);
        $product_image = $product->images()->select()->get();
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 550, 'options' => ['image' => $product_image[0]->src]]);
        $a = Cart::count();
        $b = Cart::content();
        $c = Cart::weight();
        return response()->json(['count' => $a,'content'=>$b,'weight'=>$c]);
        return response()->json($b);
        return response($a);
        return view('tan.single_shop',['product' => $product]);
    }
    public function list_cart()
    {
        $carts = Cart::content();
        return view('tan.list_cart',['carts' => $carts]);
    }
    public function tan_edit_cart()
    {
        $carts = Cart::content();
        return view('tan.list_cart',['carts' => $carts]);
    }
    public function tan_remove_cart($rowid)
    {
        Cart::remove($rowid);
       return 1;
        
    }
    public function destroy_list_cart()
    {
        dd('destroy_list_cart');
        Cart::destroy();
        return view('tan.shop',['products' => $products]);
    }
    public function tan_order_list_cart()
    {
        
        dd('tan_order_list_cart');
        $rule= [
            "tan_id" => "required",
        ];
        $request->validate($rule);
        $order = $request->all();
        $order['status'] = 1;
        Order::create($order);
    }
}
