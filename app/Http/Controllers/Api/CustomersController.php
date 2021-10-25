<?php

namespace App\Http\Controllers\Api;

use App\Http\Contracts\Customers\CustomersServiceContract;
use App\Http\Contracts\General\BaseControllerContract;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller implements BaseControllerContract
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
     * @param CustomersServiceContract $customerService
     */
    public function __construct(CustomersServiceContract $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * List customers.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        try {
            $customers = $this->customerService->list(20, ['id', 'name', 'phone'], 'id', 'desc');
            return $this->jsonApiResponse(trans('messages.list_customers'), $customers, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->jsonApiResponse(trans('messages.list_customers'), $exception, Response::HTTP_BAD_REQUEST);
        }
    }
}
