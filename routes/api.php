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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [App\Http\Controllers\StudentController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\StudentController::class, 'register']);
    Route::get('/logout', [App\Http\Controllers\StudentController::class, 'logout'])->middleware('auth:api');
    Route::get('/test', [App\Http\Controllers\StudentController::class, 'test']);
});
