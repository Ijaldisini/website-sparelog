<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AktivitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aktivitas_stok')->insert([
            ['nama_barang' => 'Oli Mesin Federal Supreme XX', 'jumlah' => 20, 'harga_satuan' => 45000, 'total_harga' => 900000, 'tanggal' => '2025-10-31'],
            ['nama_barang' => 'Kampas Rem Depan Honda Beat', 'jumlah' => 15, 'harga_satuan' => 25000, 'total_harga' => 375000, 'tanggal' => '2025-11-02'],
            ['nama_barang' => 'Busi NGK CPR8EA-9', 'jumlah' => 30, 'harga_satuan' => 20000, 'total_harga' => 600000, 'tanggal' => '2025-11-03'],
            ['nama_barang' => 'Filter Oli Yamaha Mio', 'jumlah' => 25, 'harga_satuan' => 18000, 'total_harga' => 450000, 'tanggal' => '2025-11-04'],
            ['nama_barang' => 'Ban Luar IRC NR76 80/90-14', 'jumlah' => 10, 'harga_satuan' => 135000, 'total_harga' => 1350000, 'tanggal' => '2025-11-05'],
        ]);
    }
}
