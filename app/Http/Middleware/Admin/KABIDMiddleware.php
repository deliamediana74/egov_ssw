<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class KABIDMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach (Auth::user()->role as $role) {
            if ($role->name == 'KABID' || $role->name == 'SUPER ADMIN') {
                return $next($request);
            }
        }
        return back()->withWarning('Anda bukan KABID / SUPER ADMIN!');
    }
}
