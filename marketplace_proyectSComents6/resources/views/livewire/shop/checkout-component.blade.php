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
                              <div class="row">
                                  
                                <label for="">Nombre completo</label>
                                <input type="text" class="form-control fullname @error('fullname') is-invalid @enderror" name="fullname" value="{{Auth::user()->fullname}}" wire:model="fullname">
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                                <b id="fname_error" class="text-danger" style="font-size:12px"></b>  
                            
                                {{--Region--}}
                                    
                                <label for="">Region</label>
                                <input type="text" class="form-control state @error('state') is-invalid @enderror" name="state" value="{{Auth::user()->state}}" wire:model="state">
                        
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror    
                                <b id="state_error" class="text-danger" style="font-size:12px"></b>  

                                {{--Ciudad--}}
                                
                                <label for="">Ciudad</label>
                                <input type="text" class="form-control city @error('city') is-invalid @enderror" name="city" value="{{Auth::user()->city}}" wire:model="city">
                      
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror      
                                <b id="city_error" class="text-danger" style="font-size:12px"></b> 

                                {{--Address--}}
                                
                                <label for="">Direccion</label>
                                <input type="text" class="form-control address @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" wire:model="address">
                      
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="address_error" class="text-danger" style="font-size:12px"></b> 

                                {{--ZIP code--}}
                                 
                                <label for="">Código postal</label>
                                <input type="text" class="form-control zipcode @error('zipcode') is-invalid @enderror" name="zipcode" value="{{Auth::user()->zipcode}}" wire:model="zipcode">
                      
                                @error('zipcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="zipcode_error" class="text-danger" style="font-size:12px"></b>

                                {{--Phone--}}
                                
                                <label for="">Telefono</label>
                                <input type="text" class="form-control phone @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" wire:model="phone">
                      
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="phone_error" class="text-danger" style="font-size:12px"></b> 
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
                              <input class="form-check-input" type="radio" wire:model="payment_method" name="exampleRadios" id="exampleRadios1" value="cash_on_delivery" checked>
                              <label class="form-check-label" for="exampleRadios1">
                                  Efectivo
                              </label>

                              <input class="form-check-input" type="radio" wire:model="payment_method" name="exampleRadios" id="exampleRadios2" value="paypal">
                              <label class="form-check-label" for="exampleRadios2">
                                  Paypal
                              </label>

                              <div class="container mt-2">
                                <button type="button" wire:click="make_order()"  class="btn btn-success w-50 mb-2">Hacer pedido</button>   
                                {{-- <button type="button" class="btn btn-primary w-50 razorpay_btn">Pay with Razorpay</button>                     --}}
                                <button type="button" class="btn btn-primary w-50 razorpay_btn">Pay with Razorpay</button>

                              </div>
                              
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
      e.preventDefault();

      let fullname  = $('.fullname').val();
      let state = $('.state').val();
      let city = $('.city').val();
      let address = $('.address').val();
      let zipcode = $('.zipcode').val();
      let phone = $('.phone').val();


        if(!fullname){
            fname_error = "El campo Nombre completo es obligatorio";
            $('#fname_error').html('')
            $('#fname_error').html(fname_error);
        }else{
            fname_error = "";
            $('#fname_error').html('')
        }
        if(!state){
            state_error = "El campo Región es obligatorio";
            $('#state_error').html('')
            $('#state_error').html(state_error);
        }else{
            state = "";
            $('#state_error').html('')
        }
        if(!city){
            city_error = "El campo Ciudad es obligatorio";
            $('#city_error').html('')
            $('#city_error').html(city_error);
        }else{
            city = "";
            $('#city_error').html('')
        }
        if(!address){
            address_error = "El campo Dirección es obligatorio";
            $('#address_error').html('')
            $('#address_error').html(address_error);
        }else{
            address = "";
            $('#address_error').html('')
        }
        if(!zipcode){
            zipcode_error = "El campo ZIP es obligatorio";
            $('#zipcode_error').html('')
            $('#zipcode_error').html(zipcode_error);
        }else{
            zipcode = "";
            $('#zipcode_error').html('')
        }
        if(!phone){
            phone_error = "El campo Teléfono es obligatorio";
            $('#phone_error').html('')
            $('#phone_error').html(phone_error);
        }else{
            phone = "";
            $('#phone_error').html('')
        }

        if(fname_error != '' || state_error != '' || city_error != '' || address_error != '' || zipcode_error != '' || phone_error != '')
        {
            return false; 
        }else{

            let data = {
                'fullname':fullname,
                'state':state,
                'let':let,
                'city':city,
                'address':address,
                'zipcode':zipcode,
                'phone':phone,
            }

            $.ajax({
                type: "",
                url: "/proceed-to-pay",
                data: "data",
                dataType: "dataType",
                success: function(response){

                }
            });
        }



    });
  });

</script>