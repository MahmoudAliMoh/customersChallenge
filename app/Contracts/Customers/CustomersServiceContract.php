<?php

namespace App\Contracts\Customers;

use App\Contracts\General\BaseContract;

interface CustomersServiceContract extends BaseContract
{
    /**
     * Map customers phone numbers.
     *
     * @param array $customers
     * @param array $countries
     * @param array $request
     * @return array
     */
    public function mapCustomerNumbers(array $customers, array $countries, array $request): array;
}
