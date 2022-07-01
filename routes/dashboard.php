<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Dashboard\UserController;
use App\Http\Controllers\Backend\Dashboard\UserReportController;
use App\Http\Controllers\Backend\Dashboard\ServiceCategoryController;


// dashboard routes
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
    Route::get('users/{id}/update-status', [UserController::class, 'update_status'])->name('users.update-status');
});
