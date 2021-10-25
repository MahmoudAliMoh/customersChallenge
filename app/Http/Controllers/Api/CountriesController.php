<?php

namespace App\Http\Controllers\Api;

use App\Http\Contracts\Countries\CountriesContract;
use App\Http\Contracts\Countries\CountriesServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller implements CountriesContract
{
    use JsonResponseTrait;

    /**
     * @var CountriesServiceContract $countriesService
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
    public function listCountries(): JsonResponse
    {
        $countries = $this->countriesService->listCountries();
        return $this->jsonApiResponse(trans('messages.list_countries'), $countries, Response::HTTP_OK);
    }
}
