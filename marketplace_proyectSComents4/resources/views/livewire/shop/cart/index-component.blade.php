<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col-lg-8">
                    <div class="p-5">
                      <div class="d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                        <h6 class="mb-0 text-muted">{{Cart::session(auth()->id())->getTotalQuantity()}} items</h6>
                      </div>
                      <hr class="my-4">
    
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
    
                          @foreach ($cart_items->sortBy('id') as $key => $item)
                      <div class="col-md-2 col-lg-2 col-xl-2 mb-3">
                        <img class="card-img-top" src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                      </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-muted" style="text-align: center">{{$item->name}}</h6>
                          <h6 class="text-black mb-0" style="text-align: center">{!!$item->description!!}</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex"> 
                          {{-- <input type="number" id="v{{$item->id}}" wire:change="update_quantity($('#v' + {{$item->id}}).val())" class="form-control form-control-sm" value="{{$item->quantity}}"> --}}

                         <input type="number" id="v{{$item->id}}" wire:change="update_quantity({{ $item->id }}, $event.target.value)" class="form-control form-control-sm" value="{{$item->quantity}}">
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h6 class="mb-0">€{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</h6>
                        </div>
                        
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <button type="button" class="fas fa-times text-muted" wire:click="delete_item({{$item->id}})"><i class="bi bi-trash"></i></button>
                        </div>
                        @endforeach
                      </div>
    
                      <hr class="my-4">
    
                       <div class="pt-5">
                        <h6 class="mb-0"><a style="text-decoration: none" href="/" class="text-body"><i
                              class="bi-cart-fill me-1"></i>Back to shop</a></h6>
                      </div>
                      <div class="pt-5">
                        <button type="button" wire:click="vaciar_carrito()" class="fas fa-times text-muted"><i class="bi bi-trash"></i>Vaciar carrito</button>
                      </div>
                    </div> 
                  </div>
                <div>
                  <h3 class="mb-0 ml-9 mb-10 ">€{{Cart::session(auth()->id())->getTotal()}}</h3><br>
                    <a  href="{{route('checkout')}}"  class="btn btn-dark btn-block btn-lg ml-9 mb-10"
                    data-mdb-ripple-color="dark">Pagar</a>
                </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

