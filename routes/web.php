<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\ReportController;

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

Route::middleware('guest', 'guest:employee')->group(function () {
    // login page
    Route::resource('login', LoginController::class);
    // register page
    Route::resource('register', RegisterController::class);
});

Route::middleware(['authGuards'])->group(function () {
    
    Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['employee_or_admin']], function () {
        
        // dashboard
        Route::resource('dashboard', DashboardController::class);
                
    });
    
    // report
    Route::get('laporan_kamu', [ReportController::class, 'your_report'])->name('laporan_kamu');
    Route::resource('lapor', ReportController::class);
    
    // logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});