<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Role;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $to = RouteServiceProvider::HOME;
        $role = Auth::user()->role;
        if ($role === Role::CUSTOMER) {
            $to = RouteServiceProvider::CUSTOMER_HOME;
        } else if ($role === Role::OWNER) {
            $to = RouteServiceProvider::OWNER_HOME;
        }

        return $to;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
