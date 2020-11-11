<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Modules\Renting\Models\Booking;
use App\Modules\Vehicles\Models\Vehicle;
use App\Modules\Vehicles\Models\Carimage;
use App\Modules\Renting\Models\CarSchedule;
use App\Observers\BookingObserver;
use App\Observers\CarscheduleObserver;
use App\Observers\VehicleObserver;
use App\Observers\CarimageObserver;

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
        Vehicle::observe(VehicleObserver::class);
        Carimage::observe(CarimageObserver::class);
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
