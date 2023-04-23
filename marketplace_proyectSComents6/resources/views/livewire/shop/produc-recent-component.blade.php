@section('content')

<div>
    {{--Browser--}}
    <div class="card-header mb-4 w-50 ml-16 d-flex">
        <input class="form-control mr-2" type="search" placeholder=" Introduzca el nombre del producto" wire:model="search"> 
        <button class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
</div>

   <section class="py-5 bg-light">

    @if ($recents->count())  
    
    

    {{-- Store with products and information is displayed --}}
    <div class="container px-4 px-lg-5 mt-5">
    
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        
    @foreach ($recents as $product_recent)
        
    
    <div class="col mb-5">

        <div class="card h-100 mb-50">
            <a style="text-decoration: none" href="{{route('publicaciones.show',$product_recent)}}">
                <img class="card-img-top h-70 w-70" src="@if($product_recent->product_image) {{asset('storage/products/'. $product_recent->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
            </a>
            
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{$product_recent->name}}</h5>
                    {{-- <p class="card-text" style="text-align: center">{!!$product->description!!}</p> --}}

                     <!-- Product price-->
                     <span class="text-decoration-line-through">@if($product_recent->original_price){{$product_recent->original_price}}@else {{$product_recent->original_price = 764.20}}@endif €</span>
                     <span>{{$product_recent->price}} €</span>

                     <div class="col-md-9 ml-6">
                        @if($product_recent->qty > 0)
                        <label class="badge bg-success">In stock</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                     </div>

                    <div class="button-head">
                        <div class="product-action mt-2 mb-2">
                            <a title="View" style="text-decoration: none" class="mr-1" href="{{route('publicaciones.show',$product_recent)}}"><i class="bi-eye"></i></a>
                            <a title="Wishlist" href="#"><i class=" bi-heart "></i></a>
                        </div>
                        <div class="product-action-2">
                            @if($product_recent->qty >0)
                            <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$product_recent->id}})" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                            @else
                            <button class="btn btn-outline-dark flex-shrink-0 disabled" wire:click="add_to_cart({{$product_recent->id}})" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>   
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product actions-->
            
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