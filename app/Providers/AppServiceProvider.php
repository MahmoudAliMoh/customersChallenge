<?php

namespace App\Providers;

use App\Http\Contracts\Countries\CountriesContract;
use App\Http\Contracts\Countries\CountriesRepositoryContract;
use App\Http\Contracts\Countries\CountriesServiceContract;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Repositories\Countries\CountriesRepository;
use App\Http\Services\Countries\CountriesService;
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
        $this->app->bind(CountriesRepositoryContract::class, CountriesRepository::class);
        $this->app->bind(CountriesServiceContract::class, CountriesService::class);
        $this->app->bind(CountriesContract::class, CountriesController::class);
    }
}
