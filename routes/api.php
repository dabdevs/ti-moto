<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});


Route::post('/register/passenger', [RegistrationController::class, 'registerPassenger'])->name('register.passenger');
Route::post('/register/driver', [RegistrationController::class, 'registerDriver'])->name('register.driver');


Route::resource('events', EventController::class);
Route::resource('passengers', PassengerController::class);



// Route::post('/rides/accept', [RideController::class, 'accept'])->middleware(['auth:sanctum', 'can:accept-ride']);
