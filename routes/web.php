<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('/', LandingController::class);

Route::middleware(['guest'])->group(function () {
    // login page
    Route::resource('login', LoginController::class);
    // register page
    Route::resource('register', RegisterController::class);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('lapor', ReportController::class);
    
    // logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Route::get('/', function () {
//     return view('pages.index');
// });

// Route::get('/login', function () {
//     return view('pages.auth.login');
// });

// Route::get('/register', function () {
//     return view('pages.auth.register');
// });