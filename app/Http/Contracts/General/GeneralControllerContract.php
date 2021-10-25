<?php

namespace App\Http\Contracts\General;

use Illuminate\Http\JsonResponse;

interface GeneralControllerContract
{
    /**
     * List of countries.
     *
     * @return JsonResponse
     */
    public function listCountries(): JsonResponse;
}
