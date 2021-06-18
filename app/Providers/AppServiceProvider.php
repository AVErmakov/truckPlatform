<?php

namespace App\Providers;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\UtillsServiceInterface;
use App\Services\LoadsService;
use App\Services\UtillsService;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
