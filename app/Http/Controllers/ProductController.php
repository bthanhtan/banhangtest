<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Category_product;
use App\Product;
use App\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::select()->get();
        return view('admin.product.list',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_products = Category_product::select()->get();
        return view('admin.product.form',['category_products'=>$category_products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule_image = [
            "file" => 'required',
        ];
        $rule= [
            "name" => 'required|max:50',
            "detail" => 'required|max:255',
            "price" => 'integer|min:1000',
            "description" => 'required|max:255',
            "category_product_id" => 'integer',
            "status" => 'required|integer',
            "discount_price" => 'required|integer',
        ];
        $request->validate($rule);
        $request->validate($rule_image);
        $data_request = $request->all();
        $data_product = [
           "name" => $data_request['name'],
           "detail" => $data_request['detail'],
           "price" => $data_request['price'],
           "description" => $data_request['description'],
           "category_product_id" => $data_request['category_product_id'],
           "user_id" => auth()->user()->id,
           "status" => $data_request['status'],
           "discount_price" => $data_request['discount_price'],
        ];
        $data_images = $data_request['file']['image'];
        if ($product = Product::create($data_product)) {
            foreach ($data_images as $key => $value) {
                $data_image = [
                   "src" => $value['src'],
                ];
                $product->images()->create($data_image);
            }
        }
        
        return redirect()->route('admin.product_index');
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
        $product = Product::find($id);
        $category_products = Category_product::select()->get();
        return view('admin.product.form',[ 'product' => $product , 'category_products'=>$category_products]);
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
        $data_images = $request['file']['image'];
        // dd($request->all());
        $rule= [
            "name" => 'required|max:50',
            "detail" => 'required|max:255',
            "price" => 'integer|min:1000',
            "description" => 'required|max:255',
            "category_product_id" => 'integer',
            "status" => 'required|integer',
            "discount_price" => 'required|integer',
        ];
        $request->validate($rule);
        $product = Product::find($id);
        $request['user_id'] = auth()->user()->id;
        // dd($data_images);
        if ($product->update($request->all())) {
            foreach ($data_images as $key => $value) {
                if (isset($value['id'])) {
                   $id_img = $value['id'];
                    $src_img_new = $value['src'];
                    $img_old = Image::find($id_img);
                    $src_img_old = $img_old->src;
                    if ($src_img_new != $src_img_old) {
                        $img_old->update(['src' => $src_img_new ]);
                        File::delete($src_img_old);
                    }
                }
                else{
                   $data_image = [
                       "src" => $value['src'],
                    ];
                    $product->images()->create($data_image);
                }
            }
        }
        $product->update($request->all());
        return redirect()->route('admin.product_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product_index');
    }

    public function uploadimage(Request $request)
    {
         $danhsach_images= [];
        foreach ($request->file as $key => $file) {
            $name = md5(uniqid(rand(), true)).'_'.time().'.'.$file->getClientOriginalExtension(); 
            $destinationPath = public_path('uploads'); 
            $file->move($destinationPath, $name);
            $nameReturn = 'uploads/'.$name; 
            array_push($danhsach_images, $nameReturn); 
        }
        return $danhsach_images;
    }

    public function edit_image(Request $request)
    {
        $danhsach_images= [];
        foreach ($request->file as $key => $file) {
            $name = md5(uniqid(rand(), true)).'_'.time().'.'.$file->getClientOriginalExtension(); 
            $destinationPath = public_path('uploads'); 
            $file->move($destinationPath, $name);
            $nameReturn = 'uploads/'.$name;  
            array_push($danhsach_images, $nameReturn); 
        }
        return $danhsach_images;
    }

    public function delete_image($id)
    {
        $img_delete = Image::find($id);
        $src_delete = $img_delete->src;
        
        
        if ($img_delete->delete()) {
            File::delete($src_delete);
        }
    }
}
