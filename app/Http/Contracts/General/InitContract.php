<?php

namespace App\Http\Contracts\General;

use Illuminate\Http\JsonResponse;

interface InitContract
{
    /**
     * List of countries.
     *
     * @return array
     */
    public function listCountries(): array;
}
