<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWebsiteToPtkisTable extends Migration
{
    public function up()
    {
        Schema::table('ptkis', function (Blueprint $table) {
            $table->string('website')->nullable()->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('ptkis', function (Blueprint $table) {
            $table->dropColumn('website');
        });
    }
}