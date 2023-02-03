<?php

use App\Http\Controllers\CustomersController;
use App\Models\Customer;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Read
Route::get('customer', [CustomersController::class, 'index']);
Route::get('customer/{id}', [CustomersController::class, 'indexById']);

//Create update delete
Route::post('create_customer', [CustomersController::class, 'store']);
Route::put('update_customer/{id}', [CustomersController::class, 'update']);
Route::delete('delete_customer/{id}', [CustomersController::class, 'destroy']);