<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPembelian extends Model
{
    protected $table = 'aktivitas_stok';
    protected $fillable = ['nama_barang', 'jumlah', 'harga_satuan', 'total_harga', 'tanggal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang', 'nama_barang');
    }
}
