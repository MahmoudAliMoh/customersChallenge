<?php

namespace App\Http\Contracts\General;

use Illuminate\Http\JsonResponse;

interface BaseControllerContract
{
    /**
     * List of countries.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse;
}
