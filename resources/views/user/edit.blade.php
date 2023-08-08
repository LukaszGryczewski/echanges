@extends('layouts.app')

@section('email', 'Modifier son profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier son prodile') }}</div>

                    <div class="card-body">
                        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="firstname">{{ __('Prénom') }}</label>
                                <input type="text" id="firstname" name="firstname"
                                    class="form-control @error('firstname') is-invalid @enderror"
                                    value="{{ old('firstname', $user->firstname) }}" required>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lastname">{{ __('Nom') }}</label>
                                <input type="text" id="lastname" name="lastname"
                                    class="form-control @error('lastname') is-invalid @enderror"
                                    value="{{ old('lastname', $user->lastname) }}" required>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="text" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="old_password">{{ __('Ancien mot de passe') }}</label>
                                <input type="password" id="old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required>
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <a href="{{ route('profile.update-password') }}" class="btn btn-primary">
                                {{ __('Change Password') }}
                            </a>

                            <div class="form-group">
                                <label for="new_password">{{ __('Nouveau mot de passe') }}</label>
                                <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">{{ __('Confirmation du nouveau mot de passe') }}</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="phone">{{ __('Telephone') }}</label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $user->phone) }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
                                <a href="{{ route('user.profile', $user->id) }}"
                                    class="btn btn-secondary">{{ __('Annuler') }}</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include the app.js script with defer attribute -->
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
