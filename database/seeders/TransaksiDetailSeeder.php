<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiDetail;

class TransaksiDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['transaksi_id' => 1, 'barang_id' => 1, 'jumlah' => 2, 'subtotal' => 190000],
            ['transaksi_id' => 1, 'barang_id' => 2, 'jumlah' => 1, 'subtotal' => 120000],
            ['transaksi_id' => 2, 'barang_id' => 3, 'jumlah' => 4, 'subtotal' => 480000],
            ['transaksi_id' => 2, 'barang_id' => 5, 'jumlah' => 2, 'subtotal' => 240000],
        ];

        foreach ($data as $item) {
            TransaksiDetail::create($item);
        }
    }
}
