<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//public routes

Route::get('/hotels', [HotelController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('reservations/create/{id}', [ReservationController::class, 'create']);
    Route::resource('reservations', 'ReservationController')->except('create');
    Route::post('/logout', [AuthController::class, 'logout']);
});;
