<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'nomor_polisi' => 'B1234XYZ',
                'nama_pelanggan' => 'Ijal',
                'tanggal' => now(),
                'total_harga' => 285000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_polisi' => 'D5678ABC',
                'nama_pelanggan' => 'Raka',
                'tanggal' => now(),
                'total_harga' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
