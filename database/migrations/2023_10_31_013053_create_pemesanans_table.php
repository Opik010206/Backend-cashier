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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('pemesanan_id'); // Kolom pemesanan_id sebagai primary key
            $table->unsignedBigInteger('meja_id'); // Kolom meja_id sebagai foreign key ke Tabel Meja
            $table->date('tanggal_pemesanan');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('nama_pemesan');
            $table->integer('jumlah_pelanggan');

            $table->foreign('meja_id')
                ->references('id')
                ->on('meja')
                ->onDelete('cascade'); // Menghubungkan meja_id dengan meja_id pada tabel Meja

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
