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
        // Membuat tabel roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nama role (misal: admin, user)
            $table->timestamps();
        });

        // Menambahkan kolom role_id ke tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')
                  ->nullable() // Memungkinkan user tanpa role awal
                  ->constrained('roles') // Mengacu pada tabel roles
                  ->onDelete('set null'); // Ketika role dihapus, role_id di user menjadi null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom role_id dari tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        // Menghapus tabel roles
        Schema::dropIfExists('roles');
    }
};
