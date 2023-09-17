<?php

namespace App\Providers;

use App\Models\Pengaturan;
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
    //   // Mengambil data "About" pertama
    //     $pengaturan = Pengaturan::first();

    //     // Membuat variabel global untuk data "pengaturan"
    //     view()->share('global_pengaturan', $pengaturan);
       }
}
