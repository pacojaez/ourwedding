<?php

namespace App\Providers;

use App\Models\Adress;
use App\Models\Novio;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        View::share('adress', Adress::first());
        View::share('novio', Novio::where('novio', 'like', TRUE)->firstOrFail());
        View::share('novia', Novio::where('novia', 'like', TRUE)->firstOrFail());
    }
}
