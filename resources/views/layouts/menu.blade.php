<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Geek Treasures</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/product') }}">{{ __('Produit') }}</a>
            </li>
            @auth
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/my-product') }}">{{ __('Mes Produit') }}</a>
                </li>
            @endauth
            @if (Auth::user() && Auth::user()->role && Auth::user()->role->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/user') }}">{{ __('Utilisateurs') }}</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/contact') }}">{{ __('Contact') }}</a>
            </li>
        </ul>

        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('set-locale', 'fr') }}">FR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('set-locale', 'en') }}">EN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('set-locale', 'nl') }}">NL</a>
            </li>

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}">{{ __('Panier') }}</a>
                </li>
            @endauth
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('S\'authentifier') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('S\'enregistrer') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->login }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.profile') }}">{{ __('Mon Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
