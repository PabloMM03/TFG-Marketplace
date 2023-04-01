@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
@can('admin.categories.create')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.categories.create')}}">Añadir Categoria</a>
    @endcan
    <h1>Editar categoria</h1>
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
        {!! Form::model($category, ['route' => ['admin.categories.update',$category], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Introduzca el nombre de categoria']) !!}

                @error('name')
                    <span class="text-danger">
                        {{$message}}
                    </span>       
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control','placeholder' => 'Introduzca el slug de categoria', 'readonly']) !!}

                @error('slug')
                    <span class="text-danger">
                        {{$message}}
                    </span>       
                @enderror
            </div>
            {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-primary btn-sm formulario-editar']) !!}

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

@if (session('editar') == 'Categoria actualizada correctamente')
<script>
 Swal.fire(
   'Categoria actualizada!',
   'La categoria ha sido actualizada.',
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