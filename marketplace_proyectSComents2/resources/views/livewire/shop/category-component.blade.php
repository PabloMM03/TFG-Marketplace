@extends('layouts.app')
@section('content')
{{-- Contenido principal --}}
<div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
  
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

        @foreach ($products as $product)
            {{--Llamada desde un componente--}}
            <x-tag :product="$product"></x-tag>

        @endforeach

        <div class="mt-4">
            {{$products->links()}}
        </div>
</div>
@endsection

