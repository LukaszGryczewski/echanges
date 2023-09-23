<nav class="navbar navbar-expand-lg navbar-light custom-light-green">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Geek Treasures"
            style="height:30px; width:auto; margin-right:10px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/product') }}">{{ __('Produit') }}</a>
            </li>
            @if (Auth::user() && Auth::user()->role && Auth::user()->role->role == 'admin')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/admin/products') }}">{{ __('Panel Produit') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/users') }}">{{ __('Panel Utilisateur') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/usersDeleted') }}">{{ __('Panel Utilisateur Supprimé') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/refund') }}">{{ __('Remboursement') }}</a>
                </li>
            @endif

            @if (Auth::user() && Auth::user()->role && (Auth::user()->role->role == 'admin' || Auth::user()->role->role == 'gestionnaire_commandes'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/orders') }}">{{ __('Commandes') }}</a>
                </li>
            @endif
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
                        <a class="dropdown-item" href="{{ route('invoice.index') }}">{{ __('Mes Facture') }}</a>
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
