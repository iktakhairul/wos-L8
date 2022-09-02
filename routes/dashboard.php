<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Dashboard\UserController;

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth','dashboard']], function () {

    /**
     * Land to dashboard
     */
    Route::get('/', [DashboardController::class, 'dashboard'])->name('/');
    Route::post('/update-basic-info', [DashboardController::class, 'updateBasicInfo'])->name('update-basic-info');

    /**
     * User management
     */
	Route::resource('users', UserController::class);
    Route::get('users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
});
