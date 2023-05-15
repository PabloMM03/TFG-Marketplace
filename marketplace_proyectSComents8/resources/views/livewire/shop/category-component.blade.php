@extends('layouts.app')
@section('content')
{{-- Contenido principal --}}
  
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

        @if ($products->count())  
        <div class="container ">
    
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        @foreach ($products as $product)
            {{--Llamada desde un componente--}}
            <x-tag :product="$product"></x-tag>

        @endforeach

            </div>
        </div>

        <div class="mt-4">
            {{$products->links()}}
        </div>

        @else
        <center>
        <div class="card-body mt-5">
            <strong>No hay ningun producto hasta el momento en esta sección.</strong>
        </div> 
        </center>  
     @endif 

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
     
     @if(session('status') == "El carrito está vacio")
     <script> 
       Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: '{{session('status')}}',
     })
     </script>
     @endif

@endsection

