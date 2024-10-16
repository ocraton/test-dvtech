<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BreweryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {

    Route::post('login', 'login');

});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);

    Route::controller(BreweryController::class)->group(function () {

        Route::get('breweries', 'index');

    });

});
