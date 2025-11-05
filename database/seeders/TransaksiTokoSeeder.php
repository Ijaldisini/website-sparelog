<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiToko;
use Illuminate\Support\Facades\DB;

class TransaksiTokoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi_toko')->insert([
            ['nama_toko' => 'Toko Maju Jaya', 'tanggal' => '2025-11-01', 'total_harga' => 950000],
            ['nama_toko' => 'Toko Sukses Motor', 'tanggal' => '2025-11-02', 'total_harga' => 1200000],
            ['nama_toko' => 'Toko Sentosa Jaya', 'tanggal' => '2025-11-03', 'total_harga' => 875000],
            ['nama_toko' => 'Toko Prima Motor', 'tanggal' => '2025-11-04', 'total_harga' => 600000],
            ['nama_toko' => 'Toko Cahaya Baru', 'tanggal' => '2025-11-05', 'total_harga' => 1100000],
        ]);
    }
}
