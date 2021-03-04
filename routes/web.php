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
        Route::get('/faculty/section/{sectionid}/students', [App\Http\Controllers\FacultyController::class, 'sectionstudents'])->name('faculty_students');
        Route::get('/faculty/section/{sectionid}/students/add', [App\Http\Controllers\FacultyController::class, 'addstudent'])->name('faculty_addstudent');
        Route::post('/faculty/section/{sectionid}/students/add', [App\Http\Controllers\FacultyController::class, 'savestudent'])->name('faculty_savestudent');
        Route::get('/faculty/section/{sectionid}/lectures', [App\Http\Controllers\FacultyController::class, 'sectionlectures'])->name('faculty_lectures');
        Route::get('/faculty/section/{sectionid}/lectures/add', [App\Http\Controllers\FacultyController::class, 'addlecture'])->name('faculty_addlecture');
        Route::post('/faculty/section/{sectionid}/lectures/add', [App\Http\Controllers\FacultyController::class, 'savelecture'])->name('faculty_savelecture');
        Route::get('/faculty/section/{sectionid}/edit', [App\Http\Controllers\FacultyController::class, 'sectionedit'])->name('faculty_editsection');
        Route::post('/faculty/section/{sectionid}/edit', [App\Http\Controllers\FacultyController::class, 'savechangessection'])->name('faculty_savechangessection');

        Route::get('/faculty/search', [App\Http\Controllers\FacultyController::class, 'search'])->name('faculty_seach');
        Route::get('/faculty/profile', [App\Http\Controllers\FacultyController::class, 'profile'])->name('faculty_profile');
        Route::get('/faculty/async/togglerightmenustate', [App\Http\Controllers\FacultyController::class, 'togglerightmenustate'])->name('togglerightmenustate');
    });
});