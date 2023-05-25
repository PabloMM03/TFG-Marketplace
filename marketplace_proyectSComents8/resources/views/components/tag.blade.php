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


      <div >
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


  <!--End product-grid-4-->
