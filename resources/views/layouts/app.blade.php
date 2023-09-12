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
<footer class="py-3 mt-auto bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" id="section-de-contact">

            <!-- Section de liens -->
            <div class="col-md-4">
                <ul class="mb-0 list-unstyled">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ url('/privacy') }}">{{ __('Confidentialité') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Logo au centre -->
            <div class="mt-2 text-center col-md-4">
                <a href="{{ url('https://www.iccbxl.be/web/') }}">
                    <img src="{{ asset('storage/images/logoICC.png') }}" alt="Logo ICC"
                        class="img-fluid" style="height:50px; width:auto;">
                </a>
            </div>

            <div class="col-md-4">
                <ul class="mb-0 list-unstyled text-md-end"> <!-- text-md-end alignera le contenu à droite sur les écrans medium et plus larges -->
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ url('/contact') }}">{{ __('Contact') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Ligne de droits d'auteur -->
        <div class="mt-2 row">
            <div class="text-center col-md-12">
                <p class="mb-0 text-muted small">© 2023 ICCBXL. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</footer>
</html>
