<div>
    {{-- In work, do what you enjoy. --}}

<!--Se mostrarán el icono del carrito mas los productos que se han añadido, y se actualiza automaticamente -->

<a href="{{route('cart')}}" class="btn btn-none" >
     <button class="btn btn-outline-dark" type="submit">
          {{-- <i class="bi-cart-fill me-1"></i> --}}
          <i class="bi bi-cart-fill text-white me-1"></i>
          <b class="text-white">Cart</b> 
     
     <!--  Obtiene el total completo-->
<!--Acceder de nuevo a la tienda -->
@auth
<span class="badge text-white ms-1 rounded-pill">{{Cart::session(auth()->id())->getTotalQuantity()}}</span>

@else
 0

@endauth
</button>
      
</a>
    
</div>
