<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }

    public function getHarga($nama)
    {
        $barang = Barang::whereRaw('LOWER(nama_barang) = ?', [strtolower($nama)])->first();
        if (!$barang) {
            return response()->json(['harga' => 0], 404);
        }
        return response()->json(['harga' => $barang->harga]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Ambil data JSON
            $data = json_decode($request->getContent(), true);

            if (!$data || !isset($data['barang']) || count($data['barang']) === 0) {
                return response()->json(['success' => false, 'message' => 'Tidak ada barang yang dimasukkan.']);
            }

            // Simpan transaksi utama
            $transaksi = Transaksi::create([
                'nomor_polisi' => $data['nomor_polisi'],
                'nama_pelanggan' => $data['nama_pelanggan'],
                'tanggal' => $data['tanggal'],
                'total' => 0, // akan diupdate di bawah
            ]);

            $total = 0;

            // Simpan detail barang
            foreach ($data['barang'] as $b) {
                $barang = Barang::whereRaw('LOWER(nama_barang) = ?', [strtolower($b['nama_barang'])])->first();

                if (!$barang) continue;

                $subtotal = $barang->harga * (int) $b['jumlah'];
                $total += $subtotal;

                TransaksiDetail::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barang->id,
                    'jumlah' => $b['jumlah'],
                    'subtotal' => $subtotal,
                ]);

                $barang->decrement('stok', $b['jumlah']);
            }

            $transaksi->update(['total' => $total]);

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Transaksi berhasil disimpan!']);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
