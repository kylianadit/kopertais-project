<?php

// app/Http/Controllers/InformasiGambarController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiGambar;

class InformasiGambarController extends Controller
{
    public function index()
    {
        $data = InformasiGambar::all();
        return view('informasi-gambar.index', compact('data'));
    }

    public function create()
    {
        return view('informasi-gambar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $fileName);

        InformasiGambar::create(['gambar' => $fileName]);

        return redirect()->route('informasi-gambar.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function destroy(InformasiGambar $informasiGambar)
    {
        $filePath = public_path('uploads/' . $informasiGambar->gambar);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $informasiGambar->delete();

        return back()->with('success', 'Gambar berhasil dihapus!');
    }
}
