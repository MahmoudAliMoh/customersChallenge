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
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(array $columns, string $orderBy, string $sortBy): array
    {
        return $this->all($columns, $orderBy, $sortBy);
    }

    /**
     * @param int $id
     * @param array $columns
     * @return array
     */
    public function show(int $id, array $columns): array
    {
        return $this->find($id, $columns);
    }
}
