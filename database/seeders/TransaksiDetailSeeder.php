<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;

class TransaksiDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi_detail')->insert([
            ['transaksi_id' => 1, 'barang_id' => 1, 'jumlah' => 2, 'subtotal' => 110000],
            ['transaksi_id' => 1, 'barang_id' => 3, 'jumlah' => 2, 'subtotal' => 50000],
            ['transaksi_id' => 2, 'barang_id' => 4, 'jumlah' => 5, 'subtotal' => 110000],
            ['transaksi_id' => 2, 'barang_id' => 2, 'jumlah' => 2, 'subtotal' => 60000],
            ['transaksi_id' => 3, 'barang_id' => 5, 'jumlah' => 2, 'subtotal' => 300000],
            ['transaksi_id' => 4, 'barang_id' => 1, 'jumlah' => 1, 'subtotal' => 55000],
            ['transaksi_id' => 5, 'barang_id' => 3, 'jumlah' => 4, 'subtotal' => 100000],
        ]);
    }
}
