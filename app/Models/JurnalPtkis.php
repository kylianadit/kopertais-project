<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPtkis extends Model
{
    use HasFactory;

    protected $table = 'jurnal_ptkis';

    protected $fillable = [
        'logo',
        'nama_universitas',
        'nama_jurnal',
        'link_jurnal',
        'akreditasi',
        'skor'
        // HAPUS 'universitas_id'
    ];
}
