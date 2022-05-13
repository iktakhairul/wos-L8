<?php

use App\Http\Controllers\Frontend\Baby\BabyController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'test', 'as' => 'test.', 'middleware' => ['auth']], function () {
    /**
     * Baby age generation route
     */
    Route::get('baby', [BabyController::class, 'ourBaby'])->name('baby');
    Route::post('baby/update', [BabyController::class, 'babyUpdate'])->name('baby.update');
    Route::delete('baby/destroy/{id}', [BabyController::class, 'destroy'])->name('baby.destroy');
    Route::get('diet-chart', [BabyController::class, 'dietChart'])->name('diet-chart');
});
