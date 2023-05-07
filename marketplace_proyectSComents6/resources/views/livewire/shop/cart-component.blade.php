
    {{-- In work, do what you enjoy. --}}

<!--Se mostrarán el icono del carrito mas los productos que se han añadido, y se actualiza automaticamente -->
<a class="mini-cart-icon" href="{{route('cart')}}">
 <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">

     <!--  Obtiene el total completo-->
<!--Acceder de nuevo a la tienda -->
@auth
<span class="pro-count blue">{{Cart::session(auth()->id())->getTotalQuantity()}}</span>

@else
<span class="pro-count blue">0</span>

@endauth
      
</a>

