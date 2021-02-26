<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\HomeController::class, 'login_user'])->name('login_user');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\HomeController::class, 'create_account'])->name('create_account');

Route::group(['middleware' => ['session']], function(){
    Route::group(['middleware' => ['auth_faculty']], function(){
        Route::get('/faculty', function(){ return redirect('/faculty/section'); });
        Route::get('/faculty/section', [App\Http\Controllers\FacultyController::class, 'index'])->name('faculty_home');
        Route::get('/faculty/section/create', [App\Http\Controllers\FacultyController::class, 'createsection'])->name('faculty_createsection');
        Route::post('/faculty/section/create', [App\Http\Controllers\FacultyController::class, 'savesection'])->name('faculty_savesection');

        Route::get('/faculty/search', [App\Http\Controllers\FacultyController::class, 'search'])->name('faculty_seach');
        Route::get('/faculty/profile', [App\Http\Controllers\FacultyController::class, 'profile'])->name('faculty_profile');
    });
});