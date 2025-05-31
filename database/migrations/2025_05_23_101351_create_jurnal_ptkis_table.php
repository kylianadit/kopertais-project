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
        Schema::create('jurnal_ptkis', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();        // Kolom untuk logo (opsional)
            $table->string('nama_univ');               // Nama Universitas
            $table->string('nama_jurnal');             // Nama Jurnal
            $table->string('link_jurnal');             // Link URL Jurnal
            $table->string('akreditasi');              // Akreditasi (misal: SINTA 2)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_ptkis');
    }
};
