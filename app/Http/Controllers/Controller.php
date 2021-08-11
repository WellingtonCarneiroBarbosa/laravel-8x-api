<?php

namespace App\Http\Controllers;

use App\API\Methods\Responses\APIResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
}
