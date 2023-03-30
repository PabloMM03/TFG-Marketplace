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
                         <img  src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                      </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-muted" style="text-align: center">{{$item->name}}</h6>
                          <h6 class="text-black mb-0" style="text-align: center">{!!$item->description!!}</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>
    
                          <input id="form1" min="0" name="quantity" value="1" type="number"
                            class="form-control form-control-sm" />
    
                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button>
                          {{$item->quantity}} 
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h6 class="mb-0">€{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</h6>
                        </div>
                        
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <button type="button" class="fas fa-times text-muted" wire:click="delete_item({{$item->id}})">Eliminar</button>
                        </div>
                        @endforeach
                      </div>
    
                      <hr class="my-4">
    
                      {{-- <div class="pt-5">
                        <h6 class="mb-0"><a href="#!" class="text-body"><i
                              class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                      </div>
                    </div> --}}
                  </div>
                <div>
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