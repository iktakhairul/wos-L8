<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\Business\BusinessController;
use App\Http\Controllers\Frontend\User\JobPost\MyWorkController;
use App\Http\Controllers\Frontend\User\JobPost\JobPostController;
use App\Http\Controllers\Frontend\User\JobPost\JobResponseController;
use App\Http\Controllers\Frontend\User\JobPost\JobTimelineController;
use App\Http\Controllers\Frontend\User\JobPost\PendingProposalController;


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
    Route::get('job-posts/{id}/resubmit-a-proposal', [JobResponseController::class, 'resubmit_a_proposal'])->name('job-posts.resubmit-a-proposal');

    // Job Post Responses
    Route::resource('job-post-responses', JobResponseController::class);
    Route::get('job-post-responses/{id}/confirm-proposal', [JobResponseController::class, 'confirm_proposal_for_worker'])->name('job-post-responses.confirm-proposal');
    Route::get('job-post-responses/{id}/reconfirm-proposal', [JobResponseController::class, 'reconfirm_proposal_for_worker'])->name('job-post-responses.reconfirm-proposal');
    Route::get('job-post-responses/{id}/cancel-order', [JobResponseController::class, 'cancel_order_to_worker'])->name('job-post-responses.cancel-order');
    Route::get('job-post-responses/{id}/cancel-job-proposal', [JobResponseController::class, 'cancel_job_proposal_to_job_owner'])->name('job-post-responses.cancel-job-proposal');

    // Job Post Timeline
    Route::resource('job-timelines', JobTimelineController::class);
    Route::get('job-timelines/{id}/cancel-work-to-worker', [JobTimelineController::class, 'cancel_work_to_worker'])->name('job-timelines.cancel-work-to-worker');
    Route::get('job-timelines/{id}/start-working', [JobTimelineController::class, 'start_working'])->name('job-timelines.start-working');
    Route::get('job-timelines/{id}/cancel-work-to-job-owner', [JobTimelineController::class, 'cancel_work_to_job_owner'])->name('job-timelines.cancel-work-to-job-owner');

    // My Pending Proposal
    Route::resource('pending-proposal', PendingProposalController::class);

    // My Pending Proposal
    Route::resource('my-works', MyWorkController::class);
});
