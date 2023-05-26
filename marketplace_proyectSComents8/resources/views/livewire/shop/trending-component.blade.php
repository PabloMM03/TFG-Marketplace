<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Inicio</a>
                <span></span> Productos Nuevos
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> Hemos encontrado <strong class="text-brand">{{$products->total()}}</strong> productos para ti!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Mostrar:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                {{--Filtering by quantity of products--}}
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="{{$pageSize == 12 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                                        <li><a class="{{$pageSize == 15 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                        <li><a class="{{$pageSize == 25 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                                        <li><a class="{{$pageSize == 32 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(32)">32</a></li>
                                        <li><a class="{{$pageSize == 150 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(150)">Todos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Ordenar:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{$orderBy}} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
  
                                {{--Order by price of products--}}
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="{{$orderBy == 'Por defecto' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Por defecto')">Por defecto</a></li>
                                        <li><a class="{{$orderBy == 'Price: Low to High' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">Precio: Menor a Mayor</a></li>
                                        <li><a class="{{$orderBy == 'Price: High to Low' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">Precio: Mayor a Menor</a></li>
                                        <li><a class="{{$orderBy == 'Por más nuevos' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Por más nuevos')">Por más nuevos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">

                        <!--Foreach to display all products data -->
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('publicaciones.show',$product)}}">
                                            <img class="default-img" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} @else {{asset('assets/imgs/shop/product-2-1.jpg')}}  @endif" alt="">
                                            <img class="hover-img" src="@if($product->product_image2) {{asset('storage/products/'. $product->product_image2)}} @else {{asset('assets/imgs/shop/product-1-2.jpg')}}  @endif" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                      <a aria-label="Quick view" class="action-btn hover-up" href="{{route('publicaciones.show',$product)}}"><i class="fi-rs-eye"></i></a>
                                        <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="hidden" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                                        </form>
      
                                        {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a> --}}
                                        <a aria-label="Compare" class="action-btn hover-up" href="/"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                      @if($product->trending == 2)
                                      <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                                      </span>    
                                      @endif
                                      @if($product->qty == 0)   
                                      <span class="sale">Sale</span>   
                                      @endif
                                      <span class="new">New</span> 
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
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{$products->links()}}
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Categorias</h5>
                        @foreach ($categories as $category)
                        <ul class="categories">       
                            <li><a href="{{route('products.category', $category)}}">{{$category->name}}</a></li>
                            
                        </ul>
                        @endforeach
   
                    </div>

                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Filtrar por precio</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="price-filter">
                            <div class="price-filter-inner" >
                                <div id="slider-range" wire:ignore></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>Rango:</span> <span >{{$min_value}}€</span> - <span >{{$max_value}}</span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Color</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                    <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                                </div>
                                <label class="fw-900 mt-15">Item Condition</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                    </div>
                    
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Nuevos productos</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($products_news as $product_new)
                        <div class="single-post clearfix">
                            <div class="image">
                            <a href="{{route('publicaciones.show',$product_new)}}">
                                <img class="default-img" src="@if($product_new->product_image) {{asset('storage/products/'. $product_new->product_image)}} @else {{asset('assets/imgs/shop/product-1-2.jpg')}}  @endif" alt="">
                            </a>
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{route('publicaciones.show',$product_new)}}">{{$product_new->name}}</a></h5>
                                <p class="price mb-0 mt-5">{{$product_new->price}} €</p>

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
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="assets/imgs/banner/banner-11.jpg" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </section>
  </main>
  
  {{--Script that will allow us to filter by price through a dynamic slider --}}
  
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    /*---------------------
        Price Range
    ----------------------*/
    
    let sliderrange = $('#slider-range');
    let amountprice = $('#amount');
    
    $(function(){
        sliderrange.slider({
            range:true,
            min: 0,
            max: 20000,
            values: [0, 20000],
            slide: function(event, ui){
                @this.set('min_value',ui.values[0]);
                @this.set('max_value',ui.values[1]);
            }
        });
    });
    
    </script>
  
  
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

  