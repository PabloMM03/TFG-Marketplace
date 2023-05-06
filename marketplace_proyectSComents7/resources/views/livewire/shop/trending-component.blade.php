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

    @if ($products->count())  
    
    

    {{-- Store with products and information is displayed --}}
    <div class="container px-4 px-lg-5 mt-5">
    
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        
    @foreach ($products as $product)
        
    
    <div class="card col-md-2 m-5">
        <a style="text-decoration: none" href="{{route('publicaciones.show',$product)}}">
            <img class="mt-4  d-block mx-auto" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
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
                <h5 style="color:gray" class="fw-bolder">{{$product->name}}</h5>
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
                <div class="col-md-9 ml-7 mt-2">
                    @if($product->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                </div>
                    <!-- Product actions-->
                <div class="button-head">
                    <div class="product-action mt-2 mb-16">
                        <span>
                            <a title="View" style="text-decoration: none; color:#000" class="mr-1" href="{{route('publicaciones.show',$product)}}"><i class="bi-eye"></i></a>
                            <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit" style="background: none; border: none;"><i class="bi-heart"></i></button>
                            </form>
                        </span>
                        
                    </div>
                    <div class="product-action-2">
                        @if($product->qty >0)
                        <button class="btn btn-outline-dark flex-shrink-0 mb-4" style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);" wire:click="add_to_cart({{$product->id}})" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                        @else
                        <button class="btn btn-outline-dark flex-shrink-0 disabled mb-4" style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);" wire:click="add_to_cart({{$product->id}})" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>   
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>

    @endforeach
{{-- </div>

    {{$products->links()}} 

</div> --}}

@else
    <div class="card-body">
        <strong>No hay ningun producto por el momento en esta sección.</strong>
    </div>
        
 @endif 

</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TradeVibes 2023</p></div>
</footer>
</div>

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