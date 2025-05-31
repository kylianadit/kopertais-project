<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infografis;

class InfografisController extends Controller
{
    // Menampilkan semua data infografis
    public function index()
    {
        $infografis = Infografis::orderBy('created_at', 'desc')->get();
        return view('infografis.index', compact('infografis'));
    }

    // Menyimpan data infografis baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('gambar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/infografis', $filename);

        Infografis::create([
            'judul' => $request->judul,
            'gambar' => $filename,
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil diunggah');
    }
}