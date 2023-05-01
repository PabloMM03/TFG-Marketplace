<nav class="bg-black"  x-data="{open:false}">  {{-- Abrir y cerrar menu responsive --}}
  <div class="mx-auto  px-2 sm:px-6 lg:px-8 ">
    <div class="relative flex h-16 items-center justify-between ">

      <!-- Mobile menu button-->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        
        <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>        
      {{-- logotipo --}}
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start ">
        <div class="hidden sm:ml-60 sm:block mt-2">
          
          <div class="flex space-x-4">
            <a href="/" class="flex flex-shrink-0 items-center mr-3">
              <img class="block h-8 w-auto lg:hidden" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
              <img class="hidden h-8 w-auto lg:block" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </a>  

            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/" style="text-decoration:none" class="btn btn-outline-dark text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Inicio</a>
            <a class="nav-link dropdown-toggle btn btn-outline-dark text-white px-3 py-2 rounded-md text-sm font-medium" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Todas las Categorías</a></li>
                      <li><hr class="dropdown-divider" /></li>
                      
                      @foreach ($categories as $category)

                      <li><a class="dropdown-item" href="{{route('products.category', $category)}}">{{$category->name}}</a></li>
              
                      @endforeach

                      <li><hr class="dropdown-divider" /></li>
                      
                     
                  </ul>
                  <a class="nav-link dropdown-toggle btn btn-outline-dark text-white px-3 py-2 rounded-md text-sm font-medium" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Etiquetas</a> 
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Todas las Etiquetas</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  
                  @foreach ($tags as $tag)

                  <li><a class="dropdown-item" href="{{route('products.tag', $tag)}}">{{$tag->name}}</a></li>
          
                  @endforeach

                  <li><hr class="dropdown-divider" /></li>
                </ul>


                  <a class="nav-link dropdown-toggle btn btn-outline-dark text-white px-3 py-2 rounded-md text-sm font-medium" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/">Todos los Productos</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="{{route('shop.trending')}}">Productos Populares</a></li>
                    <li><a class="dropdown-item" href="{{route('shop.recents')}}">Nuevos Productos</a></li>
                  </ul>
                  <a href="/" style="text-decoration:none" class="btn btn-outline-dark text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Sobre nosotros</a> 
                 @auth
                  <a href="{{url('wishlist')}}" style="text-decoration:none" class="btn btn-outline-dark text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Wishlist</a>
                @endauth
          </div>
        </div>

        {{--Browser--}}
        <div class="search-bar">
          <form action="{{url('searchproduct')}}" method="POST">
            @csrf
          <div class="input-group ml-3 mr-4 mt-2">
            <input type="search" class="form-control" id="search_product" name="product_name" placeholder="Search products" required aria-describedby="basic-addon1">
               {{-- <span class="input-group-text" id="basic-addon1">@</span>  --}}
              <button type="submit" class="input-group-text"><i class="bi bi-search"></i></button>
          </div>
         </form>
        </div>
        
      </div>

      @auth {{--Check if it is authenticated, if so the data of the nav bar is displayed --}}

      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          @livewire('shop.cart-component')

        <!-- Profile dropdown -->
        <div class="relative ml-3 mr-40" x-data="{ open: false }">
           <div> {{--Abrir menu desplegable --}}
            <button x-on:click="open = true" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://imgs.search.brave.com/sKfAbut1v6w2KmT6LZ37qdvMvSYPF1tn9-ygLLLSepQ/rs:fit:600:600:1/g:ce/aHR0cHM6Ly9zdDQu/ZGVwb3NpdHBob3Rv/cy5jb20vNDMyOTAw/OS8xOTk1Ni92LzQ1/MC9kZXBvc2l0cGhv/dG9zXzE5OTU2Mjg5/NC1zdG9jay1pbGx1/c3RyYXRpb24tY3Jl/YXRpdmUtdmVjdG9y/LWlsbHVzdHJhdGlv/bi1kZWZhdWx0LWF2/YXRhci5qcGc" alt="">
            </button>                                 
          </div>

          {{-- Cerrar menu deplegable --}}
          <div x-show="open" x-on:click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            {{-- {{route('profile.show')}}--}}
            {{-- <a href="#" style="text-decoration:none" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a> --}}
            {{-- <a href="#" style="text-decoration:none" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Ajustes</a> --}}


            @can('admin.home')
            <a href="{{route('admin.home')}}" style="text-decoration:none" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Admin Panel</a>
            @endcan

            {{-- Accion de logout--}}
          <form id="logout-form"  action="{{ route('logout') }}" method="POST">
              @csrf
              <a href="{{ route('logout') }} " style="text-decoration:none" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2"
               onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              
              {{ __('Cerrar Sesión') }}</a>
          </form>

          </div>
        </div>
      </div> 

      @else
          {{--Acciones login y register --}}
      <div class="mr-40">
          <a href="{{route('login')}}" style="text-decoration:none" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
          <a href="{{route('register')}}" style="text-decoration:none" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
      </div>

      @endauth
    </div>
  </div>

  {{-- <!-- Mobile menu, show/hide based on menu state. --> Abrir y cerra menu responsive --}}
  <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="/" style="text-decoration: none" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Tienda</a>

      <a href="#" style="text-decoration: none" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
  
      <a href="#" style="text-decoration: none" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
    </div>
  </div>
</nav>


<style>
  .dropdown-menu{
    padding-bottom: 30px;
  }
  .dropdown-menu li{
    list-style: none;
    color: #fff;
    cursor:pointer;
    margin: 10px 0;
    padding: 10px 15px;
    border-radius:6px;
    font-size: 15px;
    position: relative;
    z-index: 2;
  }

  .dropdown-menu li::before{
    content:"";
    position: absolute;
    left: 0;
    top: 0;
    width: 0%;
    height: 100%;
    background-color: var(-azul);
    transition: .6s ease;
    border-radius: 6px;
    z-index: -1;
  }

  .search-bar{
    width: 30%;
    margin-top: 4px;
  }

</style>


{{--Alert message--}}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(session('status') == "No hay productos con ese nombre")
<script> 
Swal.fire({
  position: 'top-center',
  icon: 'error',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>

@endif