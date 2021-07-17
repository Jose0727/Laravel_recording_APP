<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomUserLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserReportController;
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
    // Route::get('/logout', [CustomUserLoginController::class, 'destroy']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
//user report
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('report.report');
    });
    Route::get('/rec', function () {
        return view('report.rec');
    });
    Route::get('/post', function () {
        return view('report.post');
    });
    Route::post('/audio-report', [UserReportController::class, 'audioReport']);
    Route::post('/text-report', [UserReportController::class, 'textReport']);
});
//admin
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::delete('/report/{report}', [UserReportController::class, 'destroy'])->name('report.destroy');
    Route::get('/report/download/{report}', [UserReportController::class, 'download'])->name('report.download');
});
