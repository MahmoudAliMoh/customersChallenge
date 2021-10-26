<?php

namespace App\Http\Contracts\Customers;

use Illuminate\Http\JsonResponse;

interface FilterContract
{
    /**
     * Apply filter on customer columns.
     *
     * @return mixed
     */
    public function applyFilter();
}
