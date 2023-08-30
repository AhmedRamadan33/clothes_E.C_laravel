<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/Screenshot_18.png') }}" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shop | eCommers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assetsHome/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsHome/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsHome/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsHome/css/main.css') }}" />
</head>

<body>
    <div id="app">
        <header class="header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}"><img
                            src="{{ asset('img/download.png') }}"alt="" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('indexProducts', 1) }}">Men</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('indexProducts', 2) }}">women</a>
                            </li>
                            <li class="nav-item">
                                <div class="over">New</div>
                                <a class="nav-link new" href="{{ route('indexProducts', 3) }}">Baby collection</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="icon">
                        @auth
                        <a href="{{ route('ViewCart') }}">
                            <span><i class="fa-solid fa-cart-shopping"></i></span>
                            <span class="quantity cart-count"></span>
                        </a>
                        <a href="{{ route('wishlist') }}">
                            <span class=""><i class="fa-regular fa-star"></i></span>
                            <span class="quantity wishlist-count"></span>
                        </a>
                            
                        @endauth

                    </div>
                    <li class="nav-item dropdown">
                        @auth
                            <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('myOrder')}}">My Orders</a>
                            </div>
                        @else
                            @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                    @endauth

                    </li>
                </div>
            </nav>
        </header>
        <!-- /////////////////////// -->
        <span class="back-to-top up d-flex align-items-center justify-content-center"><i
                class="fa-solid fa-arrow-up"></i></span>

        <!-- //////////////////////////// -->
        <section class="header-bottom text-center">
            <div class="container">
                <p>
                    Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer
                    <a href="#" class="browse-btn">Shop Now</a>
                </p>
            </div>
        </section>
        <!-- //////////////////////// -->


        <main>
            @yield('content')
        </main>

        <!-- ///////////////////////////////// -->
        <footer>
            <div class="footer-wrapper gray-bg p-70">
                <div class="footer-area footer-padding">
                    <section class="subscribe-area">
                        <div class="container">
                            <div class="row justify-content-between subscribe-padding">
                                <div class="col-xxl-3 col-xl-3 col-lg-4">
                                    <div class="subscribe-caption">
                                        <h3>Subscribe Newsletter</h3>
                                        <p>Subscribe newsletter to get 5% on all products.</p>
                                    </div>
                                </div>
                                <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                                    <div class="subscribe-caption">
                                        <form action="#">
                                            <input type="text" placeholder="Enter your email" />
                                            <button class="subscribe-btn">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-4">
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                                <div class="single-footer-caption mb-50">
                                    <div class="single-footer-caption mb-20">
                                        <div class="footer-logo mb-35">
                                            <a href="#"><img
                                                    src="{{ asset('img/xlogo2_footer.png.pagespeed.ic.DUxRn4vG1w.png') }}"alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Shop Men</h4>
                                        <ul>
                                            <li><a href="#">Clothing Fashion</a></li>
                                            <li><a href="#">Winter</a></li>
                                            <li><a href="#">Summer</a></li>
                                            <li><a href="#">Formal</a></li>
                                            <li><a href="#">Casual</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Shop Women</h4>
                                        <ul>
                                            <li><a href="#">Clothing Fashion</a></li>
                                            <li><a href="#">Winter</a></li>
                                            <li><a href="#">Summer</a></li>
                                            <li><a href="#">Formal</a></li>
                                            <li><a href="#">Casual</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Baby Collection</h4>
                                        <ul>
                                            <li><a href="#">Clothing Fashion</a></li>
                                            <li><a href="#">Winter</a></li>
                                            <li><a href="#">Summer</a></li>
                                            <li><a href="#">Formal</a></li>
                                            <li><a href="#">Casual</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Quick Links</h4>
                                        <ul>
                                            <li><a href="#">Track Your Order</a></li>
                                            <li><a href="#">Support</a></li>
                                            <li><a href="#">FAQ</a></li>
                                            <li><a href="#">Carrier</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="footer-border">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="footer-copy-right text-center">
                                        <p>
                                            Copyright ©2022 All rights reserved | This template is
                                            made with
                                            <i class="fa fa-heart color-danger"></i>
                                            by
                                            <a href="#" target="_blank" rel="nofollow noopener">Colorlib</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /////////////////////////////////////////// -->
    <script src="{{ asset('assetsHome/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assetsHome/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetsHome/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetsHome/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assetsHome/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
        @yield('scripts')
    <script src="{{ asset('assetsHome/js/main.js') }}"></script>
    <script src="{{ asset('assetsHome/js/checkout.js') }}"></script>

</body>

</html>
