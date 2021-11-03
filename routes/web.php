<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;

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

// Login routes
Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login'])->name('auth'); 


// Authenticated responses
if (Auth::check()) {
}
    Route::get('/', [DashboardController::class, 'index']); 

// Get external route with number validation if not validate return 404
    Route::get('/establishments/{id}', [DashboardController::class, 'getEstablishments'])->where('id', '[0-9]+');; 

    Route::get('logout', [AuthController::class, 'logout']); 
{
    // If not logged on return to login page
    return redirect()->intended('login');
}

