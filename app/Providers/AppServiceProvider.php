<?php

namespace App\Providers;

use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $CarritoUsuarioGlobal = Carrito::where('user_id', Auth::id())->first();
                $view->with('CarritoUsuarioGlobal', $CarritoUsuarioGlobal);
            } else {
                $view->with('CarritoUsuarioGlobal', null);
            }
        });
    }
}
