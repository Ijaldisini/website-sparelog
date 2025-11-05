<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Barang extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([
            ['nama_barang' => 'Oli Mesin Federal Supreme XX', 'harga' => 55000, 'stok' => 100, 'tanggal_masuk' => '2025-10-30', 'hpp' => 45000, 'id_supplier' => 5],
            ['nama_barang' => 'Kampas Rem Depan Honda Beat', 'harga' => 30000, 'stok' => 80, 'tanggal_masuk' => '2025-10-31', 'hpp' => 25000, 'id_supplier' => 3],
            ['nama_barang' => 'Busi NGK CPR8EA-9', 'harga' => 25000, 'stok' => 60, 'tanggal_masuk' => '2025-11-01', 'hpp' => 20000, 'id_supplier' => 4],
            ['nama_barang' => 'Filter Oli Yamaha Mio', 'harga' => 22000, 'stok' => 70, 'tanggal_masuk' => '2025-11-02', 'hpp' => 18000, 'id_supplier' => 2],
            ['nama_barang' => 'Ban Luar IRC NR76 80/90-14', 'harga' => 150000, 'stok' => 40, 'tanggal_masuk' => '2025-11-03', 'hpp' => 135000, 'id_supplier' => 1],
        ]);
    }
}
