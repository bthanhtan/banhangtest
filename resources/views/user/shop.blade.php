@extends('user.master')


@section('banner')
   <section class="banner shop-banner">
        <div class="overlay"></div>
        <div class="banner-text text-center text-uppercase">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>Shop with us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')

	<section class="shop">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="shop-products">

                        	@foreach($products as $product)
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <a href="{{route('user.user_single_shop',['id' => $product->id ])}}">
                                    	<?php 
                                    	$images = $product->images()->select()->get();
                                    	foreach ($images as $image) { ?>
                                    		<img src="{{url($image->src)}}" alt="">
                                    	<?php } ?>
                                        <h2 class="product-title text-center">{{$product->name}}</h2>
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="product-info">
                                        <span class="product-price pull-left">{{$product->price}}</span>
                                        <a href="" class="add-to-card text-uppercase pull-right">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop