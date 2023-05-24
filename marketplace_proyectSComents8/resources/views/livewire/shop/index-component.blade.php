@section('style')
<style> 
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


  

</style>

@endsection

    

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
                          <a class="animated btn btn-brush btn-brush-3" href="{{url('shop')}}"> Shop Now </a>
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
  <div class="container product_data">
      <div class="tab-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Destacados</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Nuevos</button>
              </li>
          </ul>
          <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
      </div>

      <!--End nav-tabs-->
      <div class="tab-content wow fadeIn animated" id="myTabContent">
        
        <!--En tab two (Featured)-->
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
                                <a aria-label="Quick view" class="action-btn hover-up" href="{{route('publicaciones.show',$product)}}"><i class="fi-rs-eye"></i></a>
                                {{--Add product to Wishlist--}}
                                  <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                      @csrf
                                      <input type="hidden" name="product_id" value="{{$product->id}}">
                                      <button type="hidden" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                                  </form>
                                  <a aria-label="Compare" class="action-btn hover-up" href="/"><i class="fi-rs-shuffle"></i></a>
                              </div>
                              {{--Check if the product is popular--}}
                              <div class="product-badges product-badges-position product-badges-mrg">
                                @if($product->trending == 2)
                                <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                                </span>
                                @elseif($product->qty == 0)
                                <span class="sale">Sale</span>                                                       
                                @endif
                                <span class="hot">Hot</span>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="product-category">
                                  <a href="/">Clothing</a>
                              </div>
                              <h2><a href="{{route('publicaciones.show',$product)}}">{{$product->name}}</a></h2>
                              {{--We get the rating and show it--}}
                              <div class="product-item">
                          
                                @if ($product->ratings->count() > 0)
                                    @php
                                        $rating_value = $product->rating_value;
                                        $review_count = $product->review_count;
                                    @endphp
                        
                                    <div class="rating">
                                        @for($i = 1; $i<= $rating_value; $i++)
                                        <i class=" fa bi-star checked"></i>
                                        @endfor
                                        @for($j = $rating_value+1; $j <= 5; $j++)
                                        <i class=" fa bi-star"></i>
                                        @endfor
                                        ({{ $review_count }})

                                    </div>

                                @else
                                    <span class="font-small ml-5 text-muted">
                                        Sin valoraciones
                                    </span>
                                @endif
                            </div>
                            
                              {{--It is checked if the amount of remaining products is greater than 0, if so the product is in stock, 
                            however if it is equal to or less than 0 would show in the mesaje that is not in stock--}}
                             
                                  {{--Check that the product is in stock--}}
                              @if($product->qty > 0)
                              <label class="badge bg-success">In stock</label>
                              @else
                              <label class="badge bg-danger">Out of stock</label>
                              @endif
                              <div class="product-price">
                                  <span>{{$product->price}} €</span>
                                  <span class="old-price">@if($product->original_price){{$product->original_price}} € @else {{$product->original_price = ""}}@endif </span>
                              </div>
                             
                          </div>
                      </div>
                  </div>

                  @endforeach
              </div>

              <!--End product-grid-4-->
          </div>
          
          
          <!--En tab two (Popular)-->
          <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
              <div class="row product-grid-4">

                @foreach ($popular_products as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{route('publicaciones.show',$item)}}">
                                    <img class="default-img" src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn hover-up" href="{{route('publicaciones.show',$item)}}"><i class="fi-rs-eye"></i></a>
                                <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                    <button type="hidden" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                                </form>

                                {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a> --}}
                                <a aria-label="Compare" class="action-btn hover-up" href="/"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                              @if($item->trending == 2)
                              <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                              </span>    
                              @elseif($product->qty == 0)
                                <span class="sale">Sale</span>                                      
                              @endif
                                {{-- <span class="hot">Hot</span> --}}
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="/">Clothing</a>
                            </div>
                            <h2><a href="{{route('publicaciones.show',$item)}}">{{$item->name}}</a></h2>

                            {{--We get the rating and show it--}}
                            <div class="product-item">
                          
                                @if ($item->ratings->count() > 0)
                                    @php
                                        $rating_value = $item->rating_value;
                                        $review_count = $item->review_count;
                                    @endphp
                        
                                    <div class="rating">
                                        @for($i = 1; $i<= $rating_value; $i++)
                                        <i class=" fa bi-star checked"></i>
                                        @endfor
                                        @for($j = $rating_value+1; $j <= 5; $j++)
                                        <i class=" fa bi-star"></i>
                                        @endfor
                                        ({{ $review_count }})

                                    </div>

                                @else
                                    <span class="font-small ml-5 text-muted">
                                        Sin valoraciones
                                    </span>
                                @endif
                            </div>

                            {{--It is checked if the amount of remaining products is greater than 0, if so the product is in stock, 
                          however if it is equal to or less than 0 would show in the mesaje that is not in stock--}}
                             
                            @if($item->qty > 0)
                            <label class="badge bg-success">In stock</label>
                            @else
                            <label class="badge bg-danger">Out of stock</label>
                            @endif
                            <div class="product-price">
                                <span>{{$item->price}} €</span>
                                <span class="old-price">@if($item->original_price){{$item->original_price}} € @else {{$item->original_price = ""}}@endif </span>
                            </div>
                            
                        </div>
                    </div>
                </div>

                @endforeach
                  </div>
          </div>


              <!--En tab three (New added)-->
          <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
              <div class="row product-grid-4">

                @foreach ($products_news as $product_new)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{route('publicaciones.show',$product_new)}}">
                                    <img class="default-img" src="@if($product_new->product_image) {{asset('storage/products/'. $product_new->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn hover-up" href="{{route('publicaciones.show',$product_new)}}"><i class="fi-rs-eye"></i></a>
                                <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product_new->id}}">
                                    <button type="hidden" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                                </form>

                                {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a> --}}
                                <a aria-label="Compare" class="action-btn hover-up" href="/"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                              @if($product_new->trending == 2)
                              <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                              </span>  
                              @elseif($product->qty == 0)
                                <span class="sale">Sale</span>        
                              @endif
                                {{-- <span class="hot">Hot</span> --}}
                                <span class="new">New</span> 
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop.html">Clothing</a>
                            </div>
                            <h2><a href="{{route('publicaciones.show',$product_new)}}">{{$product_new->name}}</a></h2>

                            {{--We get the rating and show it--}}
                            <div class="product-item">
                          
                                @if ($product->ratings->count() > 0)
                                    @php
                                        $rating_value = $product->rating_value;
                                        $review_count = $product->review_count;
                                    @endphp
                        
                                    <div class="rating">
                                        @for($i = 1; $i<= $rating_value; $i++)
                                        <i class=" fa bi-star checked"></i>
                                        @endfor
                                        @for($j = $rating_value+1; $j <= 5; $j++)
                                        <i class=" fa bi-star"></i>
                                        @endfor
                                        ({{ $review_count }})

                                    </div>

                                @else
                                    <span class="font-small ml-5 text-muted">
                                        Sin valoraciones
                                    </span>
                                @endif
                            </div>

                            {{--It is checked if the amount of remaining products is greater than 0, if so the product is in stock, 
                          however if it is equal to or less than 0 would show in the mesaje that is not in stock--}}
               
                            @if($product_new->qty > 0)
                            <label class="badge bg-success">In stock</label>
                            @else
                            <label class="badge bg-danger">Out of stock</label>
                            @endif
                            <div class="product-price">
                                <span>{{$product_new->price}} €</span>
                                <span class="old-price">@if($product_new->original_price){{$product_new->original_price}} € @else {{$product_new->original_price = ""}}@endif </span>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                  </div>

              </div>
              <!--End product-grid-4-->
          </div>
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
      <h3 class="section-title mb-20"><span>Categorias</span> Populares</h3>
      <div class="carausel-6-columns-cover position-relative">
          <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
          <div class="carausel-6-columns" id="carausel-6-columns">
            @foreach ($categories as $category)
              <div class="card-1">
                  <figure class="img-hover-scale overflow-hidden">
                    <a href="{{route('products.category', $category)}}">
                        <img class="default-img" src="@if($category->category_image) {{asset('storage/category/'.$category->category_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="">
                    </a>
                  </figure>
                  <h5><a href="{{route('products.category', $category)}}">{{$category->name}}</a></h5>
              </div>
              @endforeach
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
                      <a href="{{url('shop')}}">Comprar ahora<i class="fi-rs-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="banner-img wow fadeIn animated">
                  <img src="assets/imgs/banner/banner-2.png" alt="">
                  <div class="banner-text">
                      <span>Sale off</span>
                      <h4>Great Summer <br>Collection</h4>
                      <a href="{{url('shop')}}">Comprar ahora <i class="fi-rs-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 d-md-none d-lg-flex">
              <div class="banner-img wow fadeIn animated  mb-sm-0">
                  <img src="assets/imgs/banner/banner-3.png" alt="">
                  <div class="banner-text">
                      <span>New Arrivals</span>
                      <h4>Shop Today’s <br>Deals & Offers</h4>
                      <a href="{{route('shop.recents')}}">Comprar ahora <i class="fi-rs-arrow-right"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

{{--New products--}}

<section class="section-padding">
  <div class="container wow fadeIn animated">
      <h3 class="section-title mb-20"><span>Nuevos</span> Productos</h3>
      <div class="carausel-6-columns-cover position-relative">
          <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
          <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
            @foreach ($products_news as $product_new)
              <div class="product-cart-wrap small hover-up">
                  <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                        <a href="{{route('publicaciones.show',$product_new)}}">
                            <img src="@if($product_new->product_image) {{asset('storage/products/'. $product_new->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif">
                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                        </a>   
                          {{-- <a href="product-details.html">
                              <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="">
                              <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                          </a> --}}
                      </div>
                      <div class="product-action-1">
                        <a aria-label="Quick view" class="action-btn small hover-up" href="{{route('publicaciones.show',$product_new)}}"><i class="fi-rs-eye"></i></a>

                          {{-- Add to wishlist --}}

                        <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button type="hidden" class="action-btn small hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                        </form>
                          <a aria-label="Compare" class="action-btn small hover-up" href="/" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                      </div>
                      <div class="product-badges product-badges-position product-badges-mrg">
                        @if($product_new->trending == 2)
                           <span class="badge bg-warning mt-2 mb-2 ml-20" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending 
                             <i class="bi bi-info-circle"></i> </span>                                          
                        @elseif($product->qty == 0)
                             <span class="sale">Sale</span>        
                        @endif
                          {{-- <span class="hot">Hot</span> --}}
                      </div>
                  </div>
                  <div class="product-content-wrap">
                      <h2><a href="{{route('publicaciones.show',$product_new)}}">{{$product_new->name}}</a></h2>
                      
                        {{--We get the rating and show it--}}
                            <div class="product-item">
                          
                                @if ($product_new->ratings->count() > 0)
                                    @php
                                        $rating_value = $product_new->rating_value;
                                        $review_count = $product_new->review_count;
                                    @endphp
                        
                                    <div class="rating">
                                        @for($i = 1; $i<= $rating_value; $i++)
                                        <i class=" fa bi-star checked"></i>
                                        @endfor
                                        @for($j = $rating_value+1; $j <= 5; $j++)
                                        <i class=" fa bi-star"></i>
                                        @endfor
                                        ({{ $review_count }})

                                    </div>

                                @else
                                    <span class="font-small ml-5 text-muted">
                                        Sin valoraciones
                                    </span>
                                @endif
                            </div>
                      
                       
                   
                      <div class="product-price">
                          <span>{{$product_new->price}} €</span>
                          <span class="old-price">{{$product_new->original_price}} €</span>
                      </div>
                  </div>
              </div>
                @endforeach
              <!--End product-cart-wrap-2-->
          </div>
      </div>
  </div>
</section>

{{--Nuevas marcas--}}
<section class="section-padding">
  <div class="container">
      <h3 class="section-title mb-20 wow fadeIn animated"><span>Marcas</span> Destacadas</h3>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>
</html>