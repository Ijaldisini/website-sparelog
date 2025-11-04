<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiToko;

class TransaksiTokoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_toko' => 'Toko Maju Jaya', 'tanggal' => '2025-11-01', 'total_harga' => 1000000],
            ['nama_toko' => 'Toko Sinar Abadi', 'tanggal' => '2025-11-02', 'total_harga' => 1200000],
        ];

        foreach ($data as $item) {
            TransaksiToko::create($item);
        }
    }
}
