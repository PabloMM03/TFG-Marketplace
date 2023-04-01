<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Introduza el nombre del rol']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<h2 class="h3">
    Listado de Permisos
</h2>

<div class="form-check">
    @foreach ($permisos as $permiso)
        <input class="form-check-input" type="checkbox" name="cod_permiso[]" value="{{$permiso->id}}" 
            @foreach($role->permissions as $permissions)
                @if ($permissions->id == $permiso->id)
                    checked
                @endif
            @endforeach
        id="cod_permiso">
        <label class="form-check-label" for="flexCheckDefault">
            {{ $permiso->description }} 
        </label>
        <br>
    @endforeach
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--Create--}}

@if (session('crear') == 'Rol creado correctamente')
<script>
     Swal.fire(
       'Creado!',
       'El rol ha sido creado.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-crear').submit(function(e){
            e.preventDefault();

            Swal.fire({
  title: 'Estás seguro?',
  text: "Este rol se creará!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, crear!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
})
        });
    </script>
@endsection
