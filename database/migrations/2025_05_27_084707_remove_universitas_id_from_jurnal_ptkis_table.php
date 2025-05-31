<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jurnal_ptkis', function (Blueprint $table) {
            // Coba drop foreign key hanya jika kolom dan constraint-nya masih ada
            // DROP FK only if exists
            DB::statement('ALTER TABLE jurnal_ptkis DROP FOREIGN KEY IF EXISTS jurnal_ptkis_universitas_id_foreign');

            if (Schema::hasColumn('jurnal_ptkis', 'universitas_id')) {
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

