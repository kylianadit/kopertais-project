<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom logo ke tabel ptkis jika belum ada.
     */
    public function up()
    {
        Schema::table('ptkis', function (Blueprint $table) {
            if (!Schema::hasColumn('ptkis', 'logo')) {
                $table->string('logo')->nullable();
            }
        });
    }

    /**
     * Hapus kolom logo dari tabel ptkis jika ada.
     */
    public function down()
    {
        Schema::table('ptkis', function (Blueprint $table) {
            if (Schema::hasColumn('ptkis', 'logo')) {
                $table->dropColumn('logo');
            }
        });
    }
};
