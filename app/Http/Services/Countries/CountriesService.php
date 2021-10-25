<?php

namespace App\Http\Services\Countries;

use App\Http\Contracts\Countries\CountriesRepositoryContract;
use App\Http\Contracts\Countries\CountriesServiceContract;

class CountriesService implements CountriesServiceContract
{
    /**
     * @var CountriesRepositoryContract $countriesRepository
     */
    protected $countriesRepository;

    /**
     * @param CountriesRepositoryContract $countriesRepository
     */
    public function __construct(CountriesRepositoryContract $countriesRepository)
    {
        $this->countriesRepository = $countriesRepository;
    }

    /**
     * List of countries.
     *
     * @return array
     */
    public function listCountries(): array
    {
        return $this->countriesRepository->listCountries();
    }
}
