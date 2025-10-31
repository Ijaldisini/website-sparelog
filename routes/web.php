<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect()->route('login');
});

// Login and Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/dashboard/welcome', function () {
        return view('welcome_admin');
    })->name('welcome-admin');
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
