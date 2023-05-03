<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col-lg-8">
                    <div class="p-5">

                      <div class="d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-bold mb-0 text-black">Wishlist</h1>
                      </div>
                      <hr class="my-4">

                        {{--Foreach that goes through all the data of a product and then shows them little by little--}}
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
    
                          @foreach ($wishlist->sortBy('id') as $key => $item)
                      <div class="col-md-2 my-auto">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        <a style="text-decoration: none" href="{{route('publicaciones.show',$item->products)}}">
                        <img class="card-img-top" src="@if($item->products->product_image) {{asset('storage/products/'. $item->products->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                        </a> 
                           {{--Shows the products that are popular--}}
                        <div class="info">
                            @if($item->products->trending == 2)
                            <label class="badge bg-warning mt-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                            </label>                                                  
                            @endif
                        </div>                
                     </div>
                        <div class="col-md-2 my-auto">
                          <h6 class="text-muted" style="text-align: center">{{$item->products->name}}</h6>
                        </div>
                        {{--Shows if products are in stock--}}
                        <div class="col-md-2 my-auto " style="text-align: center">
                            @if($item->products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                            @else
                            <label class="badge bg-danger">Out of stock</label>
                            @endif
                        </div>
                        <div class="col-md-3 my-auto">
                            @if($item->products->qty >0)
                    <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$item->products->id}})" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                    @else
                    <button class="btn btn-outline-dark flex-shrink-0 disabled" wire:click="add_to_cart({{$item->products->id}})" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>   
                    @endif
                        </div>
                        <div class="col-md-2 my-auto">
                          
                            <button type="submit" class="fas fa-times text-muted remove-wishlist-item" wire:click="deleteItem({{$item->products->id}})"><i class="bi bi-trash"></i></button>
                        
                            {{-- <button type="button" class="fas fa-times text-muted" wire:click="deleteItem({{$item->products->id}})"><i class="bi bi-trash"></i></button> --}}
                        </div>
                        <div class="mb-4 mr-4"></div>
                        @endforeach
                      </div>
    
                      <hr class="my-4">
    
                       <div class="pt-5">
                        <h6 class="mb-0"><a style="text-decoration: none" href="/" class="text-body"><i
                              class="bi-cart-fill me-1"></i>Back to shop</a></h6>
                      </div>
                      <div class="pt-5">
                        <button type="button" wire:click="vaciar_carrito()" class="fas fa-times text-muted"><i class="bi bi-trash"></i>Vaciar</button>
                      </div>
                    </div> 
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

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

<script>
  $.('.remove-wishlist-item').click(function(e){
    e.preventDefault();

    let prod_id = $(this).closest('.product_data').find('.prod_id').val();

    $.ajax({
      method: "POST",
      url: "delete-wishlist-item",
      data: {
        'prod_id': prod_id,

      },
      success:function(response){
        window.location.reload();
        swal("",response.status, "success");
      }
    });
  });
</script>


</section>

