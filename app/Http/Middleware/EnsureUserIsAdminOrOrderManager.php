<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdminOrOrderManager
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->role) {
            return redirect('/');
        }

        $role = Auth::user()->role->role;

        if ($role != 'admin' && $role != 'gestionnaire_commandes') {
            return redirect('/');
        }

        return $next($request);
    }
}

