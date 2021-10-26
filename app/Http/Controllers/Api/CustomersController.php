<?php

namespace App\Http\Controllers\Api;

use App\Http\Contracts\Countries\CountriesServiceContract;
use App\Http\Contracts\Customers\CustomersServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller
{
    /**
     * Response trait for specific responses.
     */
    use ResponseTrait;

    /**
     * @var CustomersServiceContract
     */
    protected $customerService;

    /**
     * @var CountriesServiceContract
     */
    protected $countriesService;

    /**
     * @param CustomersServiceContract $customerService
     * @param CountriesServiceContract $countriesService
     */
    public function __construct(CustomersServiceContract $customerService, CountriesServiceContract $countriesService)
    {
        $this->customerService = $customerService;
        $this->countriesService = $countriesService;
    }

    /**
     * Filter customer phone numbers by country code and validity.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function numbersLookup(Request $request): JsonResponse
    {
        try {
            $customers = $this->customerService->list(['name', 'phone'], 'id', 'desc');
            $countries = $this->countriesService->list(['id', 'name', 'code', 'regex'], 'id', 'desc');
            $mappedNumbers = $this->customerService->mapCustomerNumbers($customers, $countries, $request->all());

            return $this->jsonApiResponse(trans('messages.list_customers_numbers'), $mappedNumbers, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->jsonApiResponse(trans('messages.list_customers_numbers'), $exception, Response::HTTP_BAD_REQUEST);
        }
    }
}
