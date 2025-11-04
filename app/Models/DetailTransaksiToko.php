<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiToko extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_toko';
    protected $fillable = ['transaksi_toko_id', 'barang_id', 'jumlah', 'subtotal'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiToko::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}