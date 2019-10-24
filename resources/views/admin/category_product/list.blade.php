@extends('admin.master')

@section('title', 'List Category')

@section('content')
<?php 
  
?>
    <a href="{{route('admin.category_product_create')}}" class="btn btn-success">Create</a>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Tool</th>
          </tr>
        </thead>
        <tbody>
          @foreach($category_products as $key => $category_product)
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{$category_product->name}}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('admin.category_product_edit',['id'=>$category_product->id]) }}">Edit</a> <br>
                <form action="{{ route('admin.category_product_delete',['id'=>$category_product->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@stop

