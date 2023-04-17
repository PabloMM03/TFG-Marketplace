<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Introduzca el nombre de etiqueta']) !!}

    @error('name')
        <span class="text-danger">
            {{$message}}
        </span>       
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','placeholder' => 'Introduzca el slug de etiqueta', 'readonly']) !!}

    @error('slug')
        <span class="text-danger">
            {{$message}}
        </span>       
    @enderror
</div>

{{--Add--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('crear') == 'Etiqueta creada correctamente')
<script>
 Swal.fire(
   'Etiqueta creada!',
   'La etiqueta ha sido creada.',
   'success'
)
</script>
@endif

