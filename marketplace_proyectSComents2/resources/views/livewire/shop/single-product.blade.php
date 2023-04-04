<div class="container" py-8>
    @can('published', $product)
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} 
                @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap"></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$45.00</span>
                    <span>{{$product->price}} €</span>
                </div>
                <p class="lead">{!!$product->description!!}</p>
                <div class="d-flex">
                    
                    <input type="number" id="v{{$product->id}}" wire:change="update_quantity({{ $product->id }}, $event.target.value)" style="max-width: 3rem" class="form-control text-center me-3 " value="1">
                    {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> --}}
                    <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$product->id}})" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->

<section class="py-5 bg-light">
    
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Productos relacionados: {{$product->category->name}}</h2>
        
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            @foreach ($relacionados as $relacionado)
            <div class="col mb-5">
                <div class="card h-100 mb-50">
                    <!-- Product image-->
                    
                    <a style="text-decoration: none" class="flex" href="{{route('publicaciones.show', $relacionado)}}">
                        @if ($relacionado->product_image)
                        <img class="card-img-top" src="{{asset('storage/products/'. $relacionado->product_image)}}" alt="..." />
                        @else
                            <img class="card-img-top" src="{{asset('img/default_product.jpg')}}" alt="">
                        @endif
                        
                    </a>
                    
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder" class="ml-2 text-gray-600">{{$relacionado->name}}</h5>
                            <!-- Product price-->
                            {{$relacionado->price}} €
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('publicaciones.show', $relacionado)}}">View</a></div>
                    </div>
                    
                </div>
            </div>         
            @endforeach
</section>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
{{--Comment system to the published product--}}
<div>   
    <div class="comment-area mt-4">
        @if (session('message'))
        <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
         @endif
        <div class="card card-body">
            <h6 class="card-title">Leave Comment</h6>
            <form action="{{url('comments')}}" method="POST">
                @csrf
                <input type="hidden" name="product_slug" value="{{$product->slug}}">
                <textarea name="comment_body" class="form-control" rows="3"></textarea>
                <button type="submit" class="btn btn-primary mt-3 me-2">Comentar</button>
            </form>
        </div>
    </div>


    @forelse ($product->comments as $comment)
        
   <div class="card card-body shadow-sm mt-4">
        <div class="detail-area">
            <h6 class="user-name mb-1">
                @if ($comment->user)
                    {{$comment->user->name}}
                @endif
                <small class="ms-3 text-primary">Publicado el: {{$comment->created_at->format('d-m-Y')}}</small>
            </h6>
            <p class="user-comment mb-1">
                {!! $comment->comment_body !!}
            </p>
        </div>
   </div>
   <br>
   
   @empty
   <div class="card card-body shadow-sm mt-3">
   <h6>Sin comentarios hasta el momento.</h6>
 </div>
   @endforelse
   
</div>
</div>
@endcan
</div>
<br>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TradeVibes 2023</p></div>
</footer>

