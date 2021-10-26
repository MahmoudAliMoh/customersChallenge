<?php

namespace App\Http\Contracts\Countries;

use Illuminate\Http\JsonResponse;

interface CountriesContract
{
    /**
     * List of countries.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse;
}
