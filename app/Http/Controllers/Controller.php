<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UserPermission;
use App\API\Methods\Responses\APIResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, UserPermission;

    /**
     * API Responser
     *
     * @var App\API\Methods\Responses\APIResponse
     */
    public APIResponse $responser;

    /**
     * The Controller constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->responser = apiResponser();
    }

    /**
     * Get the items quantity to paginate a model
     *
     * @param Request $request
     * @return int
     */
    protected function rowsPerPage(Request $request): int
    {
        if($request->has('rows_per_page')) {
            $rows_per_page = (int) $request->rows_per_page;
        } else {
            $rows_per_page = 10;
        }

        return $rows_per_page;
    }
}
