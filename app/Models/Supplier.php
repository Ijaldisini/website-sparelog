<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $fillable = ['nama_supplier', 'alamat', 'no_telp'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_supplier');
    }
}
