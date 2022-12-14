<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [WebController::class, 'index'])->name('/');

Route::post('auth/register', [RegisterController::class, 'register'])->name('auth.register');
Route::get('/home', [WebController::class, 'index'])->name('home');

Auth::routes();
require __DIR__.'/dashboard.php';
