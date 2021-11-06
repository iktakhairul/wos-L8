<?php

use App\Http\Controllers\TestController;

Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('/groups', [TestController::class, 'set_categories']);
});