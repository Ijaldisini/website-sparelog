<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\TransaksiToko;
use App\Models\DetailTransaksiToko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiTokoController extends Controller
{
    public function index()
    {
        return view('transaksi.toko');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = json_decode($request->getContent(), true);

            if (!$data || !isset($data['barang']) || count($data['barang']) === 0) {
                return response()->json(['success' => false, 'message' => 'Tidak ada barang yang dimasukkan.']);
            }

            $transaksi = TransaksiToko::create([
                'nama_toko' => $data['nama_toko'],
                'tanggal' => $data['tanggal'],
                'total' => 0,
                'diskon' => 0,
                'total_akhir' => 0,
            ]);

            $total = 0;
            foreach ($data['barang'] as $b) {
                $barang = Barang::whereRaw('LOWER(nama_barang) = ?', [strtolower($b['nama_barang'])])->first();

                if (!$barang) continue;

                $subtotal = $barang->harga * (int) $b['jumlah'];
                $total += $subtotal;

                DetailTransaksiToko::create([
                    'transaksi_toko_id' => $transaksi->id,
                    'barang_id' => $barang->id,
                    'jumlah' => $b['jumlah'],
                    'subtotal' => $subtotal,
                ]);

                $barang->decrement('stok', $b['jumlah']);
            }

            $diskon = $total * 0.05;
            $total_akhir = $total - $diskon;

            $transaksi->update([
                'total' => $total,
                'diskon' => $diskon,
                'total_akhir' => $total_akhir,
            ]);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Transaksi toko berhasil disimpan!']);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}