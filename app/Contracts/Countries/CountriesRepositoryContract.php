<?php

namespace App\Contracts\Countries;

use App\Contracts\General\BaseContract;

interface CountriesRepositoryContract extends BaseContract
{
    /**
     * Find country by $id
     *
     * @param int $id
     * @param array $columns
     * @return array
     */
    public function show(int $id, array $columns): array;
}
