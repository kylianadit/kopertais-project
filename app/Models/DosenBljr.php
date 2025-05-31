<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenBljr extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan', 'tempat_tugas', 'tahun', 'ptkis'];
}

