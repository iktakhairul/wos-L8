<?php

use App\Http\Controllers\Frontend\Baby\BabyController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'baby', 'as' => 'baby.', 'middleware' => ['auth']], function () {
    /**
     * Baby age generation route
     */
    Route::get('index', [BabyController::class, 'ourBaby'])->name('index');
    Route::post('update', [BabyController::class, 'babyUpdate'])->name('update');
    Route::delete('destroy/{id}', [BabyController::class, 'destroy'])->name('destroy');
    Route::get('diet-chart', [BabyController::class, 'dietChart'])->name('diet-chart');
});
