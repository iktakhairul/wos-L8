<?php

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Dashboard\Categorization\GroupController;
use App\Http\Controllers\Backend\Dashboard\Categorization\CategoryController;
use App\Http\Controllers\Backend\Dashboard\Categorization\SubcategoryController;
use App\Http\Controllers\Backend\UserController;

// dashboard routes
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth','dashboard']], function () {
	// dashboard landing page
    Route::get('/', [DashboardController::class, 'dashboard'])->name('/');
    Route::post('/update-basic-info', [DashboardController::class, 'updateBasicInfo'])->name('update-basic-info');
    // users
	Route::resource('user', UserController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
});