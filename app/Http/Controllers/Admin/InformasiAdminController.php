<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiAdmin;
use Illuminate\Support\Facades\Storage;

class InformasiAdminController extends Controller
{
    // Tampilkan informasi untuk admin
    public function index()
    {
        $informasis = InformasiAdmin::latest()->get();
        return view('informasi-admin.index', compact('informasis'));
    }

    // Tampilkan informasi untuk publik (halaman depan)
    public function indexPublic()
    {
        $informasis = InformasiAdmin::latest()->get();
        return view('informasi', compact('informasis'));
    }

    // Tampilkan form tambah informasi
    public function create()
    {
        return view('informasi-admin.create');
    }

    // Simpan informasi baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('informasi_admins', 'public');
        }

        InformasiAdmin::create($data);

        return redirect()->route('informasi-admin.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $informasi = InformasiAdmin::findOrFail($id);
        return view('informasi-admin.edit', compact('informasi'));
    }

    // Update informasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $informasi = InformasiAdmin::findOrFail($id);
        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
                Storage::disk('public')->delete($informasi->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('informasi_admins', 'public');
        }

        $informasi->update($data);

        return redirect()->route('informasi-admin.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus informasi
    public function destroy($id)
    {
        $informasi = InformasiAdmin::findOrFail($id);

        if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();

        return redirect()->route('informasi-admin.index')->with('success', 'Data berhasil dihapus.');
    }
}
