<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\InformasiGambar;

class HomeController extends Controller
{
    public function index()
    {
        // Get your regular information
        $informasiList = Informasi::latest()->take(4)->get();
        
        // Also get your image information
        $gambarList = InformasiGambar::latest()->take(5)->get();
        
        // Pass both to the view
        return view('welcome', compact('informasiList', 'gambarList'));
    }
}