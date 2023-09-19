<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsOrderManager
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->role != 'gestionnaire_commandes') {
            return redirect('/');
        }
        return $next($request);
    }
}

