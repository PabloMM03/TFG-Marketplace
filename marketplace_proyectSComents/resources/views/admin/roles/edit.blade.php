@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
   
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
{{--Update--}}
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('actualizar') == 'Rol actualizado correctamente')
<script>
     Swal.fire(
       'Actualizado!',
       'El rol ha sido actualizado.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
  title: 'Estás seguro?',
  text: "Este rol se actualizará!",
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
