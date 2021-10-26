<?php

namespace App\Http\Contracts\Customers;

use Illuminate\Http\JsonResponse;

interface CustomersContract
{
    /**
     * Filter customers phone numbers.
     *
     * @return JsonResponse
     */
    public function numbersLookup(): JsonResponse;
}
