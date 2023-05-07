@section('style')
<style>
    @media (max-width:767px){
        .carousel-inner .carousel-item > div{
            display: none;
        }

        .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
    }

    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev{
        display: flex;
    }

    @media (min-width:760px){
        .carousel-inner .carousel-item-end.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(25%);
        }

        .carousel-inner .carousel-item-start.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-25%);
        }
    }

    .carousel-inner .carousel-item-end,
    .carousel-inner .carousel-item-start {
        transform: translateX(0);
    }

    


    .badge:hover {
  background-color: #fff;
  color: #000;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
}
/**
*Icon
*/

    .info-icon {
  position: relative;
}

.info-icon:hover .info-text {
  display: block;
}

.info-text {
  display: none;
  position: absolute;
  z-index: 1;
  top: 30px;
  left: -80px;
  width: 200px;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  text-align: left;
  font-size: 14px;
}

.info {
  position: absolute;
  top: 0;
  right: 0;
  padding: 10px;
  z-index: 1;
}

/**
*Careousel
*/

.carousel-control-prev {
  margin-left: 120px;
  border: 2px solid white;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: white;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
}

.carousel-control-prev:before {
  content: "";
  border-style: solid;
  border-width: 6px 8px 6px 0;
  border-color: transparent  transparent transparent ;
  display: inline-block;
  height: 0;
  width: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.carousel-control-next {
  margin-right: 50px;
  border: 2px solid white;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: white;
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
}

.carousel-control-next:before {
  content: "";
  border-style: solid;
  border-width: 6px 0 6px 8px;
  border-color: transparent transparent transparent;
  display: inline-block;
  height: 0;
  width: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>

@endsection



<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>Surfside Media</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/theme/favicon.ico')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"></head>
@livewireStyles
<body>
    

<main class="main">
      {{--Carrousel por defecto--}}
<section class="home-slider position-relative pt-50">
  <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
      <div class="single-hero-slider single-animation-wrap">
          <div class="container">
              <div class="row align-items-center slider-animated-1">
                  <div class="col-lg-5 col-md-6">
                      <div class="hero-slider-content-2">
                          <h4 class="animated">Trade-in offer</h4>
                          <h2 class="animated fw-900">Supper value deals</h2>
                          <h1 class="animated fw-900 text-brand">On all products</h1>
                          <p class="animated">Save more with coupons & up to 70% off</p>
                          <a class="animated btn btn-brush btn-brush-3" href="product-details.html"> Shop Now </a>
                      </div>
                  </div>
                  <div class="col-lg-7 col-md-6">
                      <div class="single-slider-img single-slider-img-1">
                          <img class="animated slider-1-1" src="assets/imgs/slider/slider-1.png" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="single-hero-slider single-animation-wrap">
          <div class="container">
              <div class="row align-items-center slider-animated-1">
                  <div class="col-lg-5 col-md-6">
                      <div class="hero-slider-content-2">
                          <h4 class="animated">Hot promotions</h4>
                          <h2 class="animated fw-900">Fashion Trending</h2>
                          <h1 class="animated fw-900 text-7">Great Collection</h1>
                          <p class="animated">Save more with coupons & up to 20% off</p>
                          <a class="animated btn btn-brush btn-brush-2" href="product-details.html"> Discover Now </a>
                      </div>
                  </div>
                  <div class="col-lg-7 col-md-6">
                      <div class="single-slider-img single-slider-img-1">
                          <img class="animated slider-1-2" src="assets/imgs/slider/slider-2.png" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>                
  </div>
  <div class="slider-arrow hero-slider-1-arrow"></div>    
</section>

{{--Apartados varios--}}

<section class="featured section-padding position-relative">
  <div class="container">
      <div class="row">
          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
              <div class="banner-features wow fadeIn animated hover-up">
                  <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                  <h4 class="bg-1">Free Shipping</h4>
              </div>
          </div>
          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
              <div class="banner-features wow fadeIn animated hover-up">
                  <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                  <h4 class="bg-3">Online Order</h4>
              </div>
          </div>
          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
              <div class="banner-features wow fadeIn animated hover-up">
                  <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                  <h4 class="bg-2">Save Money</h4>
              </div>
          </div>
          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
              <div class="banner-features wow fadeIn animated hover-up">
                  <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                  <h4 class="bg-4">Promotions</h4>
              </div>
          </div>
          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
              <div class="banner-features wow fadeIn animated hover-up">
                  <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                  <h4 class="bg-5">Happy Sell</h4>
              </div>
          </div>
          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
              <div class="banner-features wow fadeIn animated hover-up">
                  <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                  <h4 class="bg-6">24/7 Support</h4>
              </div>
          </div>
      </div>
  </div>
</section>

{{--Products--}}

<section class="product-tabs section-padding position-relative wow fadeIn animated">
  <div class="bg-square"></div>
  <div class="container">
      <div class="tab-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
              </li>
          </ul>
          <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content wow fadeIn animated" id="myTabContent">
          <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
              <div class="row product-grid-4">

                  @foreach ($products as $product)
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="{{route('publicaciones.show',$product)}}">
                                      <img class="default-img" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" href="{{route('publicaciones.show',$product)}}"><i class="fi-rs-eye"></i></a>
                                  <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                      @csrf
                                      <input type="hidden" name="product_id" value="{{$product->id}}">
                                      <button type="submit" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                                  </form>

                                  {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a> --}}
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">Hot</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Clothing</a>
                              </div>
                              <h2><a href="{{route('publicaciones.show',$product)}}">{{$product->name}}</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>90%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>{{$product->price}} €</span>
                                  <span class="old-price">@if($product->original_price){{$product->original_price}} € @else {{$product->original_price = ""}}@endif </span>
                              </div>
                              <div class="product-action-1 show">
                                  <button class="action-btn hover-up" wire:click="add_to_cart({{$product->id}})" type="button" aria-label="Add To Cart">
                                      <i class="fi-rs-shopping-bag-add"></i>
                                  </button>
                                  {{-- <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a> --}}
                              </div>
                          </div>
                      </div>
                  </div>


                  {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="new">New</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Clothing</a>
                              </div>
                              <h2><a href="product-details.html">Plain Color Pocket Shirts</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>50%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$138.85 </span>
                                  <span class="old-price">$255.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-3-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="best">Best Sell</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Shirts</a>
                              </div>
                              <h2><a href="product-details.html">Vintage Floral Oil Shirts</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>95%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$338.85 </span>
                                  <span class="old-price">$445.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-4-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="sale">Sale</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Clothing</a>
                              </div>
                              <h2><a href="product-details.html">Colorful Hawaiian Shirts</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$123.85 </span>
                                  <span class="old-price">$235.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-xs-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-5-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-5-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">-30%</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Shirt</a>
                              </div>
                              <h2><a href="product-details.html">Flowers Sleeve Lapel Shirt</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$28.85 </span>
                                  <span class="old-price">$45.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-xs-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-6-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-6-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">-22%</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Shirts</a>
                              </div>
                              <h2><a href="product-details.html">Ethnic Floral Casual Shirts</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-xs-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-7-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="new">New</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Shoes</a>
                              </div>
                              <h2><a href="product-details.html">Stitching Hole Sandals</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>98%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$1275.85 </span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-8-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Shirt</a>
                              </div>
                              <h2><a href="product-details.html">Mens Porcelain Shirt</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div> --}}

                  @endforeach
              </div>

              <!--End product-grid-4-->
          </div>
          <!--En tab one (Featured)-->
          <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
              <div class="row product-grid-4">

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-9-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">Hot</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Donec </a>
                              </div>
                              <h2><a href="product-details.html">Lorem ipsum dolor</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>90%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-10-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="new">New</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Music</a>
                              </div>
                              <h2><a href="product-details.html">Sed tincidunt interdum</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>50%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$138.85 </span>
                                  <span class="old-price">$255.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-11-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-11-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="best">Best Sell</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Watch</a>
                              </div>
                              <h2><a href="product-details.html">Fusce metus orci</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>95%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$338.85 </span>
                                  <span class="old-price">$445.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-12-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-12-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="sale">Sale</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Music</a>
                              </div>
                              <h2><a href="product-details.html">Integer venenatis libero</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$123.85 </span>
                                  <span class="old-price">$235.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-13-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-13-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">-30%</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Speaker</a>
                              </div>
                              <h2><a href="product-details.html">Cras tempor orci id</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$28.85 </span>
                                  <span class="old-price">$45.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-14-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-14-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">-22%</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Camera</a>
                              </div>
                              <h2><a href="product-details.html">Nullam cursus mi qui</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-15-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="new">New</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Phone</a>
                              </div>
                              <h2><a href="product-details.html">Fusce fringilla ultrices</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>98%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$1275.85 </span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Accessories </a>
                              </div>
                              <h2><a href="product-details.html">Sed sollicitudin est</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!--End product-grid-4-->
          </div>
          <!--En tab two (Popular)-->
          <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
              <div class="row product-grid-4">

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="">
                                      <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">Hot</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Music</a>
                              </div>
                              <h2><a href="product-details.html">Donec ut nisl rutrum</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>90%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-3-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-3-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="new">New</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Music</a>
                              </div>
                              <h2><a href="product-details.html">Nullam dapibus pharetra</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>50%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$138.85 </span>
                                  <span class="old-price">$255.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-4-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-4-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="best">Best Sell</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Watch</a>
                              </div>
                              <h2><a href="product-details.html">Morbi dictum finibus</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>95%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$338.85 </span>
                                  <span class="old-price">$445.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-5-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-5-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="sale">Sale</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Music</a>
                              </div>
                              <h2><a href="product-details.html">Nunc volutpat massa</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$123.85 </span>
                                  <span class="old-price">$235.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-6-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-6-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">-30%</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Speaker</a>
                              </div>
                              <h2><a href="product-details.html">Nullam ultricies luctus</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$28.85 </span>
                                  <span class="old-price">$45.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-7-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-7-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">-22%</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Camera</a>
                              </div>
                              <h2><a href="product-details.html">Nullam mattis enim</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-8-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-8-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="new">New</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Phone</a>
                              </div>
                              <h2><a href="product-details.html">Vivamus sollicitudin</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>98%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$1275.85 </span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                      <div class="product-cart-wrap mb-30">
                          <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                  <a href="product-details.html">
                                      <img class="hover-img" src="assets/imgs/shop/product-9-1.jpg" alt="">
                                      <img class="default-img" src="assets/imgs/shop/product-9-2.jpg" alt="">
                                  </a>
                              </div>
                              <div class="product-action-1">
                                  <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                  <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="shop.html">Accessories </a>
                              </div>
                              <h2><a href="product-details.html"> Donec ut nisl rutrum</a></h2>
                              <div class="rating-result" title="90%">
                                  <span>
                                      <span>70%</span>
                                  </span>
                              </div>
                              <div class="product-price">
                                  <span>$238.85 </span>
                                  <span class="old-price">$245.8</span>
                              </div>
                              <div class="product-action-1 show">
                                  <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!--End product-grid-4-->
          </div>
          <!--En tab three (New added)-->
      </div>
      <!--End tab-content-->
  </div>
</section>


{{--Banner--}}
<section class="banner-2 section-padding pb-0">
  <div class="container">
      <div class="banner-img banner-big wow fadeIn animated f-none">
          <img src="assets/imgs/banner/banner-4.png" alt="">
          <div class="banner-text d-md-block d-none">
              <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
              <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
              <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
          </div>
      </div>
  </div>
</section>

{{--Popular categories--}}

<section class="popular-categories section-padding mt-15 mb-25">
  <div class="container wow fadeIn animated">
      <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
      <div class="carausel-6-columns-cover position-relative">
          <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
          <div class="carausel-6-columns" id="carausel-6-columns">
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-1.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">T-Shirt</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"> <img src="assets/imgs/shop/category-thumb-2.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Bags</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-3.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Sandan</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-4.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Scarf Cap</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-5.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Shoes</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-6.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Pillowcase</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-7.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Jumpsuits</a></h5>
              </div>
              <div class="card-1">
                  <figure class=" img-hover-scale overflow-hidden">
                      <a href="shop.html"><img src="assets/imgs/shop/category-thumb-8.jpg" alt=""></a>
                  </figure>
                  <h5><a href="shop.html">Hats</a></h5>
              </div>
          </div>
      </div>
  </div>
</section>




<section class="banners mb-15">
  <div class="container">
      <div class="row">
          <div class="col-lg-4 col-md-6">
              <div class="banner-img wow fadeIn animated">
                  <img src="assets/imgs/banner/banner-1.png" alt="">
                  <div class="banner-text">
                      <span>Smart Offer</span>
                      <h4>Save 20% on <br>Woman Bag</h4>
                      <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="banner-img wow fadeIn animated">
                  <img src="assets/imgs/banner/banner-2.png" alt="">
                  <div class="banner-text">
                      <span>Sale off</span>
                      <h4>Great Summer <br>Collection</h4>
                      <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 d-md-none d-lg-flex">
              <div class="banner-img wow fadeIn animated  mb-sm-0">
                  <img src="assets/imgs/banner/banner-3.png" alt="">
                  <div class="banner-text">
                      <span>New Arrivals</span>
                      <h4>Shop Today’s <br>Deals & Offers</h4>
                      <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

{{--New products--}}

<section class="section-padding">
  <div class="container wow fadeIn animated">
      <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
      <div class="carausel-6-columns-cover position-relative">
          <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
          <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                          <span class="hot">Hot</span>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Lorem ipsum dolor</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$238.85 </span>
                          <span class="old-price">$245.8</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-4-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                          <span class="new">New</span>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Aliquam posuere</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$173.85 </span>
                          <span class="old-price">$185.8</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-15-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                          <span class="sale">Sale</span>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Sed dapibus orci</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$215.85 </span>
                          <span class="old-price">$235.8</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-3-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                          <span class="hot">.33%</span>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Donec congue</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$83.8 </span>
                          <span class="old-price">$125.2</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-9-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                          <span class="hot">-25%</span>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Curabitur porta</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$1238.85 </span>
                          <span class="old-price">$1245.8</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-7-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                          <span class="new">New</span>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Praesent maximus</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$123 </span>
                          <span class="old-price">$156</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                          <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                          </a>
                      </div>
                      <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                              <i class="fi-rs-eye"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="product-details.html">Vestibulum ante</a></h2>
                      <div class="rating-result" title="90%">
                          <span>
                          </span>
                      </div>
                      <div class="product-price">
                          <span>$238.85 </span>
                          <span class="old-price">$245.8</span>
                      </div>
                  </div>
              </div>
              <!--End product-cart-wrap-2-->
          </div>
      </div>
  </div>
</section>

{{--Nuevas marcas--}}
<section class="section-padding">
  <div class="container">
      <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
      <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
          <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
          <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
              </div>
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
              </div>
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
              </div>
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
              </div>
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
              </div>
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
              </div>
              <div class="brand-logo">
                  <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
              </div>
          </div>
      </div>
  </div>
</section>

</main>








    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>562 Wellington Road
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+1 0000-000-000
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>contact@surfsidemedia.in
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>                            
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>                            
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">SurfsideMedia</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>    
    <!-- Vendor JS-->
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('assets/js/main.js?v=3.3')}}"></script>
<script src="{{asset('assets/js/shop.js?v=3.3')}}"></script>


{{--JAVASCRIPT--}}

@section('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (session('message') == "El producto se ha añadido correctemente.")
<script> 
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>
@endif

<script>
    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4;
        let next = el.nextElementSibling;
        for(var i =1; i<minPerSlide; i++){
            if(!next){
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
        
    });
</script>

{{--Wishlist--}}


@if (session('status') == "Producto añadido correctamente a su Wishlist")
<script> 
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>
@elseif(session('status') == "El producto no existe")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "Necesita hacer el login para continuar")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "El producto ya está en su Wishlist")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@endif

@if(session('status') == "El carrito está vacio")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@endif

@endsection


@livewireScripts
</body>
</html>