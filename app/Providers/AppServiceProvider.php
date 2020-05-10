<?php

namespace App\Providers;

use App\Models\Guardian;
use App\Observers\GuardianObserver;
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
        Guardian::observe(GuardianObserver::class);
    }
}
