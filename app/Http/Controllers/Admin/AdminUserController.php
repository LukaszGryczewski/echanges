<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.user.index', [
            'users'    => $users,
            'resource' => 'Utilisateurs'
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

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Serach user by login, firstname, lastname
        $users = User::where('login', 'LIKE', "%$query%")
            ->orWhere('firstname', 'LIKE', "%$query%")
            ->orWhere('lastname', 'LIKE', "%$query%")
            ->paginate(20);

        return view('admin.user.index', [
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
}
