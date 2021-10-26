<?php

namespace App\Contracts\Customers;

interface FilterCustomersContract
{
    /**
     * @param array $data
     * @param string $regex
     * @param int $state
     * @return array
     */
    public function apply(array $data, string $regex, int $state): array;
}
