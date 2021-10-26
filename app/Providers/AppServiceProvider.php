<?php

namespace App\Providers;

use App\Http\Contracts\Countries\CountriesRepositoryContract;
use App\Http\Contracts\Countries\CountriesServiceContract;
use App\Http\Contracts\Customers\CustomersRepositoryContract;
use App\Http\Contracts\Customers\CustomersServiceContract;
use App\Http\Repositories\Countries\CountriesRepository;
use App\Http\Repositories\Customers\CustomersRepository;
use App\Http\Services\Countries\CountriesService;
use App\Http\Services\Customers\CustomersService;
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

        $this->app->bind(CustomersRepositoryContract::class, CustomersRepository::class);
        $this->app->bind(CustomersServiceContract::class, CustomersService::class);
    }
}
