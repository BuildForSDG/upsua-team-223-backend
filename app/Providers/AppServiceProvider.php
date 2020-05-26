<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::if('basic', function () {
            return auth()->check() && (auth()->user()->userable_type === 'App\\BasicAccount' || auth()->user()->userable_type === 'App\\BusinessAccount' || auth()->user()->userable_type === 'App\\PartnerAccount');
        });
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->userable_type === 'App\\AdminAccount';
        });
        Blade::if('business', function () {
            return auth()->check() && (auth()->user()->userable_type === 'App\\BusinessAccount' || auth()->user()->userable_type === 'App\\PartnerAccount');
        });
        Blade::if('partner', function () {
            return auth()->check() && auth()->user()->userable_type === 'App\\PartnerAccount';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
