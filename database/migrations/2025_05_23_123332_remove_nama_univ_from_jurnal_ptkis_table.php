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
    Schema::table('jurnal_ptkis', function (Blueprint $table) {
        $table->dropColumn('nama_univ');
    });
}

public function down(): void
{
    Schema::table('jurnal_ptkis', function (Blueprint $table) {
        $table->string('nama_univ')->nullable(); // bisa nullable kalau rollback
    });
}

};
