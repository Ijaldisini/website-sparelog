<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;


Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Welcome
Route::get('/dashboard/welcome', function () {
    return view('welcome_admin');
})->name('welcome-admin');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
});

// Barang
Route::middleware('auth')->group(function () {
    Route::resource('barang', App\Http\Controllers\Barang::class);
});

// Transaksi
Route::middleware('auth')->group(function () {
    Route::resource('transaksi', App\Http\Controllers\Transaksi::class);
});

// Riwayat Transaksi
Route::middleware('auth')->group(function () {
    Route::resource('riwayat-transaksi', App\Http\Controllers\RiwayatTransaksi::class);
});

// Laporan
Route::middleware('auth')->group(function () {
    Route::resource('laporan', App\Http\Controllers\Laporan::class);
});
