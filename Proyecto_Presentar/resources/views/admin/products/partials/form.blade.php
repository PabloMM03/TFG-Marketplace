
{{--Product creation and editing form--}}

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Introduzca el nombre del producto']) !!}

      @error('name')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>
  <div class="form-group">
      {!! Form::label('slug', 'Slug') !!}
      {!! Form::text('slug', null, ['class' => 'form-control' , 'placeholder' => 'Introduzca el Slug del producto', 'readonly']) !!}

      @error('slug')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>
  <div class="form-group">
      {!! Form::label('category_id', 'Categoría') !!}
      {!! Form::select('category_id', $categories,null, ['class' => 'form-control']) !!}

      {{--Add error in case of validation--}}
      @error('category_id')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  <div class="form-group">
      <p class="font-weight-bold">Etiquetas</p>
       @foreach ($tags as $tag)
          <label class="mr-2" for="">
              {!! Form::checkbox('tags[]', $tag->id, null) !!}
              {{$tag->name}}
          </label>
       @endforeach

       @error('tags')
          <br>
          <small class="text-danger">{{$message}}</small>
       @enderror

  </div>

  <div class="form-group">
    {!! Form::label('brand', 'Marca:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}

    @error('brand')
        <small class="text-danger">{{$message}}</small>
    @enderror

  </div>

  <div class="form-group">
      <p class="font-weight-bold">Estado de publicación</p>
      <label class="mr-2" for="">
          {!! Form::radio('status', 1, true) !!}
          No publicado
      </label>

      <label for="">
          {!! Form::radio('status', 2) !!}
          Publicado
      </label>

      @error('status')
          <br>
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  <div class="form-group">
    <p class="font-weight-bold">Es Popular?</p>
    <label class="mr-2" for="">
        {!! Form::radio('trending', 1, true) !!}
        No popular
    </label>

    <label for="">
        {!! Form::radio('trending', 2) !!}
        Popular
    </label>

    @error('trending')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

  <div class="row mb-3">
      <div class="col">
          <div class="image-wrapper">
              @isset ($product->product_image)
              <img id="imagenProd" src="{{asset('storage/products/'. $product->product_image)}}" alt="">                  
              @else
                  <img id="imagenProd" src="{{asset('img/default_product.jpg')}}" alt="Imagen por defecto">
              @endisset
          </div>
      </div>
      <div class="col">
          <div class="form-group">
              {!! Form::label('file1', 'Imagen producto') !!}
              {!! Form::file('file1', ['class' => 'form-control-file', 'id'=> 'file1']) !!}

                @error('file1')
                <small class="text-danger">{{$message}}</small>
                @enderror
          </div>
      </div>
      <div class="col">
        <div class="image-wrapper">
            @isset ($product->product_image)
            <img id="imagenProd2" src="{{asset('storage/products/'. $product->product_image2)}}" alt="">                  
            @else
                <img id="imagenProd2" src="{{asset('img/default_product.jpg')}}" alt="Imagen por defecto">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file2', 'Imagen producto') !!}
            {!! Form::file('file2', ['class' => 'form-control-file', 'id' => 'file2']) !!}

            @error('file2')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
  </div>

  <div class="form-group">
      {!! Form::label('description', 'Descripcion:') !!}
      {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

      @error('description')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  <div class="form-group">
    {!! Form::label('original_price', 'Precio original €:') !!}
    {!! Form::text('original_price', null, ['class' => 'form-control']) !!}

    @error('original_price')
        <small class="text-danger">{{$message}}</small>
    @enderror

 </div>

  <div class="form-group">
      {!! Form::label('price', 'Precio de venta €:') !!}
      {!! Form::text('price', null, ['class' => 'form-control']) !!}

      @error('price')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  <div class="form-group">
    {!! Form::label('qty', 'Cantidad:') !!}
    <br>
    {!! Form::number('qty', null) !!}

    @error('qty')
        <small class="text-danger">{{$message}}</small>
    @enderror

 </div>

  @section('css')

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
  @stop

{{--Formato de edicion de texto--}}
  @section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

//Make automatic slug
$(document).ready( function() {
        $("#name").stringToSlug({
            // Select the element with the id "name" and apply the "stringToSlug" plugin
            setEvents: 'keyup keydown blur',
            // Define the events that will trigger the plugin: keyup, keydown, and blur
            getPut: '#slug',
            // Get the element with the id "slug" and set the generated slug as its value
            space: '-'
            // Define the character that will replace white spaces in the generated slug
        });

    });

    //Change images to preview them
    document.getElementById("file1").addEventListener('change', cambiarImagen1);
    document.getElementById("file2").addEventListener('change', cambiarImagen2);

    function cambiarImagen1(e) {
        const file = e.target.files[0];

        const reader = new FileReader();

        reader.onload = (e) => {
            document.getElementById('imagenProd').setAttribute('src', e.target.result);
        };

        reader.readAsDataURL(file);
    }

    function cambiarImagen2(e) {
        const file = e.target.files[0];

        const reader = new FileReader();

        reader.onload = (e) => {
            document.getElementById('imagenProd2').setAttribute('src', e.target.result);
        };

        reader.readAsDataURL(file);
    }

    </script>

@endsection
 
{{--Product creation alert--}}
@if (session('crear') == 'Producto creado correctamente')
<script>
 Swal.fire(
   'Producto creado!',
   'El producto ha sido creado.',
   'success'
)
</script>
@endif
