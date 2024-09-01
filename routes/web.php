<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\UpdateCustomerController;
use App\Http\Middleware\ValidUser;


//Welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Signup
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'processSignup'])->name('signup.process');

//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');




//AUTH BASED AUTHENTICATION
//DASHBOARD
// Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard')->middleware(ValidUser::class);


// //Add Customer
// Route::get('/add-customer', [AddCustomerController::class, 'showForm'])->name('add.customer.form')->middleware(ValidUser::class);
// Route::post('/add-customer', [AddCustomerController::class, 'storeCustomer'])->name('add.customer');

// //Delete Customer
// Route::delete('/customer/{id}', [AddCustomerController::class, 'destroy'])->name('delete.customer');

// //Update Customer
// Route::get('/customer/{id}/edit', [UpdateCustomerController::class, 'edit'])->name('edit.customer')->middleware(ValidUser::class);
// Route::put('/customer/{id}', [UpdateCustomerController::class, 'update'])->name('update.customer');





//Logout 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');







// Route::middleware(ValidUser::class)->group(function(){

//     Route::get('/add-customer', [AddCustomerController::class, 'showForm'])->name('add.customer.form');
//     Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');
//     Route::get('/customer/{id}/edit', [UpdateCustomerController::class, 'edit'])->name('edit.customer');

//     Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form')->withoutMiddleware(ValidUser::class);
// });




// Route::withoutMiddleware(ValidUser::class)->group(function(){

//     Route::get('/signup', [SignupController::class, 'showSignupForm']);
// });





//TOKEN BASED AUTHENTICATION
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');

    Route::get('/add-customer', [AddCustomerController::class, 'showForm'])->name('add.customer.form');
    Route::post('/add-customer', [AddCustomerController::class, 'storeCustomer'])->name('add.customer');

    Route::delete('/customer/{id}', [AddCustomerController::class, 'destroy'])->name('delete.customer');

    Route::get('/customer/{id}/edit', [UpdateCustomerController::class, 'edit'])->name('edit.customer');
    Route::put('/customer/{id}', [UpdateCustomerController::class, 'update'])->name('update.customer');
});