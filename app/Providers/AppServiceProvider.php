<?php

namespace App\Providers;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\OffersServiceInterface;
use App\Contracts\UtillsServiceInterface;
use App\Contracts\VehiclesServiceInterface;
use App\Models\Load;
use App\Models\Offer;
use App\Models\Vehicle;
use App\Observers\LoadObserver;
use App\Observers\OfferObserver;
use App\Observers\VehicleObserver;
use App\Services\LoadsService;
use App\Services\OffersService;
use App\Services\UtillsService;
use App\Services\VehiclesService;
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
        $this->app->bind(LoadsServiceInterface::class, LoadsService::class);
        $this->app->bind(UtillsServiceInterface::class, UtillsService::class);
        $this->app->bind(OffersServiceInterface::class, OffersService::class);
        $this->app->bind(VehiclesServiceInterface::class, VehiclesService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Load::observe(LoadObserver::class);
        Offer::observe(OfferObserver::class);
        Vehicle::observe(VehicleObserver::class);
    }
}
