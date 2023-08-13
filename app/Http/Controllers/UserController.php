<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        //validate the data in the form
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $user = user::find($id);
        $user->fill($validated); // Remplit les attributs modifiés
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        } else {
            $imagePath = 'default_image.png';
        }

        $user->save();

        return view('user.profile', [
            'user' => $user,
        ]);
    }

    public function showUpdatePasswordForm($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->withErrors(['User not found.']);
        }
        return view('user.update-password', ['user' => $user]);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        // Verif if the old password is correct
        if (!Hash::check($validated['old_password'], auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Update password
        $user = auth()->user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('user.profile')->with('status', 'Mot de passe mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // Verif if user exist
        if (!$user) {
            return back()->with('error', 'Utilisateur non trouvé.');
        }

        $user->delete();

        return redirect()->route('welcome')->with('status', 'Utilisateur supprimé avec succès.');
    }
}
