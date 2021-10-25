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
     * @param int $perPage
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(int $perPage, array $columns, string $orderBy, string $sortBy): array
    {
        return $this->countriesRepository->list($perPage, $columns, $orderBy, $sortBy);
    }
}
