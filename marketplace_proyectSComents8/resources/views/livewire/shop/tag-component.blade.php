@extends('layouts.app')
@section('content')
{{-- Contenido principal --}}
@if ($products->count())    

        <h1 class="uppercase text-center text-3xl font-bold">Etiqueta: {{$tag->name}}</h1>

        <div class="container">
    
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
    <div class="card-body">
        <strong>No hay ningun producto hasta el momento en esta sección.</strong>
    </div>
@endif 
@endsection

