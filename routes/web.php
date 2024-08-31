<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\UpdateCustomerController;
use App\Http\Middleware\ValidUser;


//Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Signup routes
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'processSignup'])->name('signup.process');

//Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');

// //Dashboard routes
// Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');

//Add Customer form route
Route::get('/add-customer', [AddCustomerController::class, 'showForm'])->name('add.customer.form')->middleware(ValidUser::class);
Route::post('/add-customer', [AddCustomerController::class, 'storeCustomer'])->name('add.customer');

//DASHBOARD
Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard')->middleware(ValidUser::class);

//Delete customer route
Route::delete('/customer/{id}', [AddCustomerController::class, 'destroy'])->name('delete.customer');

//Edit Customer routes
Route::get('/customer/{id}/edit', [UpdateCustomerController::class, 'edit'])->name('edit.customer')->middleware(ValidUser::class);
Route::put('/customer/{id}', [UpdateCustomerController::class, 'update'])->name('update.customer');


//Logout 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
