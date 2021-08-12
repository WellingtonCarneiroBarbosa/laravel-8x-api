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
    });

});


Route::get('/', function () {
    return apiResponser()->messageResponse("Hello World!");
});
