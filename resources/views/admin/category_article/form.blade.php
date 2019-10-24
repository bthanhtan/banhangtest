@extends('admin.master')

@section('title', 'Page Title')

@section('content')
        
        <form class="user" enctype="multipart/form-data" action="{{ isset($category_article->id) ?  route('admin.category_article_update',['id'=>$category_article->id]) : route('admin.category_article_store')}}" method="post">
            @if(isset($category_article->id))
            @method('put')
            @endif
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ old('name', $category_article->name ?? '') }}">
                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@stop