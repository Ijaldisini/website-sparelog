<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aktivitas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_stok';
    protected $fillable = ['nama_barang', 'jumlah', 'harga_satuan', 'total_harga', 'tanggal'];
}
