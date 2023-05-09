@props(['product'])

<style>

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
</style>


<div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
    <div class="row product-grid-4">
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
                        <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button type="hidden" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                        </form>

                        {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a> --}}
                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                      @if($product->trending == 2)
                      <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                      </span>                                 
                      @endif
                        {{-- <span class="hot">Hot</span> --}}
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
                    <div class="product-action-1 show">
                      @if($product->qty >0)
                        <button class="action-btn hover-up" wire:click="add_to_cart({{$product->id}})" type="button" aria-label="Add To Cart">
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

    <!--End product-grid-4-->
</div>