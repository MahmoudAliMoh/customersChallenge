<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Countries\CountriesServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller
{
    /**
     * Response trait for specific responses.
     */
    use ResponseTrait;

    /**
     * @var CountriesServiceContract
     */
    protected $countriesService;

    /**
     * @param CountriesServiceContract $countriesService
     */
    public function __construct(CountriesServiceContract $countriesService)
    {
        $this->countriesService = $countriesService;
    }

    /**
     * Listing of countries.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        try {
            $countries = $this->countriesService->list(['id', 'name', 'code', 'regex'], 'id', 'desc');
            return $this->jsonApiResponse(trans('messages.list_countries'), $countries, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->jsonApiResponse(trans('messages.list_countries'), $exception, Response::HTTP_BAD_REQUEST);
        }
    }
}
