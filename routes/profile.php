<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\JobPost\JobPostController;

// profile related all routes
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth','user']], function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('/');

    // Profile Resources
    Route::resource('profiles', ProfileController::class);

    // Update present info for job post.
    Route::get('profiles/{id}/edit-present-info', [JobPostController::class, 'edit_present_info'])->name('profiles.edit-present-info');
    Route::post('update-present-info', [JobPostController::class, 'update_present_info'])->name('update-present-info');
});
