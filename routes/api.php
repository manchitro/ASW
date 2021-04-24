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
    Route::post('/student/login', [App\Http\Controllers\StudentController::class, 'login']);
    Route::post('/student/sections', [App\Http\Controllers\StudentController::class, 'sections']);
    Route::post('/student/register', [App\Http\Controllers\StudentController::class, 'register']);
    Route::get('/student/logout', [App\Http\Controllers\StudentController::class, 'logout'])->middleware('auth:api');
    Route::post('/student/profile', [App\Http\Controllers\StudentController::class, 'profile']);

    Route::get('/student/test', [App\Http\Controllers\StudentController::class, 'test']);
});
