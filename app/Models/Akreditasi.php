<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    use HasFactory;

    // Izinkan kolom-kolom ini untuk mass assignment
    protected $fillable = ['ptkis', 'jenjang', 'prodi', 'akreditasi', 'exp'];
}
