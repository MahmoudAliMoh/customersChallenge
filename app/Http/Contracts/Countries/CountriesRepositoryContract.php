<?php

namespace App\Http\Contracts\Countries;

use App\Http\Contracts\General\BaseContract;

interface CountriesRepositoryContract extends BaseContract
{
    /**
     * Find country by $id
     *
     * @param int $id
     * @param array $columns
     * @return array
     */
    public function show(int $id, array $columns):array;
}
