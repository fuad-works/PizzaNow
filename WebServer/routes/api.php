<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/get_products', [ApiController::class, 'get_products']);
Route::middleware('auth:sanctum')->get('/my_orders', [ApiController::class, 'my_orders']);
Route::middleware('auth:sanctum')->post('/order', [ApiController::class, 'order']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
