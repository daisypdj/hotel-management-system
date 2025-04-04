<?php

namespace App\Providers;

use App\Models\Hotel;
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
        view()->composer('layouts.backoffice.hotel.header-hotel', function ($view) {
            $hotel=Hotel::where('user_id',auth()->user()->id)->first();
            $view->with('hotel', $hotel);
        });
    }
}
