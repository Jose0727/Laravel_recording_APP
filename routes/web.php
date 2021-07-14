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

// Disable Registration System
// Auth::routes(['register' => false]);


Route::get('/', function () { return view('index'); });
Route::get('/report', function () { return view('report'); });
Route::get('/rec', function () { return view('rec'); });
Route::get('/post', function () { return view('post'); });
Route::get('/admin', function () { return view('admin'); });
Route::get('/dashboard', function () { return view('dashboard'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');
