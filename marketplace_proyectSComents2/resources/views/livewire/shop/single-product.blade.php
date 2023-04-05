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

                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$45.00</span>
                    <span>{{$product->price}} €</span>
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
                        {{$ratings->count()}} Calificaciones
                        @else
                        Sin calificaciones.
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
          <h5 class="modal-title" id="exampleModalLabel">Calificar: {{ $product->name }}</h5>
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
                    {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> --}}
                    <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$product->id}})" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                    <button type="button" class="btn btn-outline-dark flex-shrink-0 ml-60" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Calificar
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('caliOk') == 'Producto calificado, Gracias por su calificación')
<script>
     Swal.fire(
       'Calificado!',
       'El producto ha sido calificado.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-calificar').submit(function(e){
            e.preventDefault();

            Swal.fire({
  title: 'Estás seguro?',
  text: "Este producto se calificará!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, calificar!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
})
        });
    </script>

    
@endsection