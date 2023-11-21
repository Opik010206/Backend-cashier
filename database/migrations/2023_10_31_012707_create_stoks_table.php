<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->bigIncrements('id'); // Kolom stok_id sebagai primary key
            $table->unsignedBigInteger('menu_id'); // Kolom menu_id sebagai foreign key ke Tabel Menu
            $table->integer('jumlah');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('menu_id')
                ->references('id')
                ->on('menu')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE'); // Menghubungkan menu_id dengan menu_id pada tabel Menu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
