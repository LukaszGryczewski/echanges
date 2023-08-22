<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /** Verif id the user is admin if not he is redirect to welcome page */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->role != 'admin') {

            return redirect('/');
        }

        return $next($request);
    }
}
