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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buku_id');
            $table->bigInteger('kategori_id');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->date('tahun_penerbitan');
            $table->bigInteger('ISBN');
            $table->bigInteger('jumlah_tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
