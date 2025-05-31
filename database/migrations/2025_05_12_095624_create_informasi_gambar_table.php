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
        Schema::create('informasi_gambar', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('gambar'); // path gambar
            $table->date('tanggal_tayang'); // gambar ditampilkan berdasarkan tanggal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_gambar');
    }
};
