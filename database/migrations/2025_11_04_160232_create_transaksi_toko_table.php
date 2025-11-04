<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaksi_toko', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->date('tanggal');
            $table->decimal('total', 15, 2);
            $table->decimal('diskon', 15, 2)->default(0);
            $table->decimal('total_akhir', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_toko');
    }
};
