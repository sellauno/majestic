<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard');
            } else if (auth()->user()->role == 'user') {
                return redirect('/dashboarduser');
            }
            // return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
