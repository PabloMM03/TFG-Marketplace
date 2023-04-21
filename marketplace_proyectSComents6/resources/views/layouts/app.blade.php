<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-jF1wZq3n34p3GJjKpxCvNNNPMliT9TAlT1xjiT/xpJzo6DwU/1A7sGQbe6J52U+z/LQyX9mve4dk4E4yi4O3CA==" crossorigin="anonymous" />
    <!-- Agrega los estilos de Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

   

  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>

    <div id="app">
        
        @livewire('navigation')
        {{-- @livewire('nav-panel-left') --}}
            
        <div class="relative h-screen ">
          
            <!-- Contenido principal --> 
              <h1 class="text-2xl font-bold text-gray-900 p-4">@yield('title')</h1>
              <div class="p-4">
                <!-- Contenido aquí -->
                @yield('content')
                
              </div>
          </div>
          
    </div>
    
    @livewireScripts

    <script src="{{ mix('js/app.js') }}"></script>
    {{-- FontAwesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-+NS5k/g0hJfV7Bk8YYv11k7hACoYjKlJ1W8+gJtw7HzfmF0chXwehWx2Q/0GknD0Z/DhLK7Vg/W+8LJo7Nq3zg==" crossorigin="anonymous"></script>
    {{-- Alpine --}}
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--Carrousel--}}
    <link rel="stylesheet" href="{{asset('frontend/js/jquery-3.6.4.min.js')}}">
    <link rel="stylesheet" href="{{asset('frontend/js/owl.carousel.min.js')}}">
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('message'))
    <script> 
    Swal.("{{session('message')}}");
    </script>
    @endif --}}

</body>
</html>
