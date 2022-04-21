<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

/*
Route::get('logout', [AuthController::class, 'logout'])->name('logout');*/
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');
//Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');


