@extends('layouts.app')

@section('quantity', 'Modifier un produit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Modifier un produit') }}</div>
                    <div class="card-body">
                        <!-- Formulaire de modification du profil -->
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">{{ __('Nom') }}</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Adresse email') }}</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Ajoutez d'autres champs de profil ici -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h2>{{ __('Liste des erreurs de validation') }}</h2>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <nav><a href="{{ route('profile.edit') }}">{{ __('Retour à l\'édition du profil') }}</a></nav>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Modifier le mot de passe') }}</div>

                    <div class="card-body">
                        <!-- Formulaire de modification du mot de passe -->
                        <form method="PUT" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="current_password">{{ __('Mot de passe actuel') }}</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Nouveau mot de passe') }}</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirmer le nouveau mot de passe') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Modifier le mot de passe') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Supprimer le compte') }}</div>

                    <div class="card-body">
                        <!-- Formulaire de suppression de compte -->
                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group">
                                <label for="password">{{ __('Mot de passe actuel') }}</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">{{ __('Supprimer le compte') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>






@endsection
