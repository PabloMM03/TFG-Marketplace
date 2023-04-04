@section('content')
<div>
     <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>

   <section class="py-5 bg-light">
    {{-- Se muestra la tienda con los productos y la informacion --}}
    <div class="container px-4 px-lg-5 mt-5">
    
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        
    @foreach ($products as $product)
        
    
    <div class="col mb-5">

        <div class="card h-100 mb-50">
            <img class="card-img-top" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder"><a style="text-decoration: none" href="{{route('publicaciones.show',$product)}}"> {{$product->name}}</a></h5>
                    {{-- <p class="card-text" style="text-align: center">{!!$product->description!!}</p> --}}

                     <!-- Product price-->
                    {{$product->price}} €

                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent mt-7">
                        <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$product->id}})" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
            <!-- Product actions-->
            
        </div>

    </div>

    @endforeach
</div>

    {{$products->links()}} 

</div>

</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TradeVibes 2023</p></div>
</footer>
</div>

