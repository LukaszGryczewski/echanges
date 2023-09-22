@extends('layouts.app')

@section('description', __('S\'enregistrer'))

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow-sm card">
                    <div class="card-header ">{{ __('S\'enregistrer') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.store') }}">
                            @csrf

                            <!-- Login -->
                            <div class="mb-3">
                                <label for="login" class="form-label">{{ __('Login') }}</label>
                                <input id="login" class="form-control @error('login') is-invalid @enderror"
                                    type="text" name="login" value="{{ old('login') }}" required autofocus
                                    autocomplete="name" />
                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Firstname -->
                            <div class="mb-3">
                                <label for="firstname" class="form-label">{{ __('Prénom') }}</label>
                                <input id="firstname" class="form-control @error('firstname') is-invalid @enderror"
                                    type="text" name="firstname" value="{{ old('firstname') }}" required
                                    autocomplete="name" />
                                @error('firstname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Lastname -->
                            <div class="mb-3">
                                <label for="lastname" class="form-label">{{ __('Nom') }}</label>
                                <input id="lastname" class="form-control @error('lastname') is-invalid @enderror"
                                    type="text" name="lastname" value="{{ old('lastname') }}" required
                                    autocomplete="name" />
                                @error('lastname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div class="mb-3 d-flex align-items-center">
                                <label class="form-label me-3">{{ __('Sexe') }}</label>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="gender" id="madame"
                                        value="Madame">
                                    <label class="form-check-label" for="madame">
                                        {{ __('Madame') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="monsieur"
                                        value="Monsieur">
                                    <label class="form-check-label" for="monsieur">
                                        {{ __('Monsieur') }}
                                    </label>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Address of the user -->
                            <div class="row">
                                <!-- Street -->
                                <div class="mb-3 col-md-6">
                                    <label for="street" class="form-label">{{ __('Rue') }}</label>
                                    <input id="street" class="form-control @error('street') is-invalid @enderror"
                                        type="text" name="street" value="{{ old('street') }}" required
                                        autocomplete="name" />
                                    @error('street')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Number -->
                                <div class="mb-3 col-md-6">
                                    <label for="number" class="form-label">{{ __('Numero') }}</label>
                                    <input id="number" class="form-control @error('number') is-invalid @enderror"
                                        type="text" name="number" value="{{ old('number') }}" required
                                        autocomplete="name" />
                                    @error('number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- City -->
                            <div class="mb-3">
                                <label for="city" class="form-label">{{ __('Ville') }}</label>
                                <input id="city" class="form-control @error('city') is-invalid @enderror"
                                    type="text" name="city" value="{{ old('city') }}" required
                                    autocomplete="name" />
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Municipalitie -->
                            <div class="mb-3">
                                <label for="municipalitie" class="form-label">{{ __('Commune') }}</label>
                                <input id="municipalitie" class="form-control @error('municipalitie') is-invalid @enderror"
                                    type="text" name="municipalitie" value="{{ old('municipalitie') }}" required
                                    autocomplete="name" />
                                @error('municipalitie')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Postal Code -->
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">{{ __('Code Postal') }}</label>
                                <input id="postal_code" class="form-control @error('postal_code') is-invalid @enderror"
                                    type="text" name="postal_code" value="{{ old('postal_code') }}" required
                                    autocomplete="name" />
                                @error('postal_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror"
                                    type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="username" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Mot de Passe') }}</label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror"
                                    type="password" name="password" required autocomplete="new-password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label">{{ __('Confirmation Mot de Passe') }}</label>
                                <input id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    type="password" name="password_confirmation" required autocomplete="new-password" />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('Télephone') }}</label>
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror"
                                    type="text" name="phone" value="{{ old('phone') }}" required
                                    autocomplete="name" />
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select name="role" id="role"
                                    class="form-control @error('role') is-invalid @enderror">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ __('Ajouter') }}</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-danger">{{ __('Annuler') }}</a>
                            </div>

                        </form>
                    </div>
                    <div class="text-center card-footer">
                        <a class="btn btn-link" href="{{ route('login') }}">{{ __('Deja Enregistrée?') }}</a>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
