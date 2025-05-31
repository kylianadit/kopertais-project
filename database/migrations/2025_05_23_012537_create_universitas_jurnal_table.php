<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('universitas_jurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('universitas_id')->constrained('universitas')->onDelete('cascade');
            $table->string('nama_jurnal');
            $table->string('link_jurnal');
            $table->string('akreditasi')->nullable();
            $table->decimal('score_overall', 8, 3)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universitas_jurnals');
    }
};
