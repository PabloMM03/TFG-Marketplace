<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">inicio</a>
                <span></span> Tienda
                <span></span> Tu Carro
            </div>
        </div>
    </div>
{{--Info place orders--}}
    <section class="mt-50 mb-50">
        <div class="container product_data">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col" style="width:130px;">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                {{--Foreach with product information--}}
                              @foreach ($cart_items->sortBy('id') as $key => $item)
                                <tr class="product_data">
                                    <td class="image product-thumbnail"><img class="card-img-top" src="@if($item->products->product_image) {{asset('storage/products/'. $item->products->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="product-details.html">{{$item->products->name}}</a></h5>
                                        <p class="font-xs">{{$item->products->description}}
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <span>{{$item->products->price}} €</span>
                                    </td>

                                    <td class="text-center" data-title="Stock">
                                        <input type="hidden" value="{{$item->products->id}}" class="prod_id">
                                        <div class="input-group text-center mb-3" style="width:130px;">
                                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                                            <button class="input-group-text changeQuantity increment-btn">+</button>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        {{-- @php $totalItem = $item->products->price *  $item->prod_qty; @endphp --}}
                                        <span>{{$totalItem}} €</span>
                                        {{-- {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}} --}}
                                    </td>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <td>
                                            <input type="hidden" name="prod_id" value="{{$item->products->id}}">
                                            <button type="submit" class="action-btn hover-up delete-cart-item" aria-label="Delete To Cart"><i class="fi-rs-trash"></i></button>
                                        </td>
                                      {{-- <td><a type="button" class="fas fa-times text-muted" wire:click="deleteProduct({{$item->products->id}})"><i class="fi-rs-trash"></i></a></td> --}}
                                  </div>                                        
                                </tr>
                                @php $total += $item->products->price * $item->prod_qty; @endphp
                              @endforeach

                                <tr>
                                    <td colspan="6" class="text-end">
                                      <form action="{{ url('delete-all') }}" method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar todos los productos?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden">
                                        <a href="#" type="hidden" class="fas fa-times text-muted" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fi-rs-cross-small"></i>Vaciar carrito</a>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        {{-- <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a> --}}
                        <a href="/" class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Continuar Comprando</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading_s1 mb-3">
                                <h4>Calcular envío</h4>
                            </div>
                            <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900">5%</span></p>
                            <form class="field_form shipping_calculator">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select">
                                            <select class="form-control select-active">
                                                <option value="">Elija una opción...</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="PW">Belau</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="VG">British Virgin Islands</option>
                                                <option value="BN">Brunei</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo (Brazzaville)</option>
                                                <option value="CD">Congo (Kinshasa)</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">CuraÇao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="CI">Ivory Coast</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Laos</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao S.A.R., China</option>
                                                <option value="MK">Macedonia</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia</option>
                                                <option value="MD">Moldova</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="KP">North Korea</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PS">Palestinian Territory</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="QA">Qatar</option>
                                                <option value="IE">Republic of Ireland</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russia</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="ST">São Tomé and Príncipe</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="SH">Saint Helena</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="SX">Saint Martin (Dutch part)</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="SM">San Marino</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia/Sandwich Islands</option>
                                                <option value="KR">South Korea</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syria</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom (UK)</option>
                                                <option value="US">USA (US)</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VA">Vatican</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Vietnam</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="WS">Western Samoa</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="State / Country" name="name" type="text">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="PostCode / ZIP" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn  btn-sm"><i class="fi-rs-shuffle mr-10"></i>Actualizar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>Aplicar cupón</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="Coupon" placeholder="Introduzca su cupón">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Aplicar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Total Items</td>
                                                <td class="cart_total_amount"><span class="font-lg">{{$item->count()}} productos</span></td>
                                                
                                            </tr>
                                            {{-- <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                            </tr> --}}
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">{{$total}} €</span></strong></td>
                                                {{-- {{Cart::session(auth()->id())->getTotal()}} --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{route('checkout')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceder a Pagar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

 {{--Add product to cart with jquery Ajax--}}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 <script>
    $(document).ready(function(){
 
    //Add product to cart
    $('.addToCartBtn').click(function(e){
            e.preventDefault();
        
            let product_id = $(this).closest('.product_data').find('.prod_id').val();
            let product_qty = $(this).closest('.product_data').find('.qty-input').val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $.ajax({
                method: "POST",
                url: "/add-to-single",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success: function(response){
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);

                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                    })
                }

            });
 
    });

    //Incrememnt quantity products
    $('.increment-btn').click(function(e){
        e.preventDefault();

        let inc_value = $(this).closest('.product_data').find('.qty-input').val();
        let value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
        
    });

    //Decrement quantity products
    $('.decrement-btn').click(function(e){
        e.preventDefault();

        let dec_value = $(this).closest('.product_data').find('.qty-input').val();
        let value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value --;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    

    //Delete cart item
    $('.delete-cart-item').click(function(e){
        e.preventDefault();

        let prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
                method: "POST",
                url: "/delete-to-cart",
                data: {
                    'prod_id': prod_id,
                },
                success: function(response){
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);

                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                    })
                }

            });
        
    });

    //Chaange quantity 
    $('.changeQuantity').click(function(e){
        e.preventDefault();

        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        let qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        data ={
            'prod_id': prod_id,
            'prod_qty': qty,
        }

        $.ajax({
                method: "POST",
                url: "/update-cart",
                data: data,
                success: function(response){
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);

                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                    })
                }

            });

    });

    });

    
</script> 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @if (session('status') == "Producto eliminado correctamente")
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

  @if (session('status') == "Todos los productos han sido eliminados.")
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

</body>

</html>