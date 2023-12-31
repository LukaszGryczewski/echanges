@extends('layouts.app')

@section('email', __('Modifier son profile'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier son mot de passe') }}</div>

                    <div class="card-body">
                        <form action="{{ route('user.update-password', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="old_password">{{ __('Ancien mot de passe') }}</label>
                                <input type="password" id="old_password" name="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror" required>
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Nouveau mot de passe') }}</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirmation du nouveau mot de passe') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control">
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
@endsection
