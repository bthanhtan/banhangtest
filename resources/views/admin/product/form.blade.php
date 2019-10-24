@extends('admin.master')

@section('title', 'Page Title')

@section('content')
        @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <div style="color: red;">{{$error}}</div>
             @endforeach
         @endif
        <form class="user" enctype="multipart/form-data" action="{{ isset($product->id) ?  route('admin.product_update',['id'=>$product->id]) : route('admin.product_store')}}" method="post">
            @if(isset($product->id))
            @method('put')
            @endif
            @csrf
            <?php $dem = 0; ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ old('name', $product->name ?? '') }}">
                <label for="exampleInputEmail1">Detail</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="detail" value="{{ old('name', $product->detail ?? '') }}">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="{{ old('price', $product->price ?? '') }}">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description" value="{{ old('description', $product->description ?? '') }}">
                <label for="exampleFormControlSelect2">Select Category_product</label>
                <select class="form-control" id="exampleFormControlSelect2" name="category_product_id">
                    @foreach($category_products as $category_product)
                    <option value="{{ old('category_product_id', $category_product->id ?? '') }}">{{$category_product->name}}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1">Status</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status" value="{{ old('status', $product->status ?? '') }}">
                <label for="exampleInputEmail1">DiscountPrice</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="discount_price" value="{{ old('discount_price', $product->discount_price ?? '') }}">
                @if(isset($product->id))
                <?php 
                    // $local_link = "http://localhost/lamchohet/aisuphu-banhang/phailamhet/public/";
                    $local_link = "http://localhost/Laravel/Ai_template/aisuphu-banhang/phailamhet/public/";
                    $img_products = $product->images; 
                ?>
                @foreach ($img_products as $key => $value)
                <?php 
                    $class_img_tag = "new_val_img_".$value->id;
                    $class_input_tag = "new_val_input_".$value->id;
                    $a = [
                        "id" => $value->id,
                        "src" => $value->src,
                    ];
                ?>
                <div class="parent_{{$value->id}} abcd">
                    <img class="{{$class_img_tag}}" src="{{$local_link}}{{$value->src}}" width="200">

                    <input type="text" name="file[image][{{$key}}][id]" value="{{$value->id}}"/>

                    <input class="{{$class_input_tag}}" type="text" name="file[image][{{$key}}][src]" value="{{$value->src}}"/>

                    <input  id="file" type="file" name="" value="Edit" onchange="edit_Image_change(this, {{$value->id}})"/>

                    <input type="button" class="btn btn-danger btn_delete_{{$value->id}}" value="Delete" onclick="delete_Image(this,{{$value->id}})"> <br><br>
                </div>
                <?php $dem = $key+1; ?>
                @endforeach
                @endif
                <label for="file">Chọn thêm file</label>
                <input  id="file" type="file" name="image"  multiple onchange="upload_Image_change(this, {{$dem}})"/>
                <div id="them_img"></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@stop

@section('javascript')
<script src="{{ url('admin/js/product.js') }}"></script>
@stop