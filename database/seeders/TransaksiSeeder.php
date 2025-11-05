<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi')->insert([
            ['nomor_polisi' => 'B 1234 XYZ', 'nama_pelanggan' => 'Andi Setiawan', 'tanggal' => '2025-11-01', 'total_harga' => 205000],
            ['nomor_polisi' => 'B 5678 ABC', 'nama_pelanggan' => 'Budi Santoso', 'tanggal' => '2025-11-02', 'total_harga' => 275000],
            ['nomor_polisi' => 'B 4321 DEF', 'nama_pelanggan' => 'Citra Dewi', 'tanggal' => '2025-11-03', 'total_harga' => 335000],
            ['nomor_polisi' => 'B 8765 GHI', 'nama_pelanggan' => 'Dedi Firmansyah', 'tanggal' => '2025-11-04', 'total_harga' => 180000],
            ['nomor_polisi' => 'B 9988 JKL', 'nama_pelanggan' => 'Eko Prasetyo', 'tanggal' => '2025-11-05', 'total_harga' => 420000],
        ]);
    }
}
