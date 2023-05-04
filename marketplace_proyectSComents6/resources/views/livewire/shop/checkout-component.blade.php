    {{-- The Master doesn't talk, he acts. --}}


    <div class="container py-5">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-primary">
                      <h4 class="text-white mt-2">Checkout
                          <a href="{{url('/cart')}}" class="btn btn-warning text-white float-end">Back</a>
                      </h4>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6 order-details">
                              <h4>Detalles basicos</h4>
                              <hr>                    
                              {{--Nombre--}}         
                                <label for="">Nombre completo</label>
                                <input type="text" class="form-control  @error('fullname') is-invalid @enderror" name="fullname" value="{{Auth::user()->fullname}}" wire:model="fullname">
                      
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  

                                {{--Region--}}
                                <label for="">Region</label>
                                <input type="text" class="form-control  @error('state') is-invalid @enderror" name="state" value="{{Auth::user()->state}}" wire:model="state">
                        
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror    

                                {{--Ciudad--}}
                                <label for="">Ciudad</label>
                                <input type="text" class="form-control  @error('city') is-invalid @enderror" name="city" value="{{Auth::user()->city}}" wire:model="city">
                      
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror      
                          
                                {{--Address--}}
                                <label for="">Direccion</label>
                                <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" wire:model="address">
                      
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                {{--ZIP code--}}
                                <label for="">Código postal</label>
                                <input type="text" class="form-control  @error('zipcode') is-invalid @enderror" name="zipcode" value="{{Auth::user()->zipcode}}" wire:model="zipcode">
                      
                                @error('zipcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                {{--Phone--}}
                                <label for="">Telefono</label>
                                <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" wire:model="phone">
                      
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <input class="form-check-input" type="radio" wire:model="payment_method" name="exampleRadios" id="exampleRadios1" value="cash_on_delivery" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Efectivo
                                </label>

                                <input class="form-check-input" type="radio" wire:model="payment_method" name="exampleRadios" id="exampleRadios2" value="paypal">
                                <label class="form-check-label" for="exampleRadios2">
                                    Paypal
                                </label>

                                <div class="container">
                                  <button type="button" wire:click="make_order()"  class="btn btn-primary">Hacer pedido</button>                       
                                </div>          
                          </div>
                          
                          <div class="col-md-6">
                              <h4>Detalles del pedido</h4>
                              <hr>
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Cantidad</th>
                                          <th>Price</th>
                                          <th>Imagen</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        {{-- @foreach ($orders->orderitems as $item)                                      
                                      <tr>
                                          <td>{{$item->products->name}}</td>
                                          <td>{{$item->quantity}}</td>
                                          <td>{{$item->products->price}} €</td>
                                          <td>
                                              <img src="{{asset('storage/products/'. $item->products->product_image)}}" width="70px" alt="Product image">
                                              
                                          </td>
                                      </tr>
                                      @endforeach   --}}
                                  </tbody>
                              </table>
  
                              {{-- <h4 class="px-2">Percio Total : <span class="float-end">{{$orders->total}} €</span></h4> --}}
                          </div>
                      </div>
                  </div>
              </div>
  
          </div>
      </div>
  </div>


<style>
  .order-details label{
      font-size: 12px;
      font-weight: 700;
  }

  .order-details div{
      font-size: 14px;
      padding: 6px
  }
</style>
