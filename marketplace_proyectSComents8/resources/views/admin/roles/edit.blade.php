@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
<a class="btn btn-primary btn-sm float-right" href="{{route('admin.roles.create')}}">Añadir Rol</a>
    <h1>Editar Rol</h1>
@stop

@section('content')

   <!--Reference is made to the view where the role edit form is -->
    <div class="card">
        <div class="card-body">
            
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

            @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary formulario-editar']) !!}
                <a href="{{url('/admin/roles')}}" class="btn btn-primary">Cancelar</a>

            {!! Form::close() !!}
        </div>
    </div>


@stop
