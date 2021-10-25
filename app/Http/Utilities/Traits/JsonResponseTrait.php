<?php

namespace App\Http\Utilities\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

trait JsonResponseTrait
{
    /**
     * Return API response with message, data and status code.
     *
     * @param $message
     * @param $data
     * @param $code
     * @return JsonResponse
     */
    public function jsonApiResponse($message, $data, $code): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $code,
            'response' => $data,
        ])->setStatusCode($code);
    }
}
