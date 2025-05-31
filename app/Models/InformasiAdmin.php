<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiAdmin extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti default Laravel (jamak, snake_case)
    protected $table = 'informasi_admins';

    // Field yang boleh diisi (mass assignable)
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}
