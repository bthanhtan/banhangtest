@extends('master')


@section('content')
  <div class="row align-items-center">
    <div class="col-12 col-md-9">
      <div class="row justify-content-around">
            @foreach($products as $product)
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">{{$product->name}}</h4>
                      <p class="card-text">{{$product->price}}</p>
                      <a href="{{ route('tan.tan_chitiet',['id'=>$product->id]) }}" title=""><img src="{{ url($product->images[0]->src) }}" width="100" alt=""></a> <br>
                      <a href="#" class="card-link">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
      </div>
    </div>
    <div class="col-12 col-md-3 bg-primary">
      gợi ý sàn phẩm
    </div>
  </div>
@stop