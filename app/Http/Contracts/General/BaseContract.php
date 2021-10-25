<?php

namespace App\Http\Contracts\General;

use Illuminate\Http\JsonResponse;

interface BaseContract
{
    /**
     * List of countries.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return array
     */
    public function list(int $perPage, array $columns, string $orderBy, string $sortBy): array;
}
