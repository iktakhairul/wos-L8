<?php

use App\Http\Controllers\Frontend\User\Shop\ShopController;

// shop related all routes
Route::group(['prefix' => 'profile/{businessId}/shop', 'as' => 'profile.shop.', 'middleware' => ['auth','user','shop']], function () {
    Route::get('/{id}', [ShopController::class, 'index'])->name('/');
    Route::get('/{id}/settings', [ShopController::class, 'settings'])->name('settings');
});