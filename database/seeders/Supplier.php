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
            ['nama_supplier' => 'PT Maju Jaya', 'alamat' => 'Jl. Gatot Subroto No. 12, Surabaya', 'no_telp' => '081234567890', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Sumber Makmur', 'alamat' => 'Jl. Pahlawan No. 45, Malang', 'no_telp' => '081223344556', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'UD Logam Indah', 'alamat' => 'Jl. Merdeka No. 21, Jakarta', 'no_telp' => '081987654321', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Baja Kencana', 'alamat' => 'Jl. Soekarno Hatta No. 98, Bandung', 'no_telp' => '085678912345', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Teknik Prima', 'alamat' => 'Jl. Imam Bonjol No. 34, Semarang', 'no_telp' => '082345678912', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Multi Sparepart', 'alamat' => 'Jl. Diponegoro No. 11, Yogyakarta', 'no_telp' => '085512345678', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Sinar Terang', 'alamat' => 'Jl. Veteran No. 8, Denpasar', 'no_telp' => '081355667788', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Cipta Mandiri', 'alamat' => 'Jl. Asia Afrika No. 77, Bandung', 'no_telp' => '085245667899', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'UD Berkah Motor', 'alamat' => 'Jl. A. Yani No. 23, Surabaya', 'no_telp' => '085332112233', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Anugerah Sparelog', 'alamat' => 'Jl. Hasanudin No. 19, Kediri', 'no_telp' => '081245678921', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Mekanik Abadi', 'alamat' => 'Jl. Sudirman No. 9, Bogor', 'no_telp' => '085245677889', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Mitra Logam', 'alamat' => 'Jl. Ahmad Yani No. 102, Medan', 'no_telp' => '082334455667', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Jaya Teknik', 'alamat' => 'Jl. Rajawali No. 7, Palembang', 'no_telp' => '085367788990', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Surya Mekanika', 'alamat' => 'Jl. Kenanga No. 33, Banjarmasin', 'no_telp' => '081322334455', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Berkat Utama', 'alamat' => 'Jl. Sisingamangaraja No. 5, Pekanbaru', 'no_telp' => '081355667799', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Prima Baja', 'alamat' => 'Jl. Pasar Besar No. 88, Surabaya', 'no_telp' => '085245667801', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Logam Sejahtera', 'alamat' => 'Jl. Diponegoro No. 9, Bandung', 'no_telp' => '081278945612', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'UD Sparepart Jaya', 'alamat' => 'Jl. Gatot Subroto No. 10, Solo', 'no_telp' => '081322112233', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Mitra Teknik', 'alamat' => 'Jl. Kartini No. 14, Cirebon', 'no_telp' => '081355778899', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Nusantara Teknik', 'alamat' => 'Jl. Dipatiukur No. 7, Bandung', 'no_telp' => '082355667788', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Amanah Motor', 'alamat' => 'Jl. Raya Barat No. 88, Surabaya', 'no_telp' => '081278934512', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'CV Cahaya Mandiri', 'alamat' => 'Jl. Sudirman No. 99, Tegal', 'no_telp' => '081355667744', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Karya Logam', 'alamat' => 'Jl. Merpati No. 15, Malang', 'no_telp' => '081323456789', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'UD Teknik Bersama', 'alamat' => 'Jl. Anggrek No. 3, Blitar', 'no_telp' => '085266778899', 'created_at' => now(), 'updated_at' => now()],
            ['nama_supplier' => 'PT Global Mekanik', 'alamat' => 'Jl. Sawo No. 8, Tangerang', 'no_telp' => '081245678901', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
};
