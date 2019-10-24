@extends('user.master')


@section('banner')
   <section class="banner single-shop-banner">
        <div class="overlay"></div>
        <div class="banner-text text-center text-uppercase">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>{{$product->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')
<?php 
$link_login = 'http://localhost/Laravel/Ai_template/aisuphu-banhang/phailamhet/public/login';
 ?>


<section class="single-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-product-thumb">
                        	<?php 
                        	$images = $product->images()->select()->get();
                        	foreach ($images as $image) { ?>
                        		<img src="{{url($image->src)}}" width="200" style="width: 200px;">
                        	<?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-product-info">
                            <h2 class="product-title text-uppercase">{{$product->name}}</h2>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="product-shot-dec">
                                <p>{{$product->detail}}</p>
                            </div>
                            <div class="product-cat"><span class="text-uppercase">Categories:</span> <a href="">{{$product->category_product_id}}</a></div>
                            <div class="product-price">{{$product->price}}</div>

                            <div class="product-add-to-card">
                                <div class="quantity-wanted-p pull-left">
                                    <input type="number" value="0" class="cart-plus-minus-box">
                                    <div class="dec qtybutton">-</div>
                                    <div class="inc qtybutton">+</div>
                                </div>
                                <p onclick="
                                <?php if (auth()->user() == null) {
                                    echo "show_box_alert_cart()";
                                }
                                else  echo "shop_add_to_cart($product->id)"; ?>" class="btn btn-add-to-cart pull-left">Add to cart</p>
                                <!-- shop_add_to_cart({{$product->id}}) -->

                            </div>
                            <div class="alert alert-danger box_alert_cart" style="display: none;">
                                Bạn chưa đăng nhập để thực hiện chức năng thêm sản phẩm vào giỏ hàng, xin vui lòng <strong><a href="{{$link_login}}">đăng nhập.</a></strong>
                            </div>
                            <div class="product-social">
                                <span>Share</span>

                                <a href=""><i class="fa fa-facebook-f"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="description">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#description" aria-controls="description" data-toggle="tab">Description</a></li>
                                <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews (0)</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description">
                                    <p>{{$product->description}}</p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="reviews">

                                    <div class="review-form">
                                        <p>Your email address will not be published. Required fields are marked <span class="required">*</span></p>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Your Rating</label>
                                                    <div class="stars" id="rating"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="author">Name <span class="required">*</span></label><br>
                                                    <input type="text" name="author" id="author">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="email">Email <span class="required">*</span></label><br>
                                                    <input type="text" name="email" id="email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="comment">Your Review <span class="required">*</span></label><br>
                                                    <textarea name="comment" id="comment" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="related-product">
                        <div class="col-md-12"><h4 class="related-product-title">Related Product</h4></div>
                        <div class="col-md-4">
                            <div class="product">
                                <a href=""><img src="assets/images/product/05.jpg" alt="">
                                    <h2 class="product-title text-center">Coffee Cup</h2>
                                    <div class="overlay"></div>
                                </a>
                                <div class="product-info">
                                    <a href="" class="product-price pull-left">$66.00</a>
                                    <a href="" class="add-to-card text-uppercase pull-right">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product">
                                <a href=""><img src="assets/images/product/06.jpg" alt="">
                                    <h2 class="product-title text-center">Coffee Cup</h2>
                                    <div class="overlay"></div>
                                </a>
                                <div class="product-info">
                                    <a href="" class="product-price pull-left">$66.00</a>
                                    <a href="" class="add-to-card text-uppercase pull-right">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product">
                                <a href=""><img src="assets/images/product/07.jpg" alt="">
                                    <h2 class="product-title text-center">Coffee Cup</h2>
                                    <div class="overlay"></div>
                                </a>
                                <div class="product-info">
                                    <a href="" class="product-price pull-left">$66.00</a>
                                    <a href="" class="add-to-card text-uppercase pull-right">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@stop


@section('javascript')
<script src="{{ url('user/js/shop.js') }}"></script>
<script>
    function show_box_alert_cart() {
        $('.box_alert_cart').css('display','block');
    }
</script>
@stop