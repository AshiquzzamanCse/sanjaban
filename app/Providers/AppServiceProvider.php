<?php

namespace App\Providers;

use App\Models\Sites;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('sites')) {
            View::share('site', Sites::first());
        }

        Paginator::useBootstrap();

        Schema::defaultStringLength(191);

    }
}
