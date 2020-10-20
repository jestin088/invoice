<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class BladeAcl
{

    public static function getRoute($routeName)
    {
        return strtolower(Auth::user()->role) . '.' . $routeName;
    }
}
