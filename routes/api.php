<?php

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

Route::delete('/integration/delete/{id}',[App\Http\Controllers\IntegrationController::class,'deleted']);
Route::post('/integration',[App\Http\Controllers\IntegrationController::class,'create']);
Route::put('/integration/update/{id}',[App\Http\Controllers\IntegrationController::class,'update']);

Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



