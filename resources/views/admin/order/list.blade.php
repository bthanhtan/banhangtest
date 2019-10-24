@extends('admin.master')

@section('title', 'List Category')

@section('content')
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>user_id</th>
            <th>status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $key => $order)
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{$order->user_id}}</td>
            <td>{{$order->status}}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('admin.order_edit',['id'=>$order->id]) }}">Edit</a> <br>
                <form action="{{ route('admin.order_delete',['id'=>$order->id]) }}" method="post">
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

