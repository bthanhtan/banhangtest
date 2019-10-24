@extends('admin.master')

@section('title', 'Page Title')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
        @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <div style="color: red;">{{$error}}</div>
             @endforeach
         @endif
        <form class="user" enctype="multipart/form-data" action="{{ isset($category_product->id) ?  route('admin.category_product_update',['id'=>$category_product->id]) : route('admin.category_product_store')}}" method="post">
            @if(isset($category_product->id))
            @method('put')
            @endif
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ old('name', $category_product->name ?? '') }}">
                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@stop

@section('javascript')
<script src="{{ url('admin/category_product.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@stop
