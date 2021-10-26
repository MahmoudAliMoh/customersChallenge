<?php

namespace App\Http\Services\Customers;

use App\Http\Contracts\Countries\CountriesRepositoryContract;
use App\Http\Contracts\Customers\CustomersRepositoryContract;
use App\Http\Contracts\Customers\CustomersServiceContract;
use App\Http\Transformers\Customers\CustomersTransformer;

class CustomersService implements CustomersServiceContract
{
    /**
     * @var CustomersRepositoryContract
     */
    protected $customersRepository;

    /**
     * @var CustomersTransformer
     */
    protected $transformer;

    /**
     * @param CustomersRepositoryContract $customersRepository
     * @param CustomersTransformer $transformer
     */
    public function __construct(
        CustomersRepositoryContract $customersRepository,
        CustomersTransformer $transformer
    )
    {
        $this->customersRepository = $customersRepository;
        $this->transformer = $transformer;
    }

    /**
     * List customers.
     *
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(array $columns, string $orderBy, string $sortBy): array
    {
        return $this->customersRepository->list($columns, $orderBy, $sortBy);
    }

    /**
     * List mapped phone numbers with country codes.
     *
     * @param array $customers
     * @param array $countries
     * @param array $request
     * @return array
     */
    public function mapCustomerNumbers(array $customers, array $countries, array $request): array
    {
        return $this->transformer->transform($customers, $countries);
    }
}
