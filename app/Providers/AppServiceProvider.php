<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Modules\Renting\Models\Booking;
use App\Modules\Renting\Models\CarSchedule;
use App\Observers\BookingObserver;
use App\Observers\CarscheduleObserver;

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
        Booking::observe(BookingObserver::class);
        CarSchedule::observe(CarscheduleObserver::class);
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
