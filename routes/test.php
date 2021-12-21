<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('system/dashboard', [TestController::class, 'dashboard'])->name('system.dashboard');
});
