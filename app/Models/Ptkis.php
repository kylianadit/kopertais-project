<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptkis extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'akreditasi', 'alamat', 'website', 'logo'];

}
