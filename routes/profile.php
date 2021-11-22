<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\Business\BusinessController;
use App\Http\Controllers\Frontend\User\JobPost\JobPostController;

// profile related all routes
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth','user']], function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('/');
    Route::get('/address', [ProfileController::class, 'address'])->name('address');
    Route::get('/orders', [ProfileController::class, 'orders'])->name('orders');
    Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('wishlist');
    Route::get('/selling', [ProfileController::class, 'selling'])->name('selling');
    Route::get('/setting', [ProfileController::class, 'setting'])->name('setting');
    // business
    Route::resource('businesses', BusinessController::class);

    // Profile Resources
    Route::resource('profiles', ProfileController::class);

    // Update present info for job post.
    Route::get('profiles/{id}/edit-present-info', [JobPostController::class, 'edit_present_info'])->name('profiles.edit-present-info');
    Route::post('update-present-info', [JobPostController::class, 'update_present_info'])->name('update-present-info');
});
