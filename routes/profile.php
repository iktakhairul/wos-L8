<?php

use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\Business\BusinessController;
use App\Http\Controllers\Frontend\User\JobPost\ServiceCategoryController;
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

    // Job Posts Services
    Route::get('find-jobs', [JobPostController::class, 'find_job_posts'])->name('find-jobs');
    Route::get('find-jobs/{id}/service-category', [JobPostController::class, 'find_job_post_by_filter'])->name('find-jobs.service-category-filter');
    Route::get('job-post', [JobPostController::class, 'job_post'])->name('job-post');
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('job-posts', JobPostController::class);
    Route::get('job-posts/{id}/see-offers', [JobPostController::class, 'see_offers'])->name('job_posts.see-offers');
    Route::resource('job-responses', JobResponseController::class);
    Route::resource('job-timelines', JobTimelineController::class);
});
