@extends('layouts.frontend_app')

@section('frontend_content')
    <!-- slider-area start -->
    <div class="slider-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
              @foreach ($banner_all as $banner)
                <div class="swiper-slide overlay">
                    <div class="single-slider slide-inner slide-inner1" style = "background: url({{ asset('uploads/banner_photos') }}/{{ $banner->banner_photo }})">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-lg-9 col-12">
                                    <div class="slider-content">
                                        <div class="slider-shape">
                                            <h2 data-swiper-parallax="-500">{{ $banner->banner_heading }}</h2>
                                            <p data-swiper-parallax="-400">{{ $banner->banner_desciption }}</p>
                                            <a href="{{ $banner->button_link }}" data-swiper-parallax="-300">{{ $banner->banner_button }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider-area end -->

    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Food</h2>
                        <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
              @foreach ($product_all as $product)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                 
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('productdetails' , $product->slug) }}">{{ $product->product_name }}</a></h3>
                            <p class="pull-left">RM {{ $product->product_price }} |
                                <span class = "pl-1">P: Q: - {{ $product->product_quantity }}</>
                            </p>
                            <ul class="pull-right d-flex">

                            @if (average_stars($product->id) == 0)
                                No Review Yet
                            @endif

                            @for ($i = 1; $i <= average_stars($product->id); $i++)
                            <li><i class="fa fa-star"></i></li>
                            @endfor

                            </ul>
                        </div>
                    </div>
                </li>
              @endforeach
            </ul>
        </div>
    </div>
    <!-- product-area end -->

@endsection
