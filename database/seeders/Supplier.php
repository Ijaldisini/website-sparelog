<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Supplier extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supplier')->insert([
            ['nama_supplier' => 'PT Astra Motor', 'alamat' => 'Jakarta', 'no_telp' => '081234567890'],
            ['nama_supplier' => 'PT Yamaha Parts Indonesia', 'alamat' => 'Bekasi', 'no_telp' => '081234567891'],
            ['nama_supplier' => 'PT Honda Genuine Parts', 'alamat' => 'Depok', 'no_telp' => '081234567892'],
            ['nama_supplier' => 'PT NGK Indonesia', 'alamat' => 'Tangerang', 'no_telp' => '081234567893'],
            ['nama_supplier' => 'PT Federal Oil', 'alamat' => 'Bogor', 'no_telp' => '081234567894'],
        ]);
    }
};
