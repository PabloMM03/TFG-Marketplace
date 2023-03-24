
@section('sidebar')

@livewire('nav-panel-left')

@endsection


   <div class="container" py-8>
    @can('published', $product)
       <h1 class="text 4xl font-bold ">{{$product->name}}</h1>

       <div class="text-lg text-gray-500 mb-2">
           {!!$product->description!!}
       </div>

       <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
           {{-- Contenido Principal --}}
           
           <div class="lg:col-span-2">
               <figure> 
                   <img class="card-img-top" src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} 
                   @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
               </figure>
               <div class="text-2xl text-gray-500 mt-4">
                   {{$product->price}} €
               </div>
               <div class="card-body mt-2">
                   <button type="button" class="btn btn-primary" wire:click="add_to_cart({{$product->id}})">Añadir al carrito</button>
               </div>
           </div>
           {{-- Contenido relacionado --}}

           <aside>

               <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$product->category->name}}</h1>
               <ul>
                   @foreach ($relacionados as $relacionado)
                       <li class="mb-4">
                           <a style="text-decoration: none" class="flex" href="{{route('publicaciones.show', $relacionado)}}">
                               @if ($relacionado->product_image)
                               <img class="w-40 h-25 object-cover object-center" src="{{asset('storage/products/'. $relacionado->product_image)}}" alt="">
                               @else
                                   <img class="w-40 h-25 object-cover object-center" src="{{asset('img/default_product.jpg')}}" alt="">
                               @endif
                               <span class="ml-2 text-gray-600">{{$relacionado->name}}</span>
                           </a>
                       </li>
                   @endforeach
               </ul>
           </aside>
    <div>
            <div class="comment-area mt-4">
                <div class="card card-body">
                    <h6 class="card-title">Leave Comment</h6>
                    <form action="" method="POST">
                        <textarea name="comment-body" class="form-control" rows="3"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
            
           <div class="card card-body shadow-sm mt-4">
                <div class="detail-area">
                    <h6 class="user-name mb-1">
                        User One
                        <small class="ms-3 text-primary">Commented on: </small>
                    </h6>
                    <p class="user-comment mb-1">
                        dataassssssssssssssssssssssssssss
                    </p>
                </div>
                <div>
                    <a href="" class="btn btn-primary btn-sm me2">Edit</a>
                    <a href="" class="btn btn-danger btn-sm me2">Delete</a>
                </div>
            
           </div>

       </div>
       
    </div>
       @endcan

   </div>


