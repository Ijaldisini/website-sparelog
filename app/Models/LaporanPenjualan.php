<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['tanggal', 'total_harga'];

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id', 'id');
    }
}
