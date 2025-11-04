<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiToko extends Model
{
    use HasFactory;

    protected $table = 'transaksi_toko';
    protected $fillable = ['nama_toko', 'tanggal', 'total', 'diskon', 'total_akhir'];

    public function detail()
    {
        return $this->hasMany(DetailTransaksiToko::class, 'transaksi_toko_id');
    }
}
