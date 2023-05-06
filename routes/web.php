<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RequestedOffController;
use App\Http\Controllers\WorkdayController;
use App\Http\Controllers\StoreAffiliationController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ShiftController;

Route::get('/', function () {
    return view('welcome');
});

// Employee routes
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

// RequestedOff routes
Route::get('/requested-offs', [RequestedOffController::class, 'index']);
Route::post('/requested-offs', [RequestedOffController::class, 'store']);
Route::put('/requested-offs/{id}', [RequestedOffController::class, 'update']);
Route::delete('/requested-offs/{id}', [RequestedOffController::class, 'destroy']);

// Workday routes
Route::get('/workdays', [WorkdayController::class, 'index']);
Route::post('/workdays', [WorkdayController::class, 'store']);
Route::put('/workdays/{id}', [WorkdayController::class, 'update']);
Route::delete('/workdays/{id}', [WorkdayController::class, 'destroy']);

// StoreAffiliation routes
Route::get('/store-affiliations', [StoreAffiliationController::class, 'index']);
Route::post('/store-affiliations', [StoreAffiliationController::class, 'store']);
Route::put('/store-affiliations/{id}', [StoreAffiliationController::class, 'update']);
Route::delete('/store-affiliations/{id}', [StoreAffiliationController::class, 'destroy']);

// Store routes
Route::get('/employee-store', [StoreController::class, 'index'])->name('stores.index');
Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
Route::put('/stores/{id}', [StoreController::class, 'update'])->name('stores.update');
Route::delete('/stores/{id}', [StoreController::class, 'destroy'])->name('stores.destroy');

// Shift routes
Route::get('/shifts', [ShiftController::class, 'index']);