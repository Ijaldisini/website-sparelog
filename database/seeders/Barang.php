<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Barang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangData = [];
        $namaBarang = [
            'Baut 10mm',
            'Baut 12mm',
            'Baut 14mm',
            'Mur 10mm',
            'Mur 12mm',
            'Mur 14mm',
            'Karet Seal 3cm',
            'Karet Seal 5cm',
            'Oli Mesin 1L',
            'Oli Mesin 2L',
            'Bearing 6200',
            'Bearing 6300',
            'Gear Set Motor',
            'Kabel Listrik 2m',
            'Kabel Listrik 5m',
            'Pipa Besi 1 inch',
            'Pipa Besi 2 inch',
            'Klem Besi',
            'Amplas Halus',
            'Amplas Kasar',
            'Kunci Inggris',
            'Tang Potong',
            'Obeng Plus',
            'Obeng Min',
            'Cat Besi 1kg',
            'Cat Kayu 1kg',
            'Lem Epoxy 250gr',
            'Lem Besi 250gr',
            'Selang Air 5m',
            'Selang Air 10m',
            'Mur Baut Set',
            'Kunci Pas 8-12',
            'Kunci Pas 10-14',
            'Kunci Pas 14-17',
            'Seal Tape',
            'Palu Besi',
            'Obeng Set',
            'Kunci Sok 12pcs',
            'Pisau Cutter',
            'Mata Bor 10mm',
            'Mata Bor 12mm',
            'Lem Korea',
            'Kabel Jumper',
            'Fuse 10A',
            'Fuse 20A',
            'Fuse 30A',
            'Karet O-ring',
            'Paku Beton 2 inch',
            'Paku Beton 3 inch',
            'Kawat Las 2mm',
            'Kawat Las 3mm'
        ];

        foreach ($namaBarang as $i => $nama) {
            $harga = rand(3000, 250000);
            $hpp = $harga * 0.9;
            $barangData[] = [
                'nama_barang' => $nama,
                'harga' => $harga,
                'stok' => rand(10, 200),
                'hpp' => $hpp,
                'id_supplier' => rand(1, 25),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('barang')->insert($barangData);
    }
}
