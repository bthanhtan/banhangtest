<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_product;

class Category_productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_products = Category_product::select()->get();
        return view('admin.category_product.list',['category_products'=>$category_products]);
    }


    public function create()
    {
        return view('admin.category_product.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule= [
            "name" => "required",
        ];
        $request->validate($rule);
        
        $category_product = $request->all();
        $category_product['status'] = 1;
        Category_product::create($category_product);
        return redirect()->route('admin.category_product_index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_product = Category_product::find($id);
        return view('admin.category_product.form',[ 'category_product' => $category_product ]);
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
            "name" => "required",
        ];
        $request->validate($rule);
        $category_product = Category_product::find($id);
        $category_product->update($request->all());
        return redirect()->route('admin.category_product_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_product = Category_product::find($id);
        $category_product->delete();
        return redirect()->route('admin.category_product_index');
    }

    public function upload_image(Request $request)
    {
        // dd($request->file);
        $danhsach_images= [];
        // $danhsach_images = array();
        // dd($request->file);
        // $duoi = $request->file->getClientOriginalName();
        foreach ($request->file as $key => $file) {
            $name = md5(uniqid(rand(), true)).'_'.time().'.'.$file->getClientOriginalExtension(); 
            $destinationPath = public_path('uploads'); 
            $file->move($destinationPath, $name);
            $nameReturn = 'uploads/'.$name; 
            array_push($danhsach_images, $nameReturn); 
        }
       
        // $name = md5(uniqid(rand(), true)).'_'.time().'.'.$img->getClientOriginalExtension(); 
        // $destinationPath = public_path('uploads'); 
        // $img->move($destinationPath, $name);
        // $nameReturn = 'uploads/'.$name; 
        return $danhsach_images;
        // return response()->json($danhsach_images);
    }


}
