<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update-password') }}" class="mt-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password"
                class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="invalid-feedback" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="invalid-feedback" />
        </div>

        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                autocomplete="new-password" />
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>

        @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </form>
</section>
