@extends('admin.master')

@section('title', 'Page Title')

@section('content')
<?php 
    $name_admin = auth()->user()->name;
?>
<h1>Xin chào <span style="color: red;">{{$name_admin}}</span> </h1>
<h4>Hãy chọn nơi muốn tới</h4>
<a href="{{route('admin.category_product_index')}}" class="btn btn-success">category_product_index</a>
<a href="{{route('admin.product_create')}}" class="btn btn-success">product_create</a>
@stop

@section('javascript')
@stop