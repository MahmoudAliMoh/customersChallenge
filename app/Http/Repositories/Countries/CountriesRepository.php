<?php

namespace App\Http\Repositories\Countries;

use App\Http\Contracts\Countries\CountriesRepositoryContract;
use App\Http\Utilities\Traits\BaseOperationsTrait;
use App\Models\Country;

class CountriesRepository implements CountriesRepositoryContract
{
    /**
     * Trait of base CRUD operations.
     */
    use BaseOperationsTrait;

    /**
     * @var Country $model
     */
    protected $model;

    /**
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    /**
     * List all countries with specified columns.
     *
     * @return array
     */
    public function listCountries(): array
    {
        return $this->all(['id', 'name', 'code', 'regex']);
    }

}
