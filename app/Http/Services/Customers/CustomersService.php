<?php

namespace App\Http\Services\Customers;

use App\Http\Contracts\Customers\CustomersRepositoryContract;
use App\Http\Contracts\Customers\CustomersServiceContract;

class CustomersService implements CustomersServiceContract
{
    /**
     * @var CustomersRepositoryContract
     */
    protected $customersRepository;

    /**
     * @param CustomersRepositoryContract $customersRepository
     */
    public function __construct(CustomersRepositoryContract $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }

    /**
     * List customers.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(int $perPage, array $columns, string $orderBy, string $sortBy): array
    {
        return $this->customersRepository->list($perPage, $columns, $orderBy, $sortBy);
    }
}
