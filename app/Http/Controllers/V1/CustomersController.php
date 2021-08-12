<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customers\Store;
use App\Http\Requests\V1\Customers\Update;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $permission_check = $this->denyIfDoesNotHasPermission($request->auth_user_id, "view_many", $this->customer->entity_name);

        if(! $permission_check['passes']) {
            return $permission_check['deny'];
        }

        $customers = Customer::paginate($this->rowsPerPage($request));

        return apiResponser()->response($customers->toArray());
    }

    /**
     * Store a new customer
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Store $request): JsonResponse
    {
        $permission_check = $this->denyIfDoesNotHasPermission($request->auth_user_id, "create", $this->customer->entity_name);

        if(! $permission_check['passes']) {
            return $permission_check['deny'];
        }

        $data = $request->validated();

        $customer = $this->customer->create($data);

        return apiResponser()->response($customer->toArray(), __('messages.customers.created'), Response::HTTP_CREATED);
    }

    /**
     * Show a customer data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $permission_check = $this->denyIfDoesNotHasPermission($request->auth_user_id, "view", $this->customer->entity_name);

        if(! $permission_check['passes']) {
            return $permission_check['deny'];
        }

        $this->customer = Customer::findOrFail($request->route('customer_id'));

        return apiResponser()->response($this->customer->toArray());
    }

    /**
     * Update a customer data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Update $request): JsonResponse
    {
        $permission_check = $this->denyIfDoesNotHasPermission($request->auth_user_id, "edit", $this->customer->entity_name);

        if(! $permission_check['passes']) {
            return $permission_check['deny'];
        }

        $data = $request->validated();

        $this->customer = Customer::findOrFail($request->route('customer_id'));

        $this->customer->update($data);

        return apiResponser()->response($this->customer->toArray(), __('messages.customers.updated'));
    }

    /**
     * Delete a customer data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $permission_check = $this->denyIfDoesNotHasPermission($request->auth_user_id, "delete", $this->customer->entity_name);

        if(! $permission_check['passes']) {
            return $permission_check['deny'];
        }

        $customer = Customer::findOrFail($request->route('customer_id'));

        $this->customer = $customer;

        $this->customer->delete();

        return apiResponser()->response($customer->toArray(), __('messages.customers.deleted'));
    }
}
