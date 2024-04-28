<?php

use App\Http\Controllers\Api\BookStoreApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->middleware(['throttle', 'auth:sanctum'])->group(function () {
    Route::post('/order-book', [BookStoreApiController::class, 'orderBook']);
    Route::delete('/cancel-order/{id}', [BookStoreApiController::class, 'cancelOrder']);
    Route::get('my-order', [BookStoreApiController::class, 'myOrder']);

});
Route::get('books', [BookStoreApiController::class, 'getBooks']);
Route::post('login', [BookStoreApiController::class, 'login']);
