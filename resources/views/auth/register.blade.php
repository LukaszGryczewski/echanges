<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow-sm card">
                    <div class="text-white card-header bg-primary">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Login -->
                            <div class="mb-3">
                                <label for="login" class="form-label">{{ __('Login') }}</label>
                                <input id="login" class="form-control @error('login') is-invalid @enderror" type="text" name="login" value="{{ old('login') }}" required autofocus autocomplete="name" />
                                @error('login')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Firstname -->
                            <div class="mb-3">
                                <label for="firstname" class="form-label">{{ __('Firstname') }}</label>
                                <input id="firstname" class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" />
                                @error('firstname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Lastname -->
                            <div class="mb-3">
                                <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
                                <input id="lastname" class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" />
                                @error('lastname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Address of the user -->
                            <div class="row">
                                <!-- Street -->
                                <div class="mb-3 col-md-6">
                                    <label for="street" class="form-label">{{ __('Street') }}</label>
                                    <input id="street" class="form-control @error('street') is-invalid @enderror" type="text" name="street" value="{{ old('street') }}" required autocomplete="name" />
                                    @error('street')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Number -->
                                <div class="mb-3 col-md-6">
                                    <label for="number" class="form-label">{{ __('Number') }}</label>
                                    <input id="number" class="form-control @error('number') is-invalid @enderror" type="text" name="number" value="{{ old('number') }}" required autocomplete="name" />
                                    @error('number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- City -->
                            <div class="mb-3">
                                <label for="city" class="form-label">{{ __('City') }}</label>
                                <input id="city" class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ old('city') }}" required autocomplete="name" />
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Municipalitie -->
                            <div class="mb-3">
                                <label for="municipalitie" class="form-label">{{ __('Municipalitie') }}</label>
                                <input id="municipalitie" class="form-control @error('municipalitie') is-invalid @enderror" type="text" name="municipalitie" value="{{ old('municipalitie') }}" required autocomplete="name" />
                                @error('municipalitie')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Postal Code -->
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">{{ __('Postal code') }}</label>
                                <input id="postal_code" class="form-control @error('postal_code') is-invalid @enderror" type="text" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="name" />
                                @error('postal_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="name" />
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </div>

                        </form>
                    </div>
                    <div class="text-center card-footer">
                        <a class="btn btn-link" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
