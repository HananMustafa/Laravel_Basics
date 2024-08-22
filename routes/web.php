<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\UpdateCustomerController;

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

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Signup routes
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'processSignup'])->name('signup.process');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');

// Dashboard routes
Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');

// Add Customer form route
Route::get('/add-customer', [AddCustomerController::class, 'showForm'])->name('add.customer.form');
Route::post('/add-customer', [AddCustomerController::class, 'storeCustomer'])->name('add.customer');

// Display customers on dashboard
Route::get('/dashboard', [AddCustomerController::class, 'showDashboard'])->name('dashboard');

// Delete customer route
Route::delete('/customer/{id}', [AddCustomerController::class, 'destroy'])->name('delete.customer');

// Edit Customer routes
Route::get('/customer/{id}/edit', [UpdateCustomerController::class, 'edit'])->name('edit.customer');
Route::put('/customer/{id}', [UpdateCustomerController::class, 'update'])->name('update.customer');
