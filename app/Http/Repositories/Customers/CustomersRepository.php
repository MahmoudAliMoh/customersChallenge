<?php

namespace App\Http\Repositories\Customers;

use App\Http\Contracts\Customers\CustomersRepositoryContract;
use App\Http\Utilities\Traits\BaseOperationsTrait;
use App\Models\Customer;

class CustomersRepository implements CustomersRepositoryContract
{
    /**
     * Trait of base CRUD operations.
     */
    use BaseOperationsTrait;

    /**
     * @var Customer $model
     */
    protected $model;

    /**
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * List all customers with specified columns.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(int $perPage, array $columns, string $orderBy, string $sortBy): array
    {
        return $this->paginate($perPage, $columns, $orderBy, $sortBy);
    }

}
