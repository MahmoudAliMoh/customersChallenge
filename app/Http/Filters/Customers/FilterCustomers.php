<?php

namespace App\Http\Filters\Customers;

use App\Http\Contracts\Customers\FilterCustomersContract;
use App\Http\Enums\Customers\PhoneValidity;

class FilterCustomers implements FilterCustomersContract
{
    /**
     * @param array $data
     * @param string $regex
     * @param int $state
     * @return array
     */
    public function apply(array $data, string $regex, int $state): array
    {
        $items = [];
        foreach ($data as $item) {
            if (preg_match($regex, $item['phone'])) {
                $item['state'] = PhoneValidity::VALID;
            } else {
                $item['state'] = PhoneValidity::INVALID;
            }
            array_push($items, $item);
        }
        return $items;
    }
}
