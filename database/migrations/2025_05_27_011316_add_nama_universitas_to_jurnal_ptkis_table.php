<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNamaUniversitasToJurnalPtkisTable extends Migration
{
    public function up()
    {
        Schema::table('jurnal_ptkis', function (Blueprint $table) {
            if (!Schema::hasColumn('jurnal_ptkis', 'nama_universitas')) {
                $table->string('nama_universitas')->after('id');
            }
        });
    }

    public function down()
    {
        Schema::table('jurnal_ptkis', function (Blueprint $table) {
            $table->dropColumn('nama_universitas');
        });
    }
}
