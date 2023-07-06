<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HallsController;

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
Route::get('/hotels/halls', [HallsController::class, 'index']);
Route::get('/hotels/search/{name}', [HotelController::class, 'search']);

//protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Hoteli
    Route::post('/hotels', [HotelController::class, 'store']);
    //dodaj sobu
    Route::post('/hotels/halls', [HallsController::class, 'store']);
    //obrisi sobu
    Route::delete('/hotels/halls/{id}', [HallsController::class, 'destroy']);

    //rezervacije
    Route::get('reservations', [ReservationController::class, 'index']);
    // napravi rezervaciju
    Route::post('reservations', [ReservationController::class, 'store']);
    // prikazi odredjenu rezervaciju
    Route::get('reservations/{id}', [ReservationController::class, 'show']);
    // obrisi odredjenu rezervaciju
    Route::delete('reservations/{id}', [ReservationController::class, 'destroy']);
    // izmeni odredjenu rezervaciju
    Route::put('reservations/{id}', [ReservationController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});;
