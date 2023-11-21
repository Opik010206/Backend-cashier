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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('detail_id'); // Kolom detail_id sebagai primary key
            $table->unsignedBigInteger('transaksi_id'); // Kolom transaksi_id sebagai foreign key ke Tabel Transaksi
            $table->unsignedBigInteger('menu_id'); // Kolom menu_id sebagai foreign key ke Tabel Menu
            $table->integer('jumlah');
            $table->decimal('subtotal', 10, 2); // Kolom subtotal dengan 2 digit desimal

            $table->foreign('transaksi_id')
                ->references('transaksi_id')
                ->on('transaksi')
                ->onDelete('cascade'); // Menghubungkan transaksi_id dengan transaksi_id pada tabel Transaksi

            $table->foreign('menu_id')
                ->references('id')
                ->on('menu')
                ->onDelete('cascade'); // Menghubungkan menu_id dengan menu_id pada tabel Menu

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
