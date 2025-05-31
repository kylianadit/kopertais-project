<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('jurnal_ptkis', function (Blueprint $table) {
        $table->decimal('skor', 10, 2)->nullable(); // Bisa simpan sampai 99999999.99
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jurnal_ptkis', function (Blueprint $table) {
            //
        });
    }
};
