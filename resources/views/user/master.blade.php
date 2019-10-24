<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Rubel Miah">

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ url('user/assets/images/favicon.png') }}">

    <title>Neon</title>

    <!-- common css -->
    <link rel="stylesheet" href="{{ url('user/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/slicknav.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('user/style.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/responsive.css') }}">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.js"></script>
    <![endif]-->

</head>
<body>

    <!--start pre-loader-->
    <div id="st-preloader">
        <div class="st-preloader-circle"></div>
    </div>
    <!--end pre-loader-->

    <!--start header-->

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="logo pull-left"><a href="index.html"><img src="{{ url('user/assets/images/logo.png') }}" alt="Neon"></a></div>
                    <nav class="main-menu pull-right">
                        <ul class="menu-list">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About</a></li>
                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children"><a href="index.html">Portfolio</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Grid Style</a></li>
                                            <li><a href="index-two.html">Masnry Style</a></li>
                                            <li><a href="single-portfolio.html">Single Portfolio</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="service.html">Service</a></li>
                                    <li class="menu-item-has-children"><a href="contact.html">Contact</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="contact-two.html">Get in Touch</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop.html">Shop</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shop Page</a></li>
                                            <li><a href="single-shop.html">Single Product</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="blog.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog Page</a></li>
                                            <li><a href="single-blog.html">Single Post</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="blog.html">Journal</a></li>
                            <li><a href="contact.html">Connect</a></li>
                            <li><a href="{{route('user.user_list_cart')}}">Cart[<span id="countCart">{{isset($countCart) ? $countCart : 0}}</span>]</a></li>
                        </ul>
                    </nav>
                    <div class="menu-mobile"></div>

                </div>
            </div>
        </div>
    </header>
    <!--end header-->

    <!--start banner-->
    @yield('banner')
    <!--end banner-->

    <!--start portfolio-->
    @yield('content')
    <!--end portfolio-->


    <!--start footer-->
    <footer class="footer">
        <div class="footer-top text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p>Need Similar Project? <a href="#" class="btn btn-let-us-know text-uppercase">Let us Know</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="footer-address">
                            239/2 North Kafrul<br>
                            New York, NY 201890
                        </p>
                        <div class="footer-social-icons">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook-f"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                        <div class="copy-right-text">&copy; 2016 NEON, Designed by <a href="#">ShapedTheme</a> in Bangladesh</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--end footer-->

<!-- js files -->
<script type="text/javascript" src="{{ url('user/assets/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ url('user/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('user/assets/js/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ url('user/assets/js/jquery.slicknav.js') }}"></script>
<script type="text/javascript" src="{{ url('user/assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ url('user/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('user/assets/js/scripts.js') }}"></script>
@yield('javascript')
</body>
</html>