
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>TradeVibes</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo/Mi proyecto2.png')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}&currency=EUR"></script>
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"></head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div id="app">
        
        @livewire('navigation')            
        <div class="relative h-screen ">
          
            <!-- Contenido principal --> 
              <h1 class="text-2xl font-bold text-gray-900 p-4">@yield('title')</h1>
              <div class="p-4">
                <!-- Contenido aquí -->
                @yield('content')
                @yield('style')
                @yield('js')
              </div>
          </div>
  
      
    </div>

 <footer class="main">
  <section class="newsletter p-30 text-white wow fadeIn animated">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-7 mb-md-3 mb-lg-0">
                  <div class="row align-items-center">
                      <div class="col flex-horizontal-center">
                          <img class="icon-email" src="{{asset('assets/imgs/theme/icons/icon-email.svg')}}" alt="">
                          <h4 class="font-size-20 mb-0 ml-3">Suscríbete al boletín</h4>
                      </div>
                      <div class="col my-4 my-md-0 des">
                          <h5 class="font-size-15 ml-4 mb-0">...y recibe noticias <strong> sobre ofertas y descuentos.</strong></h5>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5">
                  <!-- Subscribe Form -->
                  <form class="form-subcriber d-flex wow fadeIn animated">
                      <input type="email" class="form-control bg-white font-small" placeholder="Introduzca su email">
                      <button class="btn bg-dark text-white" type="submit">Subscribete</button>
                  </form>
                  <!-- End Subscribe Form -->
              </div>
          </div>
      </div>
  </section>
  <section class="section-padding footer-mid">
      <div class="container pt-15 pb-20">
          <div class="row">
              <div class="col-lg-4 col-md-6">
                  <div class="widget-about font-md mb-md-5 mb-lg-0">
                      <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contacto</h5>
                      <p class="wow fadeIn animated">
                          <strong>Dirección: </strong>562 Wellington Road
                      </p>
                      <p class="wow fadeIn animated">
                          <strong>Teléfono: </strong>+34 123-456-789
                      </p>
                      <p class="wow fadeIn animated">
                          <strong>Email: </strong>TradeVibes@gmail.com
                      </p>
                      <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Siguenos</h5>
                      <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                          <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                          <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
                          <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                          <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
                          <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-3">
                  <h5 class="widget-title wow fadeIn animated">About</h5>
                  <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                      <li><a href="{{url('about')}}">Sobre nosotros</a></li>
                      <li><a href="#">Información de entrega</a></li>
                      <li><a href="{{url('politicas-de-privacidad')}}">Políticas de privacidad</a></li>
                      <li><a href="{{url('terms-conditions')}}">Terminos &amp; Condiciones</a></li>
                      <li><a href="{{url('contact')}}">Contactanos</a></li>                            
                  </ul>
              </div>
              <div class="col-lg-2  col-md-3">
                  <h5 class="widget-title wow fadeIn animated">Mi Cuenta</h5>
                  <ul class="footer-list wow fadeIn animated">
                      <li><a href="my-account.html"> Mi cuenta</a></li>
                      <li><a href="{{route('cart')}}">Ver Cesta</a></li>
                      <li><a href="{{url('wishlist')}}">Mi Wishlist</a></li>
                      <li><a href="{{url('my-orders')}}">Seguimiento de mi pedido</a></li>                            
                      <li><a href="{{url('my-orders')}}">Pedidos</a></li>
                  </ul>
              </div>
              <div class="col-lg-4 mob-center">
                  <h5 class="widget-title wow fadeIn animated">Instala la app</h5>
                  <div class="row">
                      <div class="col-md-8 col-lg-12">
                          <p class="wow fadeIn animated">Desde Play Store</p>
                          <div class="download-app wow fadeIn animated mob-app">
                              <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{asset('assets/imgs/theme/app-store.jpg')}}" alt=""></a>
                              <a href="#" class="hover-up"><img src="{{asset('assets/imgs/theme/google-play.jpg')}}" alt=""></a>
                          </div>
                      </div>
                      <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                          <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                          <img class="wow fadeIn animated" src="{{asset('assets/imgs/theme/payment-method.png')}}" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <div class="container pb-20 wow fadeIn animated mob-center">
      <div class="row">
          <div class="col-12 mb-20">
              <div class="footer-bottom"></div>
          </div>
          <div class="col-lg-6">
              <p class="float-md-left font-sm text-muted mb-0">
                  <a href="{{url('politicas-de-privacidad')}}">Políticas de privacidad</a> | <a href="{{url('terms-conditions')}}">Terminos & Condiciones</a>
              </p>
          </div>
          <div class="col-lg-6">
              <p class="text-lg-end text-start font-sm text-muted mb-0">
                  &copy; <strong class="text-brand">TradeVibes</strong> Reservados todos los derechos
              </p>
          </div>
      </div>
  </div>
</footer>    


    @livewireScripts

    <script src="{{ mix('js/app.js') }}"></script>
    {{-- FontAwesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-+NS5k/g0hJfV7Bk8YYv11k7hACoYjKlJ1W8+gJtw7HzfmF0chXwehWx2Q/0GknD0Z/DhLK7Vg/W+8LJo7Nq3zg==" crossorigin="anonymous"></script>
    {{-- Alpine --}}
    <script src="https://unpkg.com/alpinejs" defer></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

  

     <!-- Vendor JS-->
     
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('assets/js/main.js?v=3.3')}}"></script>
<script src="{{asset('assets/js/shop.js?v=3.3')}}"></script>    

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  

{{--If you are logged in you will see the Customer Help Center --}}

<!--Start of Tawk.to Script-->
@if(Auth::check())
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/64563e396a9aad4bc5793d54/1h0l1gdch';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
@endif
 <!--End of Tawk.to Script-->


  {{--Search system with autocomplete method--}}
    <script>
        let availableTags = [];
    $.ajax({
      method:"GET",
      url: "/product-list",
      success: function(response){
        // console.log(response);
        startAutoComplete(response);
      }
    });

    function startAutoComplete(availableTags){
        $( "#search_product" ).autocomplete({
          source: availableTags
        });
    }
      </script>
      
 

      <script>
         $(document).ready(function(){

          //Add product to cart 
          //We obtain the ID and quantity of the product and through AJAX sends the data to the server
             $('.addToCartBtn').click(function(e){
                 e.preventDefault();
             
                 var product_id = $(this).closest('.product_data').find('.prod_id').val();
                 var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                 
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
         //Increment quantity
         //We get the value of the quantity and increase it
         $('.increment-btn').click(function(e){
             e.preventDefault();
      
             var inc_value = $('.qty-input').val();
             var value = parseInt(inc_value, 10);
             value = isNaN(value) ? 0 : value;
             if(value < 10){
                 value++;
                 $('.qty-input').val(value);
             }
             
         });
      
         //Decrement quantity
         //We get the value of the quantity and decrease it
         $('.decrement-btn').click(function(e){
             e.preventDefault();
      
             var dec_value = $('.qty-input').val();
             var value = parseInt(dec_value, 10);
             value = isNaN(value) ? 0 : value;
             if(value > 1){
                 value --;
                 $('.qty-input').val(value);
             }
         });

         //Delete cart item
        //We obtain the ID of the product and through AJAX sends the data to the server
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

        //Change quantity 
       //We obtain the ID and quantity of the product and through AJAX sends the data to the server
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
                        }, 1000);

                        // Swal.fire({
                        // position: 'top-end',
                        // icon: 'success',
                        // title: response.status,
                        // showConfirmButton: false,
                        // timer: 2000
                        //  })
                    }

                });

        });
        
         });
           
      </script> 


        {{--Add product to cart Notification--}}

        @if (session('status') == "Producto añadido al carrito")
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


        @if(session('status') == "El carrito está vacio")
        <script> 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @endif 


        {{--Wishlist Notifications--}}

        @if (session('status') == "Producto añadido correctamente a su Wishlist")
        <script> 
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('status')}}',
        showConfirmButton: false,
        timer: 2000
        })
        </script>
        @elseif(session('status') == "El producto no existe")
        <script> 
            Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @elseif(session('status') == "Necesita hacer el login para continuar")
        <script> 
            Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @elseif(session('status') == "El producto ya está en su Wishlist")
        <script> 
            Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @endif

        @if(session('status') == "Compra realizada correctamente, pronto le llegará su pedido")
        <script> 
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '{{session('status')}}',
        showConfirmButton: false,
        timer: 2000
        })
        </script>
        @endif

        @if(session('status') == "Carrito vaciado correctamente")
        <script> 
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '{{session('status')}}',
        showConfirmButton: false,
        timer: 2000
        })
        </script>
        @endif

        @if(session('message') == "Te ha gustado este comentario")
        <script> 
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Te ha gustado este comentario',
        showConfirmButton: false,
        timer: 2000
        })
        </script>
        @endif



        @if (session('status') == "Producto valorado, Gracias por su valoración.")
        <script> 
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('status')}}',
        showConfirmButton: false,
        timer: 2000
        })
        </script>
        @elseif(session('status') == "No puedes valorar este producto sin haberlo comprado.")
        <script> 
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @elseif(session('status') == "El enlace que ha seguido no esta operativo.")
        <script> 
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @elseif(session('status') == "Debes hacer el login primero.")
        <script> 
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{session('status')}}',
        })
        </script>
        @endif
        
        {{--Comments message--}}
        
        @if (session('message') == "Comentario creado correctamente.")
        <script> 
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Comentario creado correctamente.',
        showConfirmButton: false,
        timer: 2000
        })
        </script>
        @elseif(session('message') == "El area del comentario es obligatoria.")
        <script> 
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El area del comentario es mandatoria.',
        })
        </script>
        @elseif(session('message') == "No puedes opinar sobre este producto sin haberlo comprado.")
        <script> 
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No puedes opinar sobre este producto sin haberlo comprado.',
        })
        </script>
        @elseif(session('message') == "Debes hacer el login primero.")
        <script> 
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes hacer el login primero.',
        })
        </script>
        @endif
        

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



</body>



</html>

























    
 
