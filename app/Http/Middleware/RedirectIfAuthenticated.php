<?php

namespace App\Http\Middleware;

use App\Constants\Role;
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
            $role = Auth::user()->role;
            $redirectTo = RouteServiceProvider::HOME;
            if ($role === Role::OWNER) {
                $redirectTo = RouteServiceProvider::OWNER_HOME;
            } else if ($role === Role::CUSTOMER) {
                $redirectTo = RouteServiceProvider::CUSTOMER_HOME;
            }
            return redirect($redirectTo);
        }

        return $next($request);
    }
}
