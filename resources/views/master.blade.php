<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/master.css') }}">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="{{ url('user/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/slicknav.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('user/style.css') }}">
    <link rel="stylesheet" href="{{ url('user/assetscss/responsive.css') }}">
  </head>
  <body>


<div class="container">
    <!-- menu top -->
  <div class="row align-items-start">
    <div class="col">

<nav class="navbar navbar-expand-lg navbar-light bg-light float-right">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="#">Trang Chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item  dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Áo</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Áo Nam</a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#">Sơ mi</a></li>
                           <li><a class="dropdown-item" href="#">Thun</a></li>
                           <li><a class="dropdown-item" href="#">Khoác</a></li>
                        </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Áo Nữ</a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#">2 dây</a></li>
                           <li><a class="dropdown-item" href="#">hở lưng</a></li>
                           <li><a class="dropdown-item" href="#">Sexy</a></li>
                        </ul>
                </li>
            </ul>
        </li>
        <li class="nav-item  dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Quần</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Quần Nam</a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#">Tây</a></li>
                           <li><a class="dropdown-item" href="#">Khaki</a></li>
                           <li><a class="dropdown-item" href="#">Jean</a></li>
                        </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Quần Nữ</a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#">Váy ngắn</a></li>
                           <li><a class="dropdown-item" href="#">quần đùi</a></li>
                           <li><a class="dropdown-item" href="#">Sexy</a></li>
                        </ul>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Giày
        </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Thể Thao</a></li>
                <li><a class="dropdown-item" href="#">Tây</a></li>
            </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('tan.tan_list_cart')}}">Cart[<span id="countCart">{{isset($countCart) ? $countCart : 0}}</span>]</a></a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


    </div>    
  </div>
    <!-- end menu top -->
    <!-- banner top -->
  <div class="row align-items-center">
    <div class="col text-danger bg-success">
      banner
    </div>
  </div>
    <!-- end banner top -->
    <!-- main container -->
    @yield('content')
    <!-- end main container -->
    <!-- footer -->
  <div class="row align-items-end bg-secondary">
    <div class="col">
      liên hệ với chúng tôi
      <a href="" title=""> facebook </a>
      <a href="" title=""> zalo </a>
    </div>
  </div>
    <!-- end footer -->
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/master.js') }}"></script>
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