<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SSOAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [SSOAuthController::class, 'SSOLogin'])->name('ssoLogin');

Route::get('/ecommerce/dashboard', [SSOAuthController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', [SSOAuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
