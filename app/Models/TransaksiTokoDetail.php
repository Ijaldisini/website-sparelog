<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTokoDetail extends Model
{
    use HasFactory;

    protected $table = 'transaksi_toko_detail';
    protected $fillable = ['transaksi_id', 'barang_id', 'jumlah', 'subtotal'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiToko::class, 'transaksi_id', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
