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

{{--Add--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('crear') == 'Categoria creada correctamente')
<script>
 Swal.fire(
   'Categoria creada!',
   'La categoria ha sido creada.',
   'success'
)
</script>
@endif

