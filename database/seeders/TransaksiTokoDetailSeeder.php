<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiTokoDetail;
use Illuminate\Support\Facades\DB;

class TransaksiTokoDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi_toko_detail')->insert([
            ['transaksi_id' => 1, 'barang_id' => 1, 'jumlah' => 10, 'subtotal' => 550000],
            ['transaksi_id' => 1, 'barang_id' => 3, 'jumlah' => 8, 'subtotal' => 200000],
            ['transaksi_id' => 2, 'barang_id' => 5, 'jumlah' => 6, 'subtotal' => 900000],
            ['transaksi_id' => 3, 'barang_id' => 2, 'jumlah' => 5, 'subtotal' => 150000],
            ['transaksi_id' => 3, 'barang_id' => 4, 'jumlah' => 3, 'subtotal' => 66000],
            ['transaksi_id' => 4, 'barang_id' => 1, 'jumlah' => 4, 'subtotal' => 220000],
            ['transaksi_id' => 5, 'barang_id' => 3, 'jumlah' => 10, 'subtotal' => 250000],
        ]);
    }
}
