<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\URL::forceScheme('https');
        \Illuminate\Support\Facades\Route::redirect('/', '/home');
        \Illuminate\Support\Facades\Route::redirect('/home', '/dashboard');
        \Illuminate\Support\Facades\Route::redirect('/dashboard', '/admin/users');
        \Illuminate\Support\Facades\Route::redirect('/admin/users', '/admin/users');
    }
}
