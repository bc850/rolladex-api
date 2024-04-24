<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessCardsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# Public Routes
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

# Protected Routes
Route::group(["middleware" =>["auth:sanctum"]], function () {
    Route::resource("/businesscards", BusinessCardsController::class);
    Route::post("/logout", [AuthController::class, "logout"]);
});