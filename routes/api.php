<?php

use App\Http\Controllers\V1\CustomersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('contains-user-id')->group(function () {
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomersController::class, 'index']);
        Route::post('/', [CustomersController::class, 'store']);

        Route::prefix("/{customer_id}")->group(function () {
            Route::get("/", [CustomersController::class, 'show']);
            Route::put("/", [CustomersController::class, 'update']);
            Route::delete("/", [CustomersController::class, 'destroy']);
        });
    });

});


Route::get('/', function () {
    return apiResponser()->messageResponse("Hello World!");
});
