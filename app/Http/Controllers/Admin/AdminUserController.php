<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Mail\BlockedUserMail;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\UserUnblockedNotification;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('login', 'asc')->orderBy('email', 'asc')->paginate(20);
        return view('admin.user.index', [
            'users'    => $users,
            'resource' => 'Utilisateurs'
        ]);
    }

    public function indexDeletedUsers()
    {
        $users = User::onlyTrashed()->paginate(20);

        return view('admin.user.indexDeletedUsers', [
            'users'    => $users,
            'resource' => 'Utilisateurs Supprimés'
        ]);
    }

    public function show(string $id)
    {
        $user = User::find($id);

        return view('admin.user.show', [
            'user' => $user
        ]);
    }

    public function adminDestroy($id)
    {
        $user = User::find($id);

        // Verif if user exist
        if (!auth()->user() || auth()->user()->role->role !== 'admin') {
            return back()->with('error', 'Vous n\'avez pas les droits nécessaires pour effectuer cette action.');
        }


        // Before delete user i need delete every product that the user has
        foreach ($user->products as $product) {
            $product->delete();
        }

        // Before delete user i need delete every product in the cart that the user add
        $cart = $user->cart;
        if ($cart) {
            foreach ($cart->orders as $order) {
                $order->delete();
            }
        }
        $user->delete();

        return redirect()->route('admin.user.index')->with('status', 'Utilisateur supprimé avec succès.');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.user.index')->with('success', 'Utilisateur restauré avec succès!');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Serach user by login, firstname, lastname
        $users = User::where('login', 'LIKE', "$query%")->paginate(20);

        return view('admin.user.index', [
            'users'    => $users,
            'resource' => 'Résultats de la recherche pour : ' . $query
        ]);
    }

    public function searchDelete(Request $request)
    {
        $query = $request->input('query');

        // Search user by login, firstname, lastname
        $users = User::onlyTrashed()->where('login', 'LIKE', "$query%")->paginate(20);

        return view('admin.user.indexDeletedUsers', [
            'users'    => $users,
            'resource' => 'Résultats de la recherche pour : ' . $query
        ]);
    }

    public function showProductPerUser(string $id)
    {
        $user = User::with('products')->find($id);

        return view('admin.user.show', [
            'user' => $user
        ]);
    }

    public function toggleBlock(Request $request)
    {
        $user = User::find($request->user_id);
        $reason = $request->block_reason;

        $wasBlocked = $user->isBlocked;

        // Update the status of user
        $user->update(['isBlocked' => !$user->isBlocked]);

        if ($user->isBlocked && $reason) {
            $details = [
                'username' => $user->login,
                'reason' => $reason
            ];
            Mail::to($user->email)->send(new BlockedUserMail($details));
            return redirect()->back()->with('status', 'Utilisateur bloqué.');
        } elseif (!$user->isBlocked && $wasBlocked) {
            $user->notify(new UserUnblockedNotification());
            return redirect()->back()->with('status', 'Utilisateur débloqué.');
        }

        return redirect()->back();
    }

    /**
     * Display form for create new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string', 'max:60', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()],
            'street' => ['required', 'string', 'max:60'],
            'number' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:60'],
            'municipalitie' => ['nullable', 'string', 'max:60'],
            'postal_code' => ['required', 'string', 'max:15'],
            'phone' => ['required', 'string', 'max:60'],
        ]);

        $user = Auth::user();

        $roleId = $request->input('role');

        $role = Role::findOrFail($roleId);

        $address = Address::create([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'municipalitie' => $request->municipalitie,
            'postal_code' => $request->postal_code,
        ]);

        $address->save();

        $user = User::create([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'role_id' => $role->id,
            'address_id' => $address->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_image' => 'images/default.jpg',
            'isBlocked' => false,
        ]);

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }
}
