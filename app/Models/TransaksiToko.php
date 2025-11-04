<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiToko extends Model
{
    use HasFactory;

    protected $table = 'transaksi_toko';
    protected $fillable = ['nama_toko', 'tanggal', 'total_harga'];

    public function detail()
    {
        return $this->hasMany(TransaksiTokoDetail::class, 'transaksi_id', 'id');
    }
}
