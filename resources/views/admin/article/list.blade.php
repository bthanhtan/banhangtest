@extends('admin.master')

@section('title', 'List Category')

@section('content')
    <a href="{{route('admin.article_create')}}" class="btn btn-success">Create</a>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>user_id</th>
            <th>title</th>
            <th>status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($articles as $key => $article)
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{$article->user_id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->status}}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('admin.article_edit',['id'=>$article->id]) }}">Edit</a> <br>
                <form action="{{ route('admin.article_delete',['id'=>$article->id]) }}" method="post">
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

