<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\Profile\UpdatePersonalInfoController;

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth','user']], function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('/');

    /**
     * Profile resources route.
    */
    Route::resource('profiles', ProfileController::class);

    /**
     * Update profile documents route.
     */
    Route::patch('profiles/{id}/update-documents', [UpdatePersonalInfoController::class, 'updateDocuments'])->name('profiles.update-documents');
    Route::patch('profiles/{id}/update-profile-picture', [UpdatePersonalInfoController::class, 'updateProfilePicture'])->name('profiles.update-profile-picture');
    Route::patch('profiles/{id}/update-skills', [UpdatePersonalInfoController::class, 'updateSkills'])->name('profiles.update-skills');

    /**
     * Update present info for job post routes.
     */
    Route::get('profiles/{id}/edit-present-info', [UpdatePersonalInfoController::class, 'edit_present_info'])->name('profiles.edit-present-info');
    Route::post('update-present-info', [UpdatePersonalInfoController::class, 'update_present_info'])->name('update-present-info');
});
