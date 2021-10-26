<?php

namespace App\Http\Controllers\Api;

use App\Http\Contracts\Countries\CountriesServiceContract;
use App\Http\Contracts\Customers\CustomersContract;
use App\Http\Contracts\Customers\CustomersServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller implements CustomersContract
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
     * @return JsonResponse
     */
    public function numbersLookup(): JsonResponse
    {
        $customers = $this->customerService->list(['name', 'phone'], 'id', 'desc');
        $countries = $this->countriesService->list(['name', 'code', 'regex'], 'id', 'desc');

        $mappedNumbers = $this->customerService->mapCustomerNumbers($customers, $countries);

        dd($mappedNumbers);
    }
}
