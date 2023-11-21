<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('transaksi_id'); // Kolom transaksi_id sebagai primary key
            $table->date('tanggal');
            $table->decimal('total_bayar', 10, 2); // Kolom total_harga dengan 2 digit desimal
            $table->enum('metode_pembayaran', ['pending','dimasak']);
            $table->text('keterangan')->nullable(); // Kolom keterangan boleh kosong

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
