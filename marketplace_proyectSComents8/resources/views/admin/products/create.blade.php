@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {{--No autocompletar al excribir--}}
        {!! Form::open(['route' => 'admin.products.store', 'autocomplete' => 'off', 'files' => true]) !!}

        @include('admin.products.partials.form')

        {!! Form::submit('Crear producto', ['class' => 'btn btn-primary btn-sm formulario-crear']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

