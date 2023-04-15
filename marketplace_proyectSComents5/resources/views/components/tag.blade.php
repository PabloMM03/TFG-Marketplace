@props(['product'])


<div class="col mb-5">

    <div class="card">
        <a style="text-decoration: none" href="{{route('publicaciones.show',$product)}}">
            <img class="card-img-top h-70 w-70" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
        </a>
        
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{$product->name}}</h5>
                {{-- <p class="card-text" style="text-align: center">{!!$product->description!!}</p> --}}

                 <!-- Product price-->
                 <span class="text-decoration-line-through">@if($product->original_price){{$product->original_price}}@else {{$product->original_price = 764.20}}@endif €</span>
                 <span>{{$product->price}} €</span>

                 <div class="col-md-9 ml-6">
                    @if($product->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                 </div>

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
                    <div class="mt-3">
                        @foreach ($product->tags as $tags)
                        <a style="text-decoration:none" href="{{route('products.tag', $tags)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tags->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        
    </div>
</div>

 

</div>