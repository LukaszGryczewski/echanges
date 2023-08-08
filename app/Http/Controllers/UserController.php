<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('user.index', [
            'users'    => $users,
            'resource' => 'Utilisateurs'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('user.show', [
            'user' => $user
        ]);
    }

    /**
     * Display the authentified user profil.
     */
    public function profile()
    {
        $user = auth()->user();

        return view('user.profile', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validation des données du formulaire
        $validated = $request->validate([
            //'login' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $user = user::find($id);
        $user->fill($validated); // Remplit les attributs modifiés

        // Vérifier si un nouveau mot de passe est fourni
    if ($request->has('password')) {
        $user->password = bcrypt($request->password); // Hasher le nouveau mot de passe
    }

        $user->save(); // Enregistre les modifications

        return view('user.show', [
            'user' => $user,
        ]);
        /*return view('user.show', [
            'user' => $updatedUser,
            'status' => 'Profile updated successfully.'
        ]);*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
