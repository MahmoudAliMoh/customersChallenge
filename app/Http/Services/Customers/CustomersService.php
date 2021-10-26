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
     * @return array
     */
    public function mapCustomerNumbers(array $customers, array $countries): array
    {
        $mappedNumbers = [];

        foreach ($customers as $customer) {
            list($code, $number) = explode(' ', $customer['phone']);
            $phoneCode = str_replace(array('(', ')'), '', $code);

            foreach ($countries as $country) {
                if ($country['code'] == $phoneCode) {
                    $map['country'] = $country['name'];
                    $map['code'] = $phoneCode;
                    $map['phone'] = $number;
                    array_push($mappedNumbers, $map);
                }
            }
        }

        return  $mappedNumbers;
    }
}
