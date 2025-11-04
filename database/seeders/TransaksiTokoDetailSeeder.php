<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiTokoDetail;

class TransaksiTokoDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['transaksi_id' => 1, 'barang_id' => 3, 'jumlah' => 10, 'subtotal' => 950000],
            ['transaksi_id' => 2, 'barang_id' => 6, 'jumlah' => 5, 'subtotal' => 475000],
        ];

        foreach ($data as $item) {
            TransaksiTokoDetail::create($item);
        }
    }
}
