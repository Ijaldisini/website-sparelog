<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiToko;
use Illuminate\Http\Request;

class RiwayatTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $riwayat = Transaksi::with('detail.barang')
            ->when($query, function ($q) use ($query) {
                $q->where('nama_pelanggan', 'like', '%' . $query . '%');
            })
            ->get();

        $total = $riwayat->flatMap->detail->sum('subtotal');

        return view('riwayat.index', compact('riwayat', 'total', 'query'));
    }

    public function toko(Request $request)
    {
        $query = $request->input('search');

        $riwayatToko = TransaksiToko::with('detail.barang')
            ->when($query, function ($q) use ($query) {
                $q->where('nama_toko', 'like', '%' . $query . '%');
            })
            ->get();

        $totalToko = $riwayatToko->flatMap->detail->sum(fn($d) => $d->subtotal - ($d->subtotal * 0.05));

        return view('riwayat.toko', compact('riwayatToko', 'totalToko', 'query'));
    }
}
