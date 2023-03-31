<div>
    {{-- In work, do what you enjoy. --}}

<!--Se mostrarán el icono del carrito mas los productos que se han añadido, y se actualiza automaticamente -->

{{-- <a href="{{route('cart')}}" class="btn btn-none" >
     <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
        <circle cx="9" cy="21" r="1"/>
        <circle cx="20" cy="21" r="1"/>
        <path d="M1 1h4l2.45 11.7a2 2 0 0 0 2 1.7h10a2 2 0 0 0 2-1.7L23 6H6"/>
      </svg>  
      
</a> --}}

<a href="{{route('cart')}}" class="btn btn-none" >
     <button class="btn btn-outline-dark" type="submit">
          <i class="bi-cart-fill me-1"></i>
          Cart
     
     <!--  Obtiene el total completo-->
<!--Acceder de nuevo a la tienda -->
@auth
{{-- <i style="color:white">{{Cart::session(auth()->id())->getTotalQuantity()}} </i>  --}}
<span class="badge bg-dark text-white ms-1 rounded-pill">{{Cart::session(auth()->id())->getTotalQuantity()}}</span>

@else
 0

@endauth
</button>
      
</a>
    
</div>
