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
        Schema::table('dosen_bljrs', function (Blueprint $table) {
            if (!Schema::hasColumn('dosen_bljrs', 'tempat_tugas')) {
                $table->string('tempat_tugas')->after('jabatan');
            }
        });
    }

    public function down()
    {
        Schema::table('dosen_bljrs', function (Blueprint $table) {
            if (Schema::hasColumn('dosen_bljrs', 'tempat_tugas')) {
                $table->dropColumn('tempat_tugas');
            }
        });
    }
};
