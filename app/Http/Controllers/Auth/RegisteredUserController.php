<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Address;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            //'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'login' => ['required', 'string', 'max:60', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'street' => ['required', 'string', 'max:60'],
            'number' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:60'],
            'municipalitie' => ['nullable', 'string', 'max:60'],
            'postal_code' => ['required', 'string', 'max:15'],
            'phone' => ['required', 'string', 'max:60'],
        ]);

        $address = Address::create([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'municipalitie' => $request->municipalitie,
            'postal_code' => $request->postal_code,
        ]);

        $user = User::create([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address_id' => $address->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,

        ]);

       /* $user = User::create([
            //'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address_id' =>$request->input('address_id'),

            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required','string','max:255'],
            'address_id' => ['required','array'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required','string','max:60'],
        ]);*/

        /*$address = new Address();
        $address->street = $request->input('street');
        $address->number = $request->input('number');
        $address->city = $request->input('city');
        $address->municipalitie = $request->input('municipalitie');
        $address->postal_code = $request->input('postal_code');
        $address->save();*/

        /*$user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address_id' => $request->address_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,

        ]);*/

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
