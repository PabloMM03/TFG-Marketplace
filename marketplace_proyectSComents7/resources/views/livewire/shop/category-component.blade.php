@extends('layouts.app')
@section('content')
{{-- Contenido principal --}}
  
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

        @if ($products->count())  
        <div class="container px-4 px-lg-5 mt-5">
    
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

<!-- Footer-->
<footer class="py-5 bg-dark" style="position: absolute; bottom: 0; width: 100%;">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TradeVibes 2023</p></div>
</footer>
@endsection

