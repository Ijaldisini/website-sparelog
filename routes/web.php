<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiTokoController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\LaporanController;

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
    Route::get('/transaksi/toko', [TransaksiTokoController::class, 'index'])->name('toko.index');
    Route::post('/transaksi/toko', [TransaksiTokoController::class, 'store'])->name('toko.store');
    Route::get('/api/barang/{nama}', [TransaksiController::class, 'getHarga']);
});

// Riwayat Transaksi
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat', [RiwayatTransaksiController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/toko', [RiwayatTransaksiController::class, 'toko'])->name('riwayat.toko');
});

// Laporan
Route::middleware(['auth'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'pembelian'])->name('laporan.index');
    Route::get('/laporan/penjualan', [LaporanController::class, 'penjualan'])->name('laporan.penjualan');
});
