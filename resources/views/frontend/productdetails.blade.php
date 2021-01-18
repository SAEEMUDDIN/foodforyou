@extends('layouts.frontend_app')

@section('frontend_content')
  <!-- .breadcumb-area start -->
      <div class="breadcumb-area bg-img-4 ptb-100">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="breadcumb-wrap text-center">
                          <h2>Contact Us</h2>
                          <ul>
                              <li><a href="index-2.html">Home</a></li>
                              <li><span>Contact</span></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- .breadcumb-area end -->

<!-- single-product-area start-->
<div class="single-product-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-single-img">
                  <div class="product-active owl-carousel">
                    <div class="item">
                      <img src="{{ asset('uploads/product_photos') }}/{{ $actvie_product->product_photo }}" alt="">
                    </div>
                  </div>
                    <div class="product-thumbnil-active  owl-carousel">
                        <div class="item">
                          <img src="{{ asset('uploads/product_photos') }}/{{ $actvie_product->product_photo }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-single-content">
                    <h3>{{ $actvie_product->product_name }}</h3>
                    <div class="rating-wrap fix">
                        <span class="pull-left">${{ $actvie_product->product_price }}</span>
                        <ul class="rating pull-right">

                        </ul>
                    </div>
                    <p>{{ $actvie_product->product_short_description }}</p>
                    <ul class="input-style">

                      <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" value = "{{ $actvie_product->id }}" name = "product_id">
                        <li class="quantity cart-plus-minus">
                          <input type="text" value="1" name = "product_quantity">
                        </li>
                        <li>
                          <button type="submit" class = "btn btn-danger">Add to Cart</button>
                        </li>
                      </form>
                    </ul>
                  
                    <div class="color-plate">
                        <p>Color:</p>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="product-size">
                        <p>Size:</p>
                        <ul>
                            <li><a href="#">S</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">XL</a></li>
                        </ul>
                    </div>
                    <ul class="socil-icon">
                        <li>Share :</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-12">
                <div class="single-product-menu">
                    <ul class="nav">
                        <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                        <li><a data-toggle="tab" href="#tag">Faq</a></li>
                        <li><a data-toggle="tab" href="#review">Review</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="description">

                        <div class="description-wrap">
                            <p>{{ $actvie_product->product_long_description }}</p>
                        </div>
                    </div>
                 
                    <div class="tab-pane" id="review">

                        <div class="review-wrap">
                            <ul>
                               
                               
                            </ul>
                        </div>


                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single-product-area end-->

@endsection
