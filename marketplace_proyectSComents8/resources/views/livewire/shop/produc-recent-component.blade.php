@section('content')

<style>
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

<div>

   <section class="py-5 bg-light">

    @if ($recents->count())  
    
    
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
          <!--En tab one (Popular)-->
          <div class="row product-grid-4">

            @foreach ($recents as $product_new)
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
                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                          @if($product_new->trending == 2)
                          <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                          </span>    
                          @elseif($product_new->id == 'latest')
                          <span class="new">New</span>                                  
                          @endif
                            {{-- <span class="hot">Hot</span> --}}
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="shop.html">Clothing</a>
                        </div>
                        <h2><a href="{{route('publicaciones.show',$product_new)}}">{{$product_new->name}}</a></h2>
                        <div class="rating-result" title="90%">
                            <span>
                                <span>90%</span>
                            </span>
                            
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
                        <div class="product-action-1 show">
                          @if($product_new->qty >0)
                            <button class="action-btn hover-up" wire:click="add_to_cart({{$product_new->id}})" type="button" aria-label="Add To Cart">
                                <i class="fi-rs-shopping-bag-add"></i>
                            </button>
                            @else
                            <button class="action-btn hover-up disabled" type="button" aria-label="No actions">
                                <i class="fi-rs-shopping-bag-add"></i>
                            </button>   
                            @endif
                            {{-- <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
              </div>

          </div>

</section>


 {{-- </div>

    {{$recents->links()}} 

</div>  --}}

@else
    <div class="card-body">
        <strong>No hay ningun producto por el momento en esta sección.</strong>
    </div>
        
 @endif 

</section>


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