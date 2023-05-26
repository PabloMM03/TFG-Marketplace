@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Crear categoria</h1>
@stop

@section('content')

{{--Reference is made to the view where the creation form of the category is.--}}
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('admin.categories.partials.form')
                {!! Form::submit('Crear Categoria', ['class' => 'btn btn-primary btn-sm formulario-crear']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>

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

    </script>

    

@endsection


