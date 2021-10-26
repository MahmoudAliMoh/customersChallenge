<?php

namespace App\Services\Customers;

use App\Contracts\Countries\CountriesRepositoryContract;
use App\Contracts\Customers\CustomersRepositoryContract;
use App\Contracts\Customers\CustomersServiceContract;
use App\Contracts\Customers\FilterCustomersContract;
use App\Transformers\Customers\CustomersTransformer;

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
     * @var CountriesRepositoryContract
     */
    protected $countriesRepository;

    /**
     * @var FilterCustomersContract
     */
    protected $filterCustomers;

    /**
     * @param CustomersRepositoryContract $customersRepository
     * @param CustomersTransformer $transformer
     * @param CountriesRepositoryContract $countriesRepository
     * @param FilterCustomersContract $filterCustomers
     */
    public function __construct(
        CustomersRepositoryContract $customersRepository,
        CustomersTransformer        $transformer,
        CountriesRepositoryContract $countriesRepository,
        FilterCustomersContract     $filterCustomers
    ) {
        $this->customersRepository = $customersRepository;
        $this->transformer = $transformer;
        $this->countriesRepository = $countriesRepository;
        $this->filterCustomers = $filterCustomers;
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
        $mappedData = $this->transformer->transform($customers, $countries);
        if (!empty($request['country_id']) || $request['state']) {
            $countryRegex = $this->countriesRepository->show($request['country_id'], ['regex']);
            return $this->filterCustomers->apply($mappedData, $countryRegex['regex'], $request['state']);
        }
        return $mappedData;
    }
}
