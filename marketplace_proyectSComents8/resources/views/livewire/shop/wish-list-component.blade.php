<main class="main">
  <div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Inicio</a>
            <span></span> Tienda
            <span></span> Wishlist
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
  
  
  @if($wishlist->count() > 0) 
  <div class="container">
    <div class="row product-grid-4">
      
{{--The product data is obtained and displayed--}}
<!--Foreach to display all product data from the wishlist -->
      @foreach ($wishlist->sortBy('id') as $key => $item)
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
          <div class="product-cart-wrap mb-30">
              <div class="product-img-action-wrap">
                  <div class="product-img product-img-zoom">
                      <a href="{{route('publicaciones.show',$item->products->id)}}">
                          <img class="default-img" src="@if($item->products->product_image) {{asset('storage/products/'. $item->products->product_image)}} @else {{asset('assets/imgs/shop/product-2-1.jpg')}}  @endif" alt="" style="width: 600px; height: 300px;">
                          <img class="hover-img" src="@if($item->products->product_image2) {{asset('storage/products/'. $item->products->product_image2)}} @else {{asset('assets/imgs/shop/product-1-2.jpg')}}  @endif" alt="" style="width: 600px; height: 300px;">
                        </a>
                  </div>
                  <div class="product-action-1">
                    <a aria-label="Quick view" class="action-btn hover-up" href="{{route('publicaciones.show',$item->products->id)}}"><i class="fi-rs-eye"></i></a>
                    {{--Add product to Wishlist--}}
                      <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                          @csrf
                          <input type="hidden" name="product_id" value="{{$item->products->id}}">
                          <button type="hidden" class="action-btn hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                      </form>
                      <a aria-label="Compare" class="action-btn hover-up" href="/"><i class="fi-rs-shuffle"></i></a>
                  </div>

                  {{--Check if the product is popular--}}
                  <div class="product-badges product-badges-position product-badges-mrg">
                    @if($item->products->trending == 2)
                    <span class="badge bg-warning " style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                    </span>    
                    @elseif($item->products->id == 'latest')
                    <span class="new">New</span>                                  
                    @endif
                  </div>
              </div>
              <div class="product-content-wrap">
                  <div class="product-category">
                      <a href="/">Clothing</a>
                  </div>
                  <h2><a href="{{route('publicaciones.show',$item)}}">{{$item->products->name}}</a></h2>

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
                <input type="hidden" value="{{$item->products->id}}" class="prod_id">
                <input type="hidden" name="quantity" class="form-control qty-input text-center" value="1">
                
                      {{--Check that the product is in stock--}}
                  @if($item->products->qty > 0)
                  <label class="badge bg-success">In stock</label>
                  @else
                  <label class="badge bg-danger">Out of stock</label>
                  @endif
                  <div class="product-price">
                      <span>{{$item->products->price}} €</span>
                      <span class="old-price">@if($item->products->original_price){{$item->products->original_price}} € @else {{$item->products->original_price = ""}}@endif </span>
                  </div>
                  <div class="product-action-1 show">
                    {{--Remove product to Wishlist--}}
                    <form action="{{url('delete-wishlist-item')}}" method="POST" style="display: inline;">
                      @csrf
                      <input type="hidden" name="product_id" value="{{$item->products->id}}">
                      <button type="hidden" class="action-btn hover-up remove-wishlist-item" aria-label="Remove To Wishlist"><i class="fi-rs-trash"></i></button>
                    </form>
                  </div>
              </div>
          </div>
      </div>

      @endforeach
  </div>
</div>
      @else
      <h4>No hay productos en su lista de deseados de momento.</h4>
      @endif

    </section>
  </main>
  
{{--Dynamic alert messages--}}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (session('status') == "Producto añadido correctamente")
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


@if (session('status') == "Producto eliminado correctamente")
<script> 
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>
@elseif (session('status') == "Necesita hacer el login para continuar")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@endif


