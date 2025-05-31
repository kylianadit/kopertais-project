<?php

namespace App\Http\Controllers;

use App\Models\Ptkis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PtkisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $ptkis = Ptkis::when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })->latest()->get();

        return view('ptkis.index', compact('ptkis', 'search'));
    }

    public function create()
    {
        return view('ptkis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:20',
            'alamat' => 'required|string',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['nama', 'akreditasi', 'alamat', 'website']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('logo', $filename, 'public');
            $data['logo'] = $filePath;
        }

        // Debug log untuk memastikan data yang akan disimpan
        Log::info('Menyimpan data PTKIS:', $data);

        try {
            Ptkis::create($data);
            return redirect()->route('ptkis.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data PTKIS: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $ptki = Ptkis::findOrFail($id);
        return view('ptkis.edit', compact('ptki'));
    }

    public function update(Request $request, $id)
    {
        $ptki = Ptkis::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:20',
            'alamat' => 'required|string',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['nama', 'akreditasi', 'alamat', 'website']);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($ptki->logo && Storage::disk('public')->exists($ptki->logo)) {
                Storage::disk('public')->delete($ptki->logo);
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('logo', $filename, 'public');
            $data['logo'] = $filePath;
        }

        try {
            $ptki->update($data);
            return redirect()->route('ptkis.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui data PTKIS: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        $ptki = Ptkis::findOrFail($id);

        if ($ptki->logo && Storage::disk('public')->exists($ptki->logo)) {
            Storage::disk('public')->delete($ptki->logo);
        }

        try {
            $ptki->delete();
            return redirect()->route('ptkis.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus data PTKIS: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}