@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Crear categoria</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
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
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });
    });

    </script>

    

@endsection


