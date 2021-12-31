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
    return view('welcome');
});


// Admin and Super Admin Auth routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Admin and Super Admin Dashboard routes

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::get('/drivers', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('drivers');
Route::get('/drivers/add', [App\Http\Controllers\Admin\DriversController::class, 'create'])->name('addDriver');
Route::post('/drivers/add', [App\Http\Controllers\Admin\DriversController::class, 'store'])->name('addDriver');


