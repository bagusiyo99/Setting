<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
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
        // Mengambil data "setting" pertama
        $setting = Setting::first();
        // Membuat variabel global untuk data "setting"
        view()->share('global_setting', $setting);

        Paginator::useBootstrap();    }
}
