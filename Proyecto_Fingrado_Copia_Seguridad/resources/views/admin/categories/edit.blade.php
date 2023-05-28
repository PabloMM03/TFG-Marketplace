@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')

{{--Solo tiene permiso el administrador--}}

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
        {!! Form::model($category, ['route' => ['admin.categories.update',$category],'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

        @include('admin.categories.partials.form')
            {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-primary btn-sm formulario-editar']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop



@section('js')

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