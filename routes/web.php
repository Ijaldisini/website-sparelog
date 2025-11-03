<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;


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
});

// Barang
Route::resource('barang', BarangController::class)->middleware('auth');

// Transaksi
Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/api/barang/{nama}', [TransaksiController::class, 'getHarga']);
});

// Riwayat Transaksi
Route::middleware('auth')->group(function () {
    Route::resource('riwayat-transaksi', App\Http\Controllers\RiwayatTransaksi::class);
});

// Laporan
Route::middleware('auth')->group(function () {
    Route::resource('laporan', App\Http\Controllers\Laporan::class);
});
