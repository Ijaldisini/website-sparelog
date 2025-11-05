<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\LaporanPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pembelian()
    {
        $laporan = LaporanPembelian::orderBy('tanggal', 'desc')->get();
        return view('laporan.index', compact('laporan'));
    }

    public function penjualan()
    {
        $laporan = Transaksi::with('detail.barang')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan.penjualan', compact('laporan'));
    }

}
