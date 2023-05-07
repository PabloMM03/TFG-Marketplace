<main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Shop
                        <span></span> Checkout
                    </div>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-sm-15">
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Ya tienes cuenta?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click aqui para iniciar sesión</a></span>
                            </div>
                            <div class="panel-collapse collapse login_form" id="loginform">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" name="email" placeholder="Username Or Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                    <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-md" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="toggle_info">
                                <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                            </div>
                            <div class="panel-collapse collapse coupon_form " id="coupon">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Coupon Code...">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="divider mt-50 mb-50"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Detalles de facturación</h4>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                <input type="text" placeholder="Nombre *" class="form-control fullname @error('fullname') is-invalid @enderror" name="fullname" value="{{Auth::user()->fullname}}" wire:model="fullname">
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                                <b id="fname_error" class="text-danger" style="font-size:12px"></b> 
                                </div>

                                {{--Region--}}
                                <div class="form-group">
                                <input type="text" placeholder="Region *" class="form-control state @error('state') is-invalid @enderror" name="state" value="{{Auth::user()->state}}" wire:model="state">
                        
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror    
                                <b id="state_error" class="text-danger" style="font-size:12px"></b>  
                                </div>

                                {{--Ciudad--}}
                                <div class="form-group">            
                                     <div class="form-group">       
                                    <input type="text" placeholder="Ciudad *" class="form-control city @error('city') is-invalid @enderror" name="city" value="{{Auth::user()->city}}" wire:model="city">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror      
                                    <b id="city_error" class="text-danger" style="font-size:12px"></b> 
                                     </div>
                                </div>
                                    {{--Address--}}
                                <div class="form-group">     
                                <input type="text" placeholder="Direccion *" class="form-control address @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" wire:model="address">
                      
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="address_error" class="text-danger" style="font-size:12px"></b> 
                                </div>

                                {{--ZIP code--}}
                                <div class="form-group">
                                <input type="text" placeholder="Codigo postal *" class="form-control zipcode @error('zipcode') is-invalid @enderror" name="zipcode" value="{{Auth::user()->zipcode}}" wire:model="zipcode">
                      
                                @error('zipcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="zipcode_error" class="text-danger" style="font-size:12px"></b>
                                </div>

                                    {{--Phone--}}   
                                <div class="form-group">  
                                <input type="text" placeholder="Teléfono" class="form-control phone @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" wire:model="phone">
                      
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="phone_error" class="text-danger" style="font-size:12px"></b> 
                                </div>

                            
                                <div class="form-group">
                                    <div class="checkbox">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapsePassword" class="form-group create-account collapse in">
                                    <input required="" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="ship_detail">
                                    <div class="form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                                <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseAddress" class="different_address collapse in">
                                        <div class="form-group">
                                    <input type="text" placeholder="Nombre *" class="form-control fullname @error('fullname') is-invalid @enderror" name="fullname" value="{{Auth::user()->fullname}}" wire:model="fullname">
                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror  
                                    <b id="fname_error" class="text-danger" style="font-size:12px"></b> 
                                    </div>

                                    {{--Region--}}
                                    <div class="form-group">
                                    <input type="text" placeholder="Region *" class="form-control state @error('state') is-invalid @enderror" name="state" value="{{Auth::user()->state}}" wire:model="state">
                            
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror    
                                    <b id="state_error" class="text-danger" style="font-size:12px"></b>  
                                    </div>

                                    {{--Ciudad--}}
                                    <div class="form-group">            
                                        <div class="form-group">       
                                        <input type="text" placeholder="Ciudad *" class="form-control city @error('city') is-invalid @enderror" name="city" value="{{Auth::user()->city}}" wire:model="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror      
                                        <b id="city_error" class="text-danger" style="font-size:12px"></b> 
                                        </div>
                                    </div>
                                        {{--Address--}}
                                    <div class="form-group">     
                                    <input type="text" placeholder="Direccion *" class="form-control address @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" wire:model="address">
                        
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <b id="address_error" class="text-danger" style="font-size:12px"></b> 
                                    </div>

                                    {{--ZIP code--}}
                                    <div class="form-group">
                                    <input type="text" placeholder="Codigo postal *" class="form-control zipcode @error('zipcode') is-invalid @enderror" name="zipcode" value="{{Auth::user()->zipcode}}" wire:model="zipcode">
                        
                                    @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <b id="zipcode_error" class="text-danger" style="font-size:12px"></b>
                                    </div>

                                        {{--Phone--}}   
                                    <div class="form-group">  
                                    <input type="text" placeholder="Teléfono" class="form-control phone @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" wire:model="phone">
                        
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <b id="phone_error" class="text-danger" style="font-size:12px"></b> 
                                    </div>
                                        </div>
                                    </div>
                                    <div class="mb-20">
                                        <h5>Additional information</h5>
                                    </div>
                                    <div class="form-group mb-30">
                                        <textarea rows="5" placeholder="Order notes"></textarea>
                                    </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Tus pedidos</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Producto</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                                                <td>
                                                    <h5><a href="product-details.html">Yidarton Women Summer Blue</a></h5> <span class="product-qty">x 2</span>
                                                </td>
                                                <td>$180.00</td>
                                            </tr>
                                            <tr>
                                                <td class="image product-thumbnail"><img src="assets/imgs/shop/product-2-1.jpg" alt="#"></td>
                                                <td>
                                                    <h5><a href="product-details.html">LDB MOON Women Summe</a></h5> <span class="product-qty">x 1</span>
                                                </td>
                                                <td>$65.00</td>
                                            </tr>
                                            <tr>
                                                <td class="image product-thumbnail"><img src="assets/imgs/shop/product-3-1.jpg" alt="#"></td>
                                                <td><i class="ti-check-box font-small text-muted mr-10"></i>
                                                    <h5><a href="product-details.html">Women's Short Sleeve Loose</a></h5> <span class="product-qty">x 1</span>
                                                </td>
                                                <td>$35.00</td>
                                            </tr>
                                            <tr>
                                                <th>SubTotal</th>
                                                <td class="product-subtotal" colspan="2">$280.00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td colspan="2"><em>Free Shipping</em></td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">$280.00</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Metodo de pago</h5>
                                    </div>
                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" wire:model="payment_method" name="exampleRadios" id="exampleRadios1" value="cash_on_delivery" checked>
                                            <label class="form-check-label" for="exampleRadios1" >
                                                Efectivo
                                            </label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4">
                                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" wire:model="payment_method" name="exampleRadios" id="exampleRadios2" value="paypal">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Paypal
                                            </label>
                                         </div>
                                    </div>
                                </div>
                                <button type="button" wire:click="make_order()"  class="btn btn-fill-out btn-block mt-30">Hacer pedido</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</main>





    
    

















































    {{-- <div class="container py-5">
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
                              {{-- <div class="row">
                                  
                                <label for="">Nombre completo</label>
                                <input type="text" class="form-control fullname @error('fullname') is-invalid @enderror" name="fullname" value="{{Auth::user()->fullname}}" wire:model="fullname">
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                                <b id="fname_error" class="text-danger" style="font-size:12px"></b>  
                            
                                {{--Region--}}
                                    
                                {{-- <label for="">Region</label>
                                <input type="text" class="form-control state @error('state') is-invalid @enderror" name="state" value="{{Auth::user()->state}}" wire:model="state">
                        
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror    
                                <b id="state_error" class="text-danger" style="font-size:12px"></b>   --}} 

                                {{--Ciudad--}}
                                
                                {{-- <label for="">Ciudad</label>
                                <input type="text" class="form-control city @error('city') is-invalid @enderror" name="city" value="{{Auth::user()->city}}" wire:model="city">
                      
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror      
                                <b id="city_error" class="text-danger" style="font-size:12px"></b>  --}}

                                {{--Address--}}
{{--                                 
                                <label for="">Direccion</label>
                                <input type="text" class="form-control address @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" wire:model="address">
                      
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="address_error" class="text-danger" style="font-size:12px"></b>  --}}

                                {{--ZIP code--}}
{{--                                  
                                <label for="">Código postal</label>
                                <input type="text" class="form-control zipcode @error('zipcode') is-invalid @enderror" name="zipcode" value="{{Auth::user()->zipcode}}" wire:model="zipcode">
                      
                                @error('zipcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="zipcode_error" class="text-danger" style="font-size:12px"></b> --}}

                                {{--Phone--}}
                                
                                {{-- <label for="">Telefono</label>
                                <input type="text" class="form-control phone @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" wire:model="phone">
                      
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <b id="phone_error" class="text-danger" style="font-size:12px"></b> 
                            </div>             
                          </div> --}}
{{--                           
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
                                  <tbody> --}}
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
{{--                                       
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
                                {{-- <button type="button" class="btn btn-primary w-50 razorpay_btn">Pay with Razorpay</button>

                              </div>  --}}
                              
                              {{-- <h4 class="px-2">Percio Total : <span class="float-end">{{$orders->total}} €</span></h4> --}}
                          {{-- </div>
                      </div>
                  </div>
              </div>
  
          </div>
      </div> --}}
  {{-- </div>  --}}

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