@section('content')

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

.carousel-control-prev {
  margin-left: 50px;
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
  border-color: transparent white transparent transparent ;
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
  background: rgba(0,0,0,0.5);
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
}

.carousel-control-next:before {
  content: "";
  border-style: solid;
  border-width: 6px 0 6px 8px;
  border-color: transparent transparent transparent white;
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
<div>
    {{--Browser--}}

        <div class="card-header mb-4 w-50 ml-16 d-flex">
                <input class="form-control mr-2" type="search" placeholder=" Introduzca el nombre del producto" wire:model="search"> 
                <button class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
        </div>


            {{--We go through with a foreach the popular products to obtain their data and display them in the carousel of images--}}         

            {{--POPULAR PRODUCTS--}}
            <h3 style="color:black; text-align:center" class="mt-4"><b>Los más populares</b></h3>        
            <div class="text-center mr-5">
                <div class="row mx-auto my-auto justify-content-center card">
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php $count = 0;?>
                            @foreach ($featured_products as $item)
                            <?php $count = $count + 1;
                            if($count == 1){ ?>
                                <div class="carousel-item active">
                                    <div class="col-md-3 mr-4">                                       
                                            <div class="card-body">
                                                <a style="text-decoration: none" href="{{route('publicaciones.show',$item)}}">
                                                    <img src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" class="img-fluid ml-5 mt-4 card-img-top h-50 w-90" alt="Card image cap">
                                                </a>                                              
                                            <div>
                                                @if($item->trending == 2)
                                                <label class="badge bg-warning mt-2 mb-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending 
                                                <i class="bi bi-info-circle"></i> </label>   
                                                @else             
                                                <label for=""></label>                                       
                                                @endif
                                            </div>
                                            <div style="color:gray"class="fw-bolder">
                                                <h5>{{$item->name}}</h5>
                                            </div>
                                            <div class="fw-bolder">
                                                @if ($item->original_price)
                                                    <span style="color:red; font-size:20px" class="mr-2">{{$item->price}} €</span>
                                                    <span class="text-decoration-line-through">@if($item->original_price){{$item->original_price}} € @else {{$item->original_price = ""}}@endif </span>
                                                
                                                    @else
                                                    <span style="font-size:20px" class="mr-2">{{$item->price}} €</span>
                                                    <span class="text-decoration-line-through">@if($item->original_price){{$item->original_price}} € @else {{$item->original_price = ""}}@endif </span>
    
                                                    @endif                                                
                                            </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="carousel-item">
                                    <div class="col-md-3 mr-4">            
                                            <div class="card-body">
                                                <a style="text-decoration: none" href="{{route('publicaciones.show',$item)}}">
                                                    <img src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" class="img-fluid ml-5 mt-4 card-img-top h-50 w-90" alt="Card image cap">
                                                </a>
                                                
                                                <div>
                                                    @if($item->trending == 2)
                                                    <label class="badge bg-warning mt-2 mb-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending 
                                                    <i class="bi bi-info-circle"></i> </label> 
                                                    @else         
                                                    <label for=""></label>                                             
                                                    @endif
                                                </div>
                                                <div style="color:gray" class="fw-bolder">
                                                    <h5> {{$item->name}}</h5>
                                                </div>
                                                <div class="fw-bolder">
                                                    @if ($item->original_price)
                                                    <span style="color:red; font-size:20px" class="mr-2">{{$item->price}} €</span>
                                                    <span class="text-decoration-line-through">@if($item->original_price){{$item->original_price}} € @else {{$item->original_price = ""}}@endif </span>

                                                        @else
                                                        <span style="font-size:20px" class="mr-2">{{$item->price}} €</span>
                                                        <span class="text-decoration-line-through">@if($item->original_price){{$item->original_price}} € @else {{$item->original_price = ""}}@endif </span>
                                                    @endif
                                                    
                                                </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            <?php } ?>
                            
        
                            @endforeach
        
                        </div>
                        <a href="#recipeCarousel" role="button" data-bs-slide="prev" class="carousel-control-prev bg-transparent w-aut">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a href="#recipeCarousel" role="button" data-bs-slide="next" class="carousel-control-next bg-transparent w-aut">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>

            {{--NEW PRODUCTS--}}
            <h3 style="color:black; text-align:center" class="mt-4"><b>Nuevos Productos</b></h3>
            <div class="text-center mr-5">
                <div class="row mx-auto my-auto justify-content-center card">
                    <div id="recipeCarousel2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php $count = 0;?>
                            @foreach ($products_news as $product_new)
                            <?php $count = $count + 1;
                            if($count == 1){ ?>
                                <div class="carousel-item active">
                                    <div class="col-md-3 mr-4">                                       
                                            <div class="card-body">
                                                <a style="text-decoration: none" href="{{route('publicaciones.show',$product_new)}}">
                                                    <img src="@if($product_new->product_image) {{asset('storage/products/'. $product_new->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" class="img-fluid ml-5 mt-4 card-img-top h-50 w-90" alt="Card image cap">
                                                </a>                                              
                                            <div>
                                                @if($product_new->trending == 2)
                                                <label class="badge bg-warning mt-2 mb-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending 
                                                <i class="bi bi-info-circle"></i> </label>                                          
                                                @else    
                                                <label for=""></label>                                     
                                                @endif
                                            </div>
                                            <div style="color:gray"class="fw-bolder">
                                                <h5>{{$product_new->name}}</h5>
                                            </div>
                                            <div class="fw-bolder">
                                                @if ($product_new->original_price)
                                                    <span style="color:red; font-size:20px" class="mr-2">{{$product_new->price}} €</span>
                                                    <span class="text-decoration-line-through">@if($product_new->original_price){{$product_new->original_price}} € @else {{$product_new->original_price = ""}}@endif </span>
                                                
                                                    @else
                                                    <span style="font-size:20px" class="mr-2">{{$product_new->price}} €</span>
                                                    <span class="text-decoration-line-through">@if($product_new->original_price){{$product_new->original_price}} € @else {{$product_new->original_price = ""}}@endif </span>
    
                                                    @endif                                                
                                            </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="carousel-item">
                                    <div class="col-md-3 mr-4">            
                                            <div class="card-body">
                                                <a style="text-decoration: none" href="{{route('publicaciones.show',$product_new)}}">
                                                    <img src="@if($product_new->product_image) {{asset('storage/products/'. $product_new->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" class="img-fluid ml-5 mt-4 card-img-top h-70 w-90" alt="Card image cap">
                                                </a>
                                                
                                                <div>
                                                    @if($product_new->trending == 2)
                                                    <label class="badge bg-warning mt-2 mb-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending 
                                                    <i class="bi bi-info-circle"></i> 
                                                    </label>   
                                                    @else    
                                                    <label for=""></label>                                                                                                             
                                                    @endif
                                                </div>
                                                <div style="color:gray" class="fw-bolder">
                                                    <h5> {{$product_new->name}}</h5>
                                                </div>
                                                <div class="fw-bolder">
                                                    @if ($product_new->original_price)
                                                    <span style="color:red; font-size:20px" class="mr-2">{{$product_new->price}} €</span>
                                                    <span class="text-decoration-line-through">@if($product_new->original_price){{$product_new->original_price}} € @else {{$product_new->original_price = ""}}@endif </span>

                                                        @else
                                                        <span style="font-size:20px" class="mr-2">{{$product_new->price}} €</span>
                                                        <span class="text-decoration-line-through">@if($product_new->original_price){{$product_new->original_price}} € @else {{$product_new->original_price = ""}}@endif </span>
                                                    @endif
                                                    
                                                </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            <?php } ?>
                            
        
                            @endforeach
        
                        </div>
                        <a href="#recipeCarousel2" role="button" data-bs-slide="prev" class="carousel-control-prev bg-transparent w-aut">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a href="#recipeCarousel2" role="button" data-bs-slide="next" class="carousel-control-next bg-transparent w-aut">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>

  
   <section class="py-5 bg-light">

    @if ($products->count())  
    
    
    {{-- Store with products and information is displayed --}}
    {{--container?--}}
    <div class="px-4 px-lg-10 mt-5">
    
        <div class="row gx-4 gx-lg-10 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center">

        
            {{--PRODUCTS--}}
    @foreach ($products as $product)
        
    <div class="col mb-5">

        <div class="card">
            <a style="text-decoration: none" href="{{route('publicaciones.show',$product)}}">
                <img class="card-img-top h-70 w-90" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                {{--If the product is in the category of Most Popular a message is displayed indicating it --}}
                <div class="info">
                    @if($product->trending == 2)
                    <label class="badge bg-warning mt-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                    </label>                                                  
                    @endif
                </div>
            </a>
            
            <!-- Product details-->
            <div class="card-body">
                
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{$product->name}}</h5>
                     <!-- Product price-->
                     @if ($product->original_price)
                     <span style="color:red;" class="mr-2 fw-bolder">{{$product->price}} €</span>
                     <span class="text-decoration-line-through">@if($product->original_price){{$product->original_price}} € @else {{$product->original_price = ""}}@endif </span>

                         @else
                         <span class="mr-2 fw-bolder">{{$product->price}} €</span>
                         <span class="text-decoration-line-through">@if($product->original_price){{$product->original_price}} € @else {{$product->original_price = ""}}@endif </span>
                         @endif                     

                         {{--It is checked if the amount of remaining products is greater than 0, if so the product is in stock, 
                            however if it is equal to or less than 0 would show in the mesaje that is not in stock--}}
                    <div class="col-md-9 ml-10">
                        @if($product->qty > 0)
                        <label class="badge bg-success">In stock</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                    </div>
                        <!-- Product actions-->
                    <div class="button-head">
                        <div class="product-action mt-2 mb-2">
                            <a title="View" style="text-decoration: none" class="mr-1" href="{{route('publicaciones.show',$product)}}"><i class="bi-eye"></i></a>
                            <a title="Wishlist" href="#"><i class=" bi-heart "></i></a>
                        </div>
                        <div class="product-action-2">
                            @if($product->qty >0)
                            <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$product->id}})" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                            @else
                            <button class="btn btn-outline-dark flex-shrink-0 disabled" wire:click="add_to_cart({{$product->id}})" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>   
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>

    </div>

    @endforeach

</div>
    {{$products->links()}} 
</div>


@else
    <div class="card-body">
        <strong>No hay ningun producto con el nombre indicado.</strong>
    </div>   
 @endif 

</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TradeVibes 2023</p></div>
</footer>
</div>

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
@endsection