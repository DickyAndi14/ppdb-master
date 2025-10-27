<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| ROUTES UTAMA
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'))->name('home');


// REGISTER
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // ✅ Tambahan agar view yang pakai route('register') tetap jalan
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
// Proses register (submit form)
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/
// Form Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Proses Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA (hanya untuk admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/review', [AdminController::class, 'review'])->name('admin.review');
    Route::post('/admin/review/update-status/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});

/*
|--------------------------------------------------------------------------
| USER AREA (hanya untuk user login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ✅ DASHBOARD USER (ganti controller & name-nya agar tidak bentrok)
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // ✅ FORM PENDAFTARAN USER
    Route::get('/user/pendaftaran', [UserController::class, 'formPendaftaran'])->name('user.pendaftaran');
    Route::get('/user/form-orangtua', [UserController::class, 'formOrangtua'])->name('user.formOrangtua');
    Route::get('/user/form-jalur', [UserController::class, 'formJalur'])->name('user.formJalur');

    // ✅ SIMPAN DATA PENDAFTARAN KE DATABASE
    Route::post('/pendaftaran/submit', [PendaftaranController::class, 'store'])->name('pendaftaran.submit');
});