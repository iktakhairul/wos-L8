<?php

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\UserController;

// dashboard routes
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth','dashboard']], function () {
	// dashboard landing page
    Route::get('/', [DashboardController::class, 'dashboard'])->name('/');
    Route::post('/update-basic-info', [DashboardController::class, 'updateBasicInfo'])->name('update-basic-info');
    // users
	Route::resource('user', UserController::class);
});