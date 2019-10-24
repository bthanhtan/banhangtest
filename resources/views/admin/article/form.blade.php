@extends('admin.master')

@section('title', 'Page Title')

@section('content')
        
        <form class="user" enctype="multipart/form-data" action="{{ isset($article->id) ?  route('admin.article_update',['id'=>$article->id]) : route('admin.article_store')}}" method="post">
            @if(isset($article->id))
            @method('put')
            @endif
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">user_id</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_id" value="{{ old('user_id', $article->user_id ?? '') }}">
                <label for="exampleInputEmail1">title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{ old('title', $article->title ?? '') }}">
                <label for="exampleInputEmail1">sub_title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sub_title" value="{{ old('sub_title', $article->sub_title ?? '') }}">
                <label for="exampleInputEmail1">content</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="content" value="{{ old('content', $article->content ?? '') }}">
                <label for="exampleInputEmail1">tag</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tag" value="{{ old('tag', $article->tag ?? '') }}">
                <label for="exampleInputEmail1">status</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status" value="{{ old('status', $article->status ?? '') }}">
                <label for="exampleInputEmail1">category_article_id</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_article_id" value="{{ old('category_article_id', $article->category_article_id ?? '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@stop