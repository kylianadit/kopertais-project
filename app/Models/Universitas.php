<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    protected $fillable = ['nama', 'logo'];

    public function jurnals()
    {
        return $this->hasMany(JurnalPtkis::class);
    }
}
