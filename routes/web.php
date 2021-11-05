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
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth'); 

// Authenticated routes
Route::get('/', [DashboardController::class, 'index'])->middleware('auth'); 
Route::get('/establishments/{id}', [DashboardController::class, 'getEstablishments'])->where('id', '[0-9]+')->middleware('auth'); 
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth'); 

