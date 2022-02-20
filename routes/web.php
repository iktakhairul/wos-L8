<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebController;
use App\Http\Controllers\Frontend\MessengerController;
use App\Http\Controllers\Frontend\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/clear-parasites', function () {
    $exitCode = Artisan::call('optimize:clear');
    return back();
});
Route::post('auth/register', [RegisterController::class, 'register'])->name('auth.register');
Route::get('/', [WebController::class, 'index'])->name('/');
Route::get('/home', [WebController::class, 'index'])->name('home');
Route::get('/about-us', [WebController::class, 'about_us'])->name('about-us');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/terms-&-conditions', [WebController::class, 'terms_conditions'])->name('terms-conditions');
Route::get('/faq', [WebController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [WebController::class, 'privacy_policy'])->name('privacy-policy');

Auth::routes();
Route::get('/messages', [MessengerController::class, 'index'])->name('messages');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

require __DIR__.'/profile.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/jobs.php';
require __DIR__.'/test.php';
