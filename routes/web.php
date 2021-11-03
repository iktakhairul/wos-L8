<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebController;

Route::get('/clear-parasites', function () {
    $exitCode = Artisan::call('optimize:clear');
    return back();
});

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Route::get('/', [WebController::class, 'index'])->name('/');
Route::get('/home', [WebController::class, 'index'])->name('home');
Route::get('/about-us', [WebController::class, 'about_us'])->name('about-us');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/terms-&-conditions', [WebController::class, 'terms_conditions'])->name('terms-conditions');
Route::get('/faq', [WebController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [WebController::class, 'privacy_policy'])->name('privacy-policy');

Auth::routes();

require __DIR__.'/web_inputs.php';
require __DIR__.'/profile.php';
require __DIR__.'/dashboard.php';