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
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($category->category_image)
            <img id="imagenProd" src="{{asset('storage/category/'.  $category->category_image)}}" alt="">                  
            @else
                <img id="imagenProd" src="{{asset('img/default_product.jpg')}}" alt="Imagen por defecto">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen Categoria') !!}
            {!! Form::file('file', ['class' => 'form-control-file']) !!}
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel praesentium sequi incidunt, dolores rem, accusantium maxime vitae a fuga in ab suscipit eaque sunt, voluptates sint modi. Nulla, suscipit deserunt!</p>
    </div>
</div>

<style>
    .image-wrapper{
    position: relative;
    padding-bottom: 56.25%;
    }

    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>

@section('js')
{{--Add--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>


@if (session('crear') == 'Categoria creada correctamente')
<script>
 Swal.fire(
   'Categoria creada!',
   'La categoria ha sido creada.',
   'success'
)
</script>
@endif


<script>
    //Hacer slug automatico
    $(document).ready( function() {
    $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

    });

     //Cambiar Imagen
     document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(e){
        const file = e.target.files[0];

        const reader = new FileReader();

        reader.onload = (e) => {
            document.getElementById('imagenProd').setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
</script>

@endsection