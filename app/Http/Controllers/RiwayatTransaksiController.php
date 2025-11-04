<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiToko;
use Illuminate\Http\Request;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $riwayat = Transaksi::with('detail.barang')->get();
        $total = $riwayat->flatMap->detail->sum('subtotal');

        return view('riwayat.index', compact('riwayat', 'total'));
    }

    public function toko()
    {
        $riwayatToko = TransaksiToko::with('detail.barang')->get();
        $totalToko = $riwayatToko->flatMap->detail->sum(fn($d) => $d->subtotal - ($d->subtotal * 0.05));

        return view('riwayat.toko', compact('riwayatToko', 'totalToko'));
    }
}
