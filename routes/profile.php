<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\Business\BusinessController;
use App\Http\Controllers\Frontend\User\JobPost\JobPostController;
use App\Http\Controllers\Frontend\User\JobPost\JobResponseController;
use App\Http\Controllers\Frontend\User\JobPost\JobTimelineController;

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
    Route::resource('profiles', BusinessController::class);

    // Find Job Posts
    Route::get('find-jobs', [JobPostController::class, 'find_job_posts'])->name('find-jobs');
    Route::get('find-jobs/{id}/service-category', [JobPostController::class, 'find_job_post_by_filter'])->name('find-jobs.service-category-filter');

    // Job Posts
    Route::resource('job-posts', JobPostController::class);
    Route::get('job-posts/{id}/submit-a-proposal', [JobPostController::class, 'submit_a_proposal'])->name('job-posts.submit-a-proposal');

    // Job Post Responses
    Route::resource('job-post-responses', JobResponseController::class);

    // Job Post Timeline
    Route::resource('job-timelines', JobTimelineController::class);
});
