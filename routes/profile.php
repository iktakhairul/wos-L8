<?php

use App\Http\Controllers\Frontend\User\Profile\ProfileController;
use App\Http\Controllers\Frontend\User\Business\BusinessController;

// profile related all routes
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth','user']], function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('/');
    // business
    Route::resource('business', BusinessController::class);
});