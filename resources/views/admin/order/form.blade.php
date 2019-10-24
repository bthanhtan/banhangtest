@extends('admin.master')

@section('title', 'Page Title')

@section('content')
        
        <form class="user" enctype="multipart/form-data" action="{{ isset($order->id) ?  route('user.order_update',['id'=>$order->id]) : route('user.order_store')}}" method="post">
            @if(isset($order->id))
            @method('put')
            @endif
            @csrf
            <div class="form-group">
                
                <label for="exampleInputEmail1">Shipment_address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="shipment_address" value="{{ old('shipment_address', $order->shipment_address ?? '') }}">
                <label for="exampleInputEmail1">Shipment_name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="shipment_name" value="{{ old('shipment_name', $order->shipment_name ?? '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@stop