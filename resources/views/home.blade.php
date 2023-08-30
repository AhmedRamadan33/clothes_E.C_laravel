@extends('layouts.HomeApp')

@section('content')
{{-- Start message Configration --}}
@if (Session::has('done'))
<div class="alert alert-danger text-center">
    {{ Session::get('done') }}
    @php
        Session::forget('done');
    @endphp
</div>
@endif
{{-- End message Configration --}}
    <section class="menz_style">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="sora">
                        <img src="img/xh1_hero2.jpg.pagespeed.ic.nn0ycp9QdZ.webp" alt="" />
                    </div>
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10">
                                <div class="hero-caption text-center">
                                    <span>Fashion Sale</span>
                                    <h1>Minimal Menz Style</h1>
                                    <p>
                                        Consectetur adipisicing elit. Laborum fuga incidunt
                                        laboriosam voluptas iure, delectus dignissimos facilis
                                        neque nulla earum.
                                    </p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="sora">
                        <img src="img/h1_hero1.jpg.webp" alt="" />
                    </div>
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10">
                                <div class="hero-caption text-center">
                                    <span>Fashion Sale</span>
                                    <h1>Minimal Menz Style</h1>
                                    <p>
                                        Consectetur adipisicing elit. Laborum fuga incidunt
                                        laboriosam voluptas iure, delectus dignissimos facilis
                                        neque nulla earum.
                                    </p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>

    <!-- /////////////////// -->
    <section class="fashion p-70">
        <div class="container">
            <div class="row">
                <div class="swiper" id="swiper4">
                    <div class="slide-content" id="slide_content4">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $item)
                                <div class="items-img swiper-slide">
                                    <div class="items-text">
                                        <h4><a href="{{ route('indexProducts', $item->id) }}">{{ $item->name }}</a></h4>
                                        <a href="{{ route('indexProducts', $item->id) }}" class="browse-btn">Shop Now</a>
                                    </div>
                                    <a href="{{ route('indexProducts', $item->id) }}"><img src="{{ asset('files/' . $item->image) }}" alt="" /></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </section>
    <!-- /////////////////////// -->
    <section class="trending p-70">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="nav-button">
                        <nav>
                            <div class="nav-tittle">
                                <h2>Trending This Week</h2>
                            </div>
                            <div class="nav">
                                <a class="nav-link active" href="#nav-one">Men</a>
                                <a class="nav-link" href="#nav-two">Women</a>
                                <a class="nav-link" href="#nav-three">Baby</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper" id="swiper1">
                    <div class="slide-content" id="slide_content1">
                        <div class="swiper-wrapper">
                            @foreach ($trending as $item)
                            <div class="item swiper-slide" >
                                <div class="sora">
                                    <div class="icon">
                                        <a href="{{route('prodShow',$item->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                        <i class="fa-solid fa-heart"></i>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <img src="{{asset('files/'.$item->image)}}" alt=""/>
                                </div>
                                <h3><a href="{{route('prodShow',$item->id)}}">{{$item->name}}</a></h3>
                                <h6 class="description">{{$item->description}}</h6>

                                <span>{{$item->discount_price}}<span>{{$item->price}}</span></span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ////////////////////////// -->
    <section class="customer_testimonial p-70">
        <div class="container">
            <div class="swiper" id="swiper2">
                <div class="slide-content" id="slide_content2">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="text-center">
                                <h2>Customer Testimonial</h2>
                                <p>
                                    Everybody is different, which is why we offer styles for
                                    every body. Laborum fuga incidunt laboriosam voluptas iure,
                                    delectus dignissimos facilis neque nulla earum.
                                </p>
                            </div>
                            <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                <div class="founder-img">
                                    <img src="img/xfounder-img.png.pagespeed.ic.4PZGL9Sx_O.png" alt="" />
                                </div>
                                <div class="founder-text">
                                    <span>Petey Cruiser</span>
                                    <p>Designer at Colorlib</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="text-center">
                                <h2>Customer Testimonial</h2>
                                <p>
                                    Everybody is different, which is why we offer styles for
                                    every body. Laborum fuga incidunt laboriosam voluptas iure,
                                    delectus dignissimos facilis neque nulla earum.
                                </p>
                            </div>
                            <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                <div class="founder-img">
                                    <img src="img/xfounder-img.png.pagespeed.ic.4PZGL9Sx_O.png" alt="" />
                                </div>
                                <div class="founder-text">
                                    <span>Petey Cruiser</span>
                                    <p>Designer at Colorlib</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>

            </div>
        </div>
    </section>
    <!-- //////////////////////// -->
    <section class="you_may_like p-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper" id="swiper3">
                    <div class="slide-content" id="slide_content3">
                        <div class="swiper-wrapper">
                            @foreach ($mayLike as $item)
                                <div class="item swiper-slide">
                                    <div class="sora">
                                        <div class="icon">
                                        <a href="{{route('prodShow',$item->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                            <i class="fa-solid fa-heart"></i>
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                        <img src="{{ asset('files/' . $item->image) }}" alt="" />
                                    </div>
                                    <h3><a href="{{route('prodShow',$item->id)}}">{{$item->name}}</a></h3>
                                <h6 class="description">{{$item->description}}</h6>
                                    <span>{{$item->price}}<span>{{$item->discount_price}}</span></span>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>

                </div>

            </div>
        </div>
    </section>
    <!-- //////////////////////// -->

    <div class="categories p-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 text-center">
                        <div class="cat-icon">
                            <img class="sora1" src="{{ asset('img/services1.svg') }}" alt="" />
                        </div>
                        <div class="cat-cap">
                            <h5>Fast &amp; Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 text-center">
                        <div class="cat-icon">
                            <img src="{{ asset('img/services2.svg') }}" alt="" />
                        </div>
                        <div class="cat-cap">
                            <h5>Secure Payment</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 text-center">
                        <div class="cat-icon">
                            <img src="{{ asset('img/services3.svg') }}" alt="" />
                        </div>
                        <div class="cat-cap">
                            <h5>Money Back Guarantee</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 text-center">
                        <div class="cat-icon">
                            <img src="{{ asset('img/services4.svg') }}"alt="" />
                        </div>
                        <div class="cat-cap">
                            <h5>Online Support</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ///////////////////////////////// -->
@endsection
