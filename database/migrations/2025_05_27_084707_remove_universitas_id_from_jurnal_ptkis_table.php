<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jurnal_ptkis', function (Blueprint $table) {
            if (Schema::hasColumn('jurnal_ptkis', 'universitas_id')) {
                // Drop foreign key secara aman
                try {
                    $table->dropForeign(['universitas_id']);
                } catch (\Throwable $e) {
                    // Abaikan jika sudah tidak ada
                }

                // Drop kolom
                $table->dropColumn('universitas_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jurnal_ptkis', function (Blueprint $table) {
            $table->foreignId('universitas_id')->constrained()->onDelete('cascade');
        });
    }
};
