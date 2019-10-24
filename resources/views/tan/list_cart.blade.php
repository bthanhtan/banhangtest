@extends('master')


@section('content')
  <?php 

        $local_link = 'http://localhost/Laravel/Ai_template/aisuphu-banhang/phailamhet/public/';
        $stt = 0;

        $tongtien = 0;
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Quatity</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Thanh Tien</th>
      <th scope="col">Tool</th>
    </tr>
  </thead>
  <tbody>
@foreach ($carts as $key => $cart) 

    <tr class="row_cart">
      <th scope="row">{{$stt}}</th>
      <td>{{$cart->name}}</td>
      <td>{{$cart->qty}}</td>
      <td>{{$cart->price}}</td>
      @foreach ($cart->options as $value)
      <td><img src="{{$local_link}}{{$value}}"></td>
      @endforeach
      <?php 
        $thanhtien = $cart->qty * $cart->price ; 
        $tongtien += $thanhtien;
        $stt++;
      ?>
      <td>{{$thanhtien}}</td>
      <td>
        <button type="button" class="btn btn-info" onclick="">sửa mặt hàng</button> <br>
        <button type="button" class="btn btn-danger" onclick="shop_remove_cart('{{$key}}',this)">Xóa mặt hàng</button>
      </td>
    </tr>
    
@endforeach
    <tr>
      <td colspan="5">Total: {{$tongtien}}</td>
    </tr>
    <tr>
      <td colspan="5">
        <a type="button" class="btn btn-success" href="{{route('user.order_create')}}">Đặt hàng</a>
        <br>
        <a type="button" class="btn btn-warning" href="{{route('user.user_destroy_list_cart')}}">Hủy giỏ hàng</a>
      </td>
    </tr>
  </tbody>
</table>
@stop


@section('javascript')
<script src="{{ url('user/js/shop.js') }}"></script>
@stop