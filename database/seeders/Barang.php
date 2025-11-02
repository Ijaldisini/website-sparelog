<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Barang extends Seeder
{
    public function run(): void
    {
        $barangList = [
            // Peralatan Bengkel
            'Obeng Minus' => 8000,
            'Obeng Plus' => 9000,
            'Tang Kombinasi' => 25000,
            'Tang Potong' => 27000,
            'Tang Cucut' => 30000,
            'Kunci Inggris' => 75000,
            'Kunci Ring Set' => 180000,
            'Dongkrak Hidrolik' => 450000,
            'Kompresor Mini' => 850000,
            'Alat Las Mini' => 950000,

            // Sparepart Motor
            'Busi Motor' => 15000,
            'Oli Motor' => 45000,
            'Rantai Motor' => 85000,
            'Kampas Rem Motor' => 30000,
            'Klakson Motor' => 25000,
            'Spion Motor' => 40000,
            'Lampu Depan Motor' => 25000,
            'Ban Depan Motor' => 180000,
            'Ban Belakang Motor' => 200000,
            'Velg Racing Motor' => 350000,

            // Kelistrikan
            'Kabel Listrik' => 12000,
            'Lampu LED 5W' => 10000,
            'Lampu LED 10W' => 15000,
            'Lampu Sorot' => 45000,
            'Adaptor 12V' => 25000,
            'Power Supply 5A' => 75000,
            'Terminal Listrik' => 3000,
            'Fuse 10A' => 2000,

            // Lain-lain
            'Lakban Hitam' => 10000,
            'Tali Rafia' => 8000,
            'Sarung Tangan Kerja' => 25000,
            'Masker Debu' => 5000,
            'Kacamata Safety' => 20000,
            'Sepatu Safety' => 350000,
        ];

        $barangData = [];

        foreach ($barangList as $nama => $harga) {
            $hpp = $harga - ($harga * 0.1);

            $barangData[] = [
                'nama_barang' => $nama,
                'harga' => $harga,
                'stok' => rand(10, 200),
                'hpp' => $hpp,
                'tanggal_masuk' => Carbon::now()->subDays(rand(0, 60)),
                'id_supplier' => rand(1, 25),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('barang')->insert($barangData);
    }
}