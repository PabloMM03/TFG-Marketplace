@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Roles de Usuarios</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
        
    </div>
    
@endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>
        

       <h2 class="h5">Listado de Roles</h2>

        {!! Form::model($user, ['route' => ['admin.users.update',$user],'method' => 'PUT']) !!}
            @foreach ($roles as $role)
                <div>
                    <label for="">
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2 btn-sm formulario-asignar']) !!}
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

    @if (session('asignar') == 'Rol asignado correctamente!')
<script>
     Swal.fire(
       'Rol Asignado!',
       'El rol ha sido asignado.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-asignar').submit(function(e){
            e.preventDefault();

            Swal.fire({
        title: 'Estás seguro?',
        text: "Este rol se asignará!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, asginar!',
        cancelButtonText: 'Cancelar!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
});
    </script>
@endsection