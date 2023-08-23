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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Chargement des scripts Bootstrap et autres scripts personnalisés -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Chargement des styles Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- js -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!--Video css-->
    <link rel="stylesheet" href="{{ asset('css/video_style.css') }}">
    @stack('styles')
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.menu')
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer class="py-4 mt-auto bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" id="section-de-contact">
            <div class="text-center col-md-4 text-md-start">
                <h3>{{ __('Contact') }}</h3>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope-fill"></i> {{ __('Adresse électronique') }}: info@iccbxl.be</li>
                    <li><i class="bi bi-telephone-fill"></i> {{ __('Téléphone') }}: 02/279.58.40</li>
                </ul>

                <h3>{{ __('Adresse') }}</h3>
                <ul class="list-unstyled">
                    <li><i class="bi bi-house-door-fill"></i> Palais du Midi</li>
                    <li><i class="bi bi-geo-alt-fill"></i> 4 Rue de la Fontaine</li>
                    <li><i class="bi bi-geo-alt-fill"></i> 1000 Bruxelles</li>
                </ul>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <a class="navbar-brand" href="{{ url('https://www.iccbxl.be/web/') }}">
                    <img src="{{ asset('storage/images/logoICC.png') }}" alt="Logo ICC"
                        style="height:60px; width:auto;">
                </a>
            </div>
            <div class="text-center col-md-4 text-md-end">
            </div>
        </div>
    </div>
</footer>

</html>
