<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\JobPost\MyWorkController;
use App\Http\Controllers\Frontend\User\JobPost\JobPostController;
use App\Http\Controllers\Frontend\User\JobPost\FindJobController;
use App\Http\Controllers\Frontend\User\JobPost\JobResponseController;
use App\Http\Controllers\Frontend\User\JobPost\JobTimelineController;
use App\Http\Controllers\Frontend\User\JobPost\PendingProposalController;

Route::group(['prefix' => 'jobs', 'as' => 'jobs.', 'middleware' => ['auth','user']], function () {

    // Find Job Posts
    Route::get('find-jobs', [FindJobController::class, 'find_job_posts'])->name('find-jobs');
    Route::get('find-jobs/all-jobs-in-country', [FindJobController::class, 'find_job_post_by_all_jobs_in_country'])->name('find-jobs.all-jobs-in-country');
    Route::get('find-jobs/service-category/{id}', [FindJobController::class, 'find_job_post_by_service_category_filter_with_fix_km'])->name('find-jobs.service-category-filter');

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

    // Job Post Timeline and Process
    Route::resource('job-timelines', JobTimelineController::class);
    Route::get('job-timelines/{id}/cancel-work-to-worker', [JobTimelineController::class, 'cancel_work_to_worker'])->name('job-timelines.cancel-work-to-worker');
    Route::get('job-timelines/{id}/cancel-work-to-job-owner', [JobTimelineController::class, 'cancel_work_to_job_owner'])->name('job-timelines.cancel-work-to-job-owner');
    Route::get('job-timelines/{id}/start-working', [JobTimelineController::class, 'start_working'])->name('job-timelines.start-working');
    Route::get('job-timelines/{id}/done-the-job', [JobTimelineController::class, 'done_the_job'])->name('job-timelines.done-the-job');
    Route::get('job-timelines/{id}/work-done-from-owner', [JobTimelineController::class, 'work_done_from_owner'])->name('job-timelines.work-done-from-owner');
    Route::get('job-timelines/{id}/payment-done-from-owner', [JobTimelineController::class, 'payment_done_from_owner'])->name('job-timelines.payment-done-from-owner');
    Route::get('job-timelines/{id}/payment-confirmation-from-worker', [JobTimelineController::class, 'payment_confirmation_from_worker'])->name('job-timelines.payment-confirmation-from-worker');
    Route::post('job-timelines/ratings-and-comments-to-worker', [JobTimelineController::class, 'ratings_and_comments_to_worker'])->name('job-timelines.ratings-and-comments-to-worker');
    Route::post('job-timelines/ratings-and-comments-to-owner', [JobTimelineController::class, 'ratings_and_comments_to_owner'])->name('job-timelines.ratings-and-comments-to-owner');

    // My Pending Proposal
    Route::resource('pending-proposal', PendingProposalController::class);

    // My Pending Proposal
    Route::resource('my-works', MyWorkController::class);
});
