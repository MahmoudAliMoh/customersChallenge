<?php

namespace App\Repositories\Customers;

use App\Contracts\Customers\CustomersRepositoryContract;
use App\Utilities\Traits\BaseOperationsTrait;
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
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(array $columns, string $orderBy, string $sortBy): array
    {
        return $this->all($columns, $orderBy, $sortBy);
    }
}
