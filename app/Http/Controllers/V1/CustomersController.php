<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected Customer $customer;

    public function __construct()
    {
        $this->customer = new Customer;
    }

    /**
     * List all customers
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $authorized = $this->userHasPermissionTo($request->user_id, "view_many", $this->customer->entity_name);

        if($authorized) {
            return apiResponser()->messageResponse("OK");
        }

        return apiResponser()->userDoesNotHasPermissionToAction();
    }
}
