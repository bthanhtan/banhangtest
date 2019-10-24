@extends('user.master')


@section('banner')
   <section class="banner home-banner">
        <div class="overlay"></div>
        <div class="banner-text text-center text-uppercase">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>Welcome to NEON Creative Theme</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')

	<section class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Filters -->
                    <div class="portfolioFilter text-center">
                        <span>
                            <a href="#" data-filter="*" class="current">All</a>
                            <a href="#" data-filter=".design">Design</a>
                            <a href="#" data-filter=".development">Development</a>
                            <a href="#" data-filter=".branding">Branding</a>
                        </span>
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="portfolioContainer">

                            <div class="col-md-4 col-sm-6 col-xs-12 design">
                                <div class="st-work">
                                    <a href="single-portfolio.html"><img src="{{ url('user/assets/images/portfolio/1.jpg') }}" alt=""><div class="overlay"></div></a>
                                    <div class="work-overlay text-center">
                                        <a href="#" class="like-button"><i class="fa fa-heart-o"></i></a>
                                        <h2><a href="single-portfolio.html">Digital Pen</a></h2>
                                        <h3 class="portfolio-cat"><a href="#">Design</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 development">
                                <div class="st-work">
                                    <a href="single-portfolio.html"><img src="{{ url('user/assets/images/portfolio/2.jpg') }}" alt=""><div class="overlay"></div></a>
                                    <div class="work-overlay text-center">
                                        <a href="#" class="like-button"><i class="fa fa-heart-o"></i></a>
                                        <h2><a href="single-portfolio.html">Sabonete Liquid</a></h2>
                                        <h3 class="portfolio-cat"><a href="#">Development</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 design">
                                <div class="st-work">
                                    <a href="single-portfolio.html"><img src="{{ url('user/assets/images/portfolio/3.jpg') }}" alt=""><div class="overlay"></div></a>
                                    <div class="work-overlay text-center">
                                        <a href="#" class="like-button"><i class="fa fa-heart-o"></i></a>
                                        <h2><a href="single-portfolio.html">Binary Art</a></h2>
                                        <h3 class="portfolio-cat"><a href="#">Design</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 development">
                                <div class="st-work">
                                    <a href="single-portfolio.html"><img src="{{ url('user/assets/images/portfolio/4.jpg') }}" alt=""><div class="overlay"></div></a>
                                    <div class="work-overlay text-center">
                                        <a href="#" class="like-button"><i class="fa fa-heart-o"></i></a>
                                        <h2><a href="single-portfolio.html">New Hammer Pro</a></h2>
                                        <h3 class="portfolio-cat"><a href="#">Development</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 development">
                                <div class="st-work">
                                    <a href="single-portfolio.html"><img src="{{ url('user/assets/images/portfolio/5.jpg') }}" alt=""><div class="overlay"></div></a>
                                    <div class="work-overlay text-center">
                                        <a href="#" class="like-button"><i class="fa fa-heart-o"></i></a>
                                        <h2><a href="single-portfolio.html">Broken Style Cup</a></h2>
                                        <h3 class="portfolio-cat"><a href="#">Development</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 branding">
                                <div class="st-work">
                                    <a href="single-portfolio.html"><img src="{{ url('user/assets/images/portfolio/6.jpg') }}" alt=""><div class="overlay"></div></a>
                                    <div class="work-overlay text-center">
                                        <a href="" class="like-button"><i class="fa fa-heart-o"></i></a>
                                        <h2><a href="single-portfolio.html">Safe Water Can</a></h2>
                                        <h3 class="portfolio-cat"><a href="#">Branding</a></h3>
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