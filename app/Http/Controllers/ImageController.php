<?php

// app/Http/Controllers/ImageController.php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function welcome()
    {
        $images = Image::all();
        return view('welcome', compact('images'));
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return response()->json($image);
    }
}
