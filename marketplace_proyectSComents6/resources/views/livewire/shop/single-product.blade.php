<div class="container" py-8>
    <style>
        /* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }
  .checked{
    color:#ffd900
  }

/* End of Star Rating */
    </style>

    @can('published', $product)
<!-- Product section-->

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">

            <div class="col-md-6"><img class="card-img-top" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} 
                @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap"></div>
            <div class="col-md-6">

                <div class="small mb-1">@if($product->brand){{$product->brand}} @else SKU: BST-498 @endif</div>
                <div class="small mb-1">@if($product->qty > 0){{$product->qty}} @else {{$product->qty = 0}} @endif Unidades</div>
                
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">@if($product->original_price){{$product->original_price}}@else 540.50 @endif €</span>
                    <span>@if($product->price){{$product->price}}@else 764.25 @endif €</span>
                </div>
                <div class="col-md-9">
                    @if($product->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                </div>
                {{--Ratings--}}
           @php $ratenum  = number_format($rating_value) @endphp
                <div class="rating">
                    @for($i = 1; $i<= $ratenum; $i++)
                    <i class=" fa bi-star checked"></i>
                    @endfor
                    @for($j = $ratenum+1; $j <= 5; $j++)
                    <i class=" fa bi-star"></i>
                    @endfor
                    <span>
                        @if($ratings->count() > 0)
                        {{$ratings->count()}} Valoraciones
                        @else
                        Sin valoraciones.
                        @endif
                    </span>
                </div>
                
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url('/add-rating')}}" method="POST"> 
            @csrf

            <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Valorar: {{ $product->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    @if($user_rating)
                        @for($i = 1; $i<= $user_rating->stars_rated; $i++)
                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                        <label for="rating{{$i}}" class="fa bi-star"></label>
                        @endfor
                        @for($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                        <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                        <label for="rating{{$j}}" class="fa bi-star"></label>
                        @endfor
                    
                    @else
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa bi-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa bi-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa bi-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa bi-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa bi-star"></label>
                    @endif
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark flex-shrink-0 " data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-outline-dark flex-shrink-0 formulario-calificar">Guardar cambios</button>
        </div>
    </form> 
      </div>
    </div>
  </div>
                <p class="lead">{!!$product->description!!}</p>
                <hr>
                

                <div class="d-flex">
                    <input type="number" id="v{{$product->id}}" wire:change="update_quantity({{ $product->id }}, $event.target.value)" style="max-width: 3rem" class="form-control text-center me-3 " value="1">
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
                    
                    <button type="button" class="btn btn-outline-dark flex-shrink-0 ml-60" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Valorar
                    </button>
                </div>
                <form action="{{url('add-to-wishlist')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-outline-dark flex-shrink-0 me-2 mt-4 addToWishlist">Add to Wishlist</button>
                </form>
                
                {{-- <div class="d-flex">
                    <button class="btn btn-outline-dark flex-shrink-0 mt-5"   type="button">
                        Add to Wishlist
                    </button>
                </div> --}}
                
                {{-- @if (session('status'))
                <h6 class="alert alert-warning mb-3 mt-3">{{session('status')}}</h6>
                @endif --}}
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
                <div class="card">{{--h-100 mb-50--}}
                    <!-- Product image-->
                    
                    <a style="text-decoration: none" class="flex" href="{{route('publicaciones.show', $relacionado)}}">
                        @if ($relacionado->product_image)
                        <img class="card-img-top mb-3  h-40 w-90" src="{{asset('storage/products/'. $relacionado->product_image)}}" alt="..." />
                        @else
                            <img class="card-img-top mb-3  h-40 w-90" src="{{asset('img/default_product.jpg')}}" alt="">
                        @endif
                        
                    </a>
                    
                    <!-- Product details-->
                    <div class="mb-5">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder" class="ml-2 text-gray-600">{{$relacionado->name}}</h5>
                            <!-- Product price-->
                            <span class="text-decoration-line-through">@if($relacionado->original_price){{$relacionado->original_price}}@else {{$relacionado->original_price = 764.20}}@endif €</span>
                            <span>{{$relacionado->price}} €</span>
                        </div>
                    </div>

                    <div class="product-action mb-2 ml-7">
                        <a title="View" style="text-decoration: none" class="mr-1 ml-20" href="{{route('publicaciones.show',$relacionado)}}"><i class="bi-eye"></i></a>
                        <a title="Wishlist" href="#"><i class=" bi-heart "></i></a>
                    </div>
                    
                    @php $ratenum  = number_format($rating_value) @endphp
                <div class="rating ml-20 mb-2">
                    @for($i = 1; $i<= $ratenum; $i++)
                    <i class=" fa bi-star checked"></i>
                    @endfor
                    @for($j = $ratenum+1; $j <= 5; $j++)
                    <i class=" fa bi-star"></i>
                    @endfor
                    <br>
                    <span>
                        @if($ratings->count() > 0)
                        {{$ratings->count()}} Valoraciones
                        @else
                        Sin valoraciones.
                        @endif
                    </span>
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
        {{-- @if (session('message'))
        <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
         @endif --}}
        <div class="card card-body">
            <h6 class="card-title">Leave Comment</h6>
            <form action="{{url('comments')}}" method="POST">
                @csrf
                <input type="hidden" name="product_slug" value="{{$product->slug}}">
                <textarea name="comment_body" class="form-control" rows="3"></textarea>
                <button type="submit" class="btn btn-outline-dark flex-shrink-0 me-2 mt-4">Comentar</button>
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



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (session('status') == "Producto valorado, Gracias por su valoración.")
<script> 
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>
@elseif(session('status') == "No puedes valorar este producto sin haberlo comprado.")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "El enlace que ha seguido no esta operativo.")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "Debes hacer el login primero.")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@endif

{{--Comments message--}}

@if (session('message') == "Comentario creado correctamente.")
<script> 
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Comentario creado correctamente.',
  showConfirmButton: false,
  timer: 2000
})
</script>
@elseif(session('message') == "El area del comentario es obligatoria.")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'El area del comentario es mandatoria.',
})
</script>
@elseif(session('message') == "No puedes opinar sobre este producto sin haberlo comprado.")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No puedes opinar sobre este producto sin haberlo comprado.',
})
</script>
@elseif(session('message') == "Debes hacer el login primero.")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Debes hacer el login primero.',
})
</script>
@endif

{{-- <script>
    $('.addToWishlist').click(function(e){
        e.preventDefault();

        let product_id = $(this).closet('product_data').find('product_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function(response){
                swal(response.status);
            }
        })


    });
</script>  --}}

{{--Wishlist--}}


@if (session('status') == "Producto añadido correctamente a su Wishlist")
<script> 
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>
@elseif(session('status') == "El producto no existe")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "Necesita hacer el login para continuar")
<script> 
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '{{session('status')}}',
})
</script>
@endif