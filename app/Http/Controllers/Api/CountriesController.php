<?php

namespace App\Http\Controllers\Api;

use App\Http\Contracts\Countries\CountriesContract;
use App\Http\Contracts\Countries\CountriesServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller implements CountriesContract
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
        $countries = $this->countriesService->list(20, ['id', 'name', 'code', 'regex'], 'id', 'desc');
        return $this->jsonApiResponse(trans('messages.list_countries'), $countries, Response::HTTP_OK);
    }
}
