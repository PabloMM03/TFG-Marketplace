@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
@can('admin.tags.create')
<a class="btn btn-primary btn-sm float-right" href="{{route('admin.tags.create')}}">Añadir Etiqueta</a>
@endcan
    <h1>Editar Etiqueta</h1>
@stop

@section('content')
{{--Alerta de confirmacion de creacion categoria--}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($tag, ['route' => ['admin.tags.update',$tag], 'method' => 'PUT']) !!}

            @include('admin.tags.partials.form')
            {!! Form::submit('Actualizar Etiqueta', ['class' => 'btn btn-primary formulario-editar']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>

    $(document).ready( function() {
    $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });
    });

    </script>

{{--Update--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('editar') == 'La etiqueta se actualizo correctamente')
<script>
 Swal.fire(
   'Etiqueta actualizada!',
   'La etiqueta ha sido actualizada.',
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