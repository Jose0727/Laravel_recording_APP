<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomUserLoginController;
use App\Http\Controllers\AdminController;
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

// Disable Registration System
// Auth::routes(['register' => false]);

Route::get('/login', [CustomUserLoginController::class, 'create']);
Route::post('/login', [CustomUserLoginController::class, 'store'])
                        ->name('login');
Route::get('/admin', [CustomUserLoginController::class, 'adminLogin']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [CustomUserLoginController::class, 'destroy']);
    Route::get('/', function () { return view('report'); });
    Route::get('/rec', function () { return view('rec'); });
    Route::get('/post', function () { return view('post'); });
    Route::get('/dashboard', function () { return view('dashboard'); });
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[AdminController::class, 'dashboard']);
});