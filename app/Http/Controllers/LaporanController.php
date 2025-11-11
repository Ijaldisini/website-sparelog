<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\TransaksiToko;
use App\Models\LaporanPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function pembelian()
    {
        $laporan = LaporanPembelian::with(['barang.supplier'])
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan.index', compact('laporan'));
    }

    public function penjualan()
    {
        $penjualanPelanggan = Transaksi::with('detail.barang')
            ->get()
            ->flatMap(function ($transaksi) {
                return $transaksi->detail->map(function ($detail) use ($transaksi) {
                    return [
                        'nama_pelanggan' => $transaksi->nama_pelanggan,
                        'tanggal' => $transaksi->tanggal,
                        'barang' => $detail->barang->nama_barang ?? '-',
                        'jumlah' => $detail->jumlah,
                        'harga' => $detail->subtotal,
                    ];
                });
            });

        $penjualanToko = TransaksiToko::with('detail.barang')
            ->get()
            ->flatMap(function ($transaksi) {
                return $transaksi->detail->map(function ($detail) use ($transaksi) {
                    return [
                        'nama_pelanggan' => $transaksi->nama_toko,
                        'tanggal' => $transaksi->tanggal,
                        'barang' => $detail->barang->nama_barang ?? '-',
                        'jumlah' => $detail->jumlah,
                        'harga' => $detail->subtotal,
                    ];
                });
            });

        $laporan = $penjualanPelanggan->merge($penjualanToko)->sortByDesc('tanggal');
        $totalKeseluruhan = $laporan->sum('harga');

        return view('laporan.penjualan', compact('laporan', 'totalKeseluruhan'));
    }

    public function cetakPenjualan()
    {
        $penjualanPelanggan = Transaksi::with('detail.barang')
            ->get()
            ->flatMap(function ($transaksi) {
                return $transaksi->detail->map(function ($detail) use ($transaksi) {
                    return [
                        'nama_pelanggan' => $transaksi->nama_pelanggan,
                        'tanggal' => $transaksi->tanggal,
                        'barang' => $detail->barang->nama_barang ?? '-',
                        'jumlah' => $detail->jumlah,
                        'harga' => $detail->subtotal,
                    ];
                });
            });

        $penjualanToko = TransaksiToko::with('detail.barang')
            ->get()
            ->flatMap(function ($transaksi) {
                return $transaksi->detail->map(function ($detail) use ($transaksi) {
                    return [
                        'nama_pelanggan' => $transaksi->nama_toko,
                        'tanggal' => $transaksi->tanggal,
                        'barang' => $detail->barang->nama_barang ?? '-',
                        'jumlah' => $detail->jumlah,
                        'harga' => $detail->subtotal,
                    ];
                });
            });

        $laporan = $penjualanPelanggan->merge($penjualanToko)->sortByDesc('tanggal');
        $totalKeseluruhan = $laporan->sum('harga');

        $pdf = Pdf::loadView('laporan.pdf_penjualan', compact('laporan', 'totalKeseluruhan'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('laporan_penjualan.pdf');
    }

    public function cetakPembelian()
    {
        $laporan = LaporanPembelian::with(['barang.supplier'])
            ->orderBy('tanggal', 'desc')
            ->get();

        $pdf = Pdf::loadView('laporan.pdf_index', compact('laporan'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('laporan_pembelian.pdf');
    }
}
