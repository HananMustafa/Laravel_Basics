<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'processSignup'])->name('signup.process');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');

Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');