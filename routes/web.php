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
Route::get('/drivers', [App\Http\Controllers\Admin\DriversController::class, 'index'])->name('drivers');
Route::get('/drivers/add', [App\Http\Controllers\Admin\DriversController::class, 'create'])->name('addDriver');
Route::post('/drivers/add', [App\Http\Controllers\Admin\DriversController::class, 'store'])->name('addDriver');

Route::get('/drivers/edit/{id}', [App\Http\Controllers\Admin\DriversController::class, 'edit'])->name('edit_driver');
Route::post('/drivers/update', [App\Http\Controllers\Admin\DriversController::class, 'update'])->name('update_driver');
Route::get('/drivers/{id}', [App\Http\Controllers\Admin\DriversController::class, 'destroy'])->name('del_driver');

// Companies routes

Route::get('/companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('companies');
Route::get('/companies/add', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('addCompanies');
Route::get('/companies/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('edit');
Route::post('/companies/update', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('update');

Route::post('/companies/add', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('addCompanies');
Route::get('/companies/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'destroy'])->name('del_company');

// cars module

Route::get('/vehicles', [App\Http\Controllers\Admin\VehiclesController::class, 'index'])->name('vehicles');
Route::get('/vehicles/add', [App\Http\Controllers\Admin\VehiclesController::class, 'create'])->name('addVehicle');
Route::get('/vehicles/edit/{id}', [App\Http\Controllers\Admin\VehiclesController::class, 'edit'])->name('editVehicle');
Route::post('/companies/update', [App\Http\Controllers\Admin\VehiclesController::class, 'update'])->name('updateVehicle');
Route::post('/companies/assign', [App\Http\Controllers\Admin\VehiclesController::class, 'update'])->name('assignVehicle');
Route::post('/vehicles/add', [App\Http\Controllers\Admin\VehiclesController::class, 'store'])->name('addVehicle');
Route::get('/vehicles/{id}', [App\Http\Controllers\Admin\VehiclesController::class, 'destroy'])->name('del_vehicle');


