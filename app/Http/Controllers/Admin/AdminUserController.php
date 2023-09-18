<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\BlockedUserMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserUnblockedNotification;

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
}
