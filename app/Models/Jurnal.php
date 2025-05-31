<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ptkis',
        'nama_jurnal',
        'score_overall',
        'link',
        'akreditasi',
    ];
}


