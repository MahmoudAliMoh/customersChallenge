<?php

namespace App\Http\Contracts\General;

use Illuminate\Http\JsonResponse;

interface BaseContract
{
    /**
     * List of countries.
     *
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(array $columns, string $orderBy, string $sortBy): array;
}
