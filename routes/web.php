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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/google',[\App\Http\Controllers\GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [\App\Http\Controllers\GoogleController::class, 'callbackGoogle'])->name('google-callback');

Route::get('auth/facebook', [\App\Http\Controllers\FacebookController::class, 'redirect'])->name('facebook-auth');
Route::get('auth/facebook/call-back', [\App\Http\Controllers\FacebookController::class, 'callbackFacebook'])->name('facebook-callback');
