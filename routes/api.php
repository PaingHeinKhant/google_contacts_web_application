<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactApiController;
use App\Http\Controllers\PhotoApiController;
use App\Http\Controllers\ApiAuthController;

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


//Route::group(function(){
    Route::post("/register",[ApiAuthController::class,'register'])->name('api.register');
    Route::post("/login",[ApiAuthController::class,'login'])->name('api.login');



//    Route::middleware(['auth:sanctum'])->group(function (){
        Route::post("/logout",[ApiAuthController::class,'logout'])->name('api.logout');
    Route::post("/logout-all",[ApiAuthController::class,'logoutAll'])->name('api.logout-all');
        Route::get("/tokens",[ApiAuthController::class,'tokens'])->name('api.tokens');

        Route::delete("/multipleDestroy",[ContactApiController::class,"multipleDestroy"]);

        Route::apiResource('contacts',ContactApiController::class);
        Route::apiResource('photos',PhotoApiController::class);
//    });
//});



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
