@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
<a class="btn btn-primary btn-sm float-right" href="{{route('admin.products.create')}}">Añadir Producto</a>   
    <h1>Editar Producto</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif

<div class="crad">
    <div class="card-body">
        {{--No autocompletar al excribir--}}
        {!! Form::model($product,['route' => ['admin.products.update', $product], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}


{{--formulario de creacionde productos--}}

        @include('admin.products.partials.form')

        {!! Form::submit('Actualizar producto', ['class' => 'btn btn-primary btn-sm formulario-editar']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{--Update--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('info') == 'Producto actualizado correctamente')
<script>
 Swal.fire(
   'Producto actualizado!',
   'El producto ha sido actualizado.',
   'success'
)
</script>
@endif
<script>
    $('.formulario-editar').submit(function(e){
        e.preventDefault();

        Swal.fire({
title: 'Estás seguro?',
text: "Esta categoria se actualizará!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Si, actualizar!',
cancelButtonText: 'Cancelar!'
}).then((result) => {
if (result.isConfirmed) {
this.submit();
}
})
    });
</script>
@endsection