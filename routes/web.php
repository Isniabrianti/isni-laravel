<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TelegramController;

//Halaman Login
Route::get('/', function () {
    return redirect()->route('login');
});


//Route untuk login di google
Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Route untuk login di telegram
Route::get('/auth/telegram', [LoginController::class, 'redirectToTelegram'])->name('telegram.login');
Route::get('/telegram/callback/{telegramUsername}', [LoginController::class, 'handleTelegramCallback'])->name('telegram.callback');


// Route untuk register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk login dan logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {

    // Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Middleware admin untuk route yang memerlukan akses admin
    Route::middleware(['auth', 'can:admin'])->group(function () {

        Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/buku/{idbuku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/buku/{idbuku}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/buku/{idbuku}', [BukuController::class, 'destroy'])->name('buku.destroy');
    });

    // Route untuk melihat buku yang dapat diakses oleh semua user
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/{idbuku}', [BukuController::class, 'show'])->name('buku.show');

    // Route untuk profile, search, dan settings
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');
});

