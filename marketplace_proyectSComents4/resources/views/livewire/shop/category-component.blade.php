@extends('layouts.app')
@section('content')
{{--Browser--}}
<div class="card-header mb-4 w-50 ml-16">
    <input class="form-control" placeholder="Introduzca el nombre del Producto" type="text" wire:model="search">
</div>
{{-- Contenido principal --}}
  
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

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
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TradeVibes 2023</p></div>
</footer>
@endsection

