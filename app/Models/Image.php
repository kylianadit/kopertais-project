<?php

// app/Models/Image.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['title', 'file_path', 'description'];
}

