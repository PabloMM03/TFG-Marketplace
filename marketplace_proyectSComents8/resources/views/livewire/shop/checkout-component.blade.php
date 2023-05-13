

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
                                    {{-- <form method="post">
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
                                    </form> --}}
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
                                    {{-- <form method="post">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Coupon Code...">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                                        </div>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="divider mt-50 mb-50"></div>
                        </div>
                    </div>

                    <form action="{{route('place.order')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="mb-25">
                                        <h4>Detalles de facturación</h4>
                                    </div>

                                    <div class="form-group">

                                    <input type="text" placeholder="Nombre *" class="form-control fullname @error('fname') is-invalid @enderror" name="fname"  wire:model="fname">
                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror  
                                    <b id="fname_error" class="text-danger" style="font-size:12px"></b> 

                                    </div>
                                    <div class="form-group">

                                        <input type="text" placeholder="Apellidos *" class="form-control fullname @error('lname') is-invalid @enderror" name="lname"  wire:model="lname">
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror  
                                        <b id="lname_error" class="text-danger" style="font-size:12px"></b> 
    
                                        </div>

                                    {{--Region--}}
                                    <div class="form-group">

                                    <input type="text" placeholder="Region *" class="form-control state @error('state') is-invalid @enderror" name="state"  wire:model="state">
                            
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
                                        <input type="text" placeholder="Ciudad *" class="form-control city @error('city') is-invalid @enderror" name="city"  wire:model="city">
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

                                    <input type="text" placeholder="Direccion *" class="form-control address @error('address1') is-invalid @enderror" name="address1"  wire:model="address1">
                        
                                    @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <b id="address_error" class="text-danger" style="font-size:12px"></b> 

                                    </div>

                                    {{--ZIP code--}}
                                    <div class="form-group">

                                    <input type="text" placeholder="Codigo postal *" class="form-control zipcode @error('zipcode') is-invalid @enderror" name="zipcode"  wire:model="zipcode">
                        
                                    @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <b id="zipcode_error" class="text-danger" style="font-size:12px"></b>

                                    </div>

                                        {{--Phone--}}   
                                    <div class="form-group">  

                                    <input type="text" placeholder="Teléfono" class="form-control phone @error('phone') is-invalid @enderror" name="phone"  wire:model="phone">
                        
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <b id="phone_error" class="text-danger" style="font-size:12px"></b> 

                                    </div>

                                    {{--Email--}}   
                                    <div class="form-group">  

                                        <input type="text" placeholder="Email *" class="form-control phone @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" wire:model="email">
                            
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <b id="email_error" class="text-danger" style="font-size:12px"></b> 
    
                                    </div>
                                        {{--Address 2--}}   
                                    <div class="form-group">  

                                        <input type="text" placeholder="Dirección 2 *" class="form-control phone @error('address2') is-invalid @enderror" name="address2"  wire:model="address2">
                            
                                        @error('address2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <b id="address2_error" class="text-danger" style="font-size:12px"></b> 
    
                                    </div>

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
                                                {{--Foreach with Order information--}}
                                                @php $total = 0; @endphp
                                                    @foreach ($cartItems as $item)
                                                    <tr>
                                                        <td class="image product-thumbnail"><img  src="@if($item->products->product_image) {{asset('storage/products/'. $item->products->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="#"></td>
                                                        <td>
                                                            <h5><a href="product-details.html">{{$item->products->name}}</a></h5> <span class="product-qty">x{{$item->prod_qty}}</span>
                                                        </td>
                                                        @php $totalItem = $item->products->price *  $item->prod_qty; @endphp 
                                                        <td>{{$totalItem}}€</td>
                                                    </tr>
                                                    @php $total += $item->products->price * $item->prod_qty; @endphp
                                                    @endforeach
                                                    {{--We get the total price of each sum of the products--}}
                                                    <tr>
                                                        <th>SubTotal</th>
                                                        <td class="product-subtotal" colspan="2">{{$total}}€</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Envío</th>
                                                        <td colspan="2"><em>Envío gratis</em></td>
                                                    </tr>
                                                    {{--We get the total price of the order--}}
                                                    <tr>
                                                        <th>Total</th>
                                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">{{$total}}€</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                            <div class="payment_method">
                                                <div class="mb-25">
                                                    <h5>Metodo de pago</h5>
                                                </div>
                                                <button type="submit" name="payment_method" class="btn btn-fill-out btn-block mt-30">Hacer pedido</button>
                                            </div>
                                            
                                    </div>
                                </div>
                        
                        </div>
                    </form>

            </div>
        </section>
</main>



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