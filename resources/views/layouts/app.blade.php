<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UCA - Test</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style='background-image: url("{{ URL::asset('admin/img/fdo_uca.jpg') }}");background-position: center;	background-size: cover;	background-repeat: no-repeat;'>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-blue shadow-sm">
            <div style="font-size:1.7em;font-weight:bold;">
               
                U C A - Test
               
               
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
