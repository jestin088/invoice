<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('isActiveMenu', function ($expression) {
            return "<?php if (strpos(url()->current(), $expression) !== false) echo 'active'; ?>";
        });

        // roleCheck directive
        // TODO - Can be improved by implementing in_array properly instead of ||
        Blade::directive('roleCheck', function ($expression) {
            $roles = explode(',', $expression);
            $phpString = "<?php if (";
            foreach ($roles as $index => $role) {
                if ($index !== 0) $phpString .= " || ";
                $phpString .= "Auth::user()->role === $role";
            }
            $phpString .= ") { ?>";
            return $phpString;
        });
        Blade::directive('endRoleCheck', function () {
            return "<?php } ?>";
        });
    }
}
