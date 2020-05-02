<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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

        if (getLocale() == "ar") {
            setlocale(LC_TIME, 'ar_AR');
            Carbon::setLocale('ar');
        } else {
            setlocale(LC_TIME, 'en_EN');
            Carbon::setLocale('en');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../Helpers/functions.php';
        require_once __DIR__ . '/../Helpers/constants.php';
    }
}
