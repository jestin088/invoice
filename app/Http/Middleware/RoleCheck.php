<?php

namespace App\Http\Middleware;

use App\Constants\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if (!$role) $role = Role::ADMIN;

        if (!in_array($role, array_keys(Role::LABELS))) {
            Auth::logout();
            return redirect(route('login'));
        }

        if (Auth::user()->role !== $role) {
            abort(401);
        }

        return $next($request);
    }
}
