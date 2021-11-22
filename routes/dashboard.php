<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Dashboard\UserController;
use App\Http\Controllers\Backend\Dashboard\UserReportController;
use App\Http\Controllers\Backend\Dashboard\ServiceCategoryController;


// dashboard routes
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth','dashboard']], function () {

	// dashboard landing page
    Route::get('/', [DashboardController::class, 'dashboard'])->name('/');
    Route::post('/update-basic-info', [DashboardController::class, 'updateBasicInfo'])->name('update-basic-info');

    // User
	Route::resource('users', UserController::class);
    Route::get('users/{id}/update-status', [UserController::class, 'update_status'])->name('users.update-status');

    // Service Category
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::get('service-categories/{id}/update-status', [ServiceCategoryController::class, 'update_status'])->name('service-categories.update-status');

    // User Report
    Route::get('reports/job-post-reports', [UserReportController::class, 'job_post_reports'])->name('reports.job-post-reports');
    Route::get('reports/job-owner-reports', [UserReportController::class, 'job_owner_reports'])->name('reports.job-owner-reports');
    Route::get('reports/job-worker-reports', [UserReportController::class, 'job_worker_reports'])->name('reports.job-worker-reports');
});
