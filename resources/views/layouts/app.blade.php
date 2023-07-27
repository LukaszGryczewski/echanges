<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Chargement des styles Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @vite(['resources/js/app.js'])
</head>
<body>
    @include('layouts.menu')
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Chargement des scripts Bootstrap et autres scripts personnalisés -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
