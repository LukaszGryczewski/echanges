<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Firstname -->
        <div>
            <x-input-label for="firstname" :value="__('Firstname')" />
            <x-text-input id="firstname" class="block w-full mt-1" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div>
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input id="lastname" class="block w-full mt-1" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!----------Address of the user---------->

        <!-- Street -->
        <div>
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" class="block w-full mt-1" type="text" name="street" :value="old('street')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- Number -->
        <div>
            <x-input-label for="number" :value="__('Number')" />
            <x-text-input id="number" class="block w-full mt-1" type="text" name="number" :value="old('number')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- City -->
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block w-full mt-1" type="text" name="city" :value="old('city')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        <!-- Municipalitie -->
        <div>
            <x-input-label for="municipalitie" :value="__('Municipalitie')" />
            <x-text-input id="municipalitie" class="block w-full mt-1" type="text" name="municipalitie" :value="old('municipalitie')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('municipalitie')" class="mt-2" />
        </div>
        <!-- Postal Code -->
        <div>
            <x-input-label for="postal_code" :value="__('Postal code')" />
            <x-text-input id="postal_code" class="block w-full mt-1" type="text" name="postal_code" :value="old('postal_code')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
