<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JurnalPtkis;
use Illuminate\Support\Facades\Storage;

class JurnalPtkisController extends Controller
{
    // Tampilkan daftar jurnal untuk admin (terkelompok per universitas)
    public function index()
    {
        $jurnals = JurnalPtkis::all()->groupBy('nama_universitas');
        return view('jurnal.index', compact('jurnals'));
    }

    // Tampilkan form tambah jurnal
    public function create()
    {
        return view('jurnal.create');
    }

    // Simpan data jurnal baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_universitas' => 'required|string|max:255',
            'nama_jurnal'      => 'required|string|max:255',
            'link_jurnal'      => 'required|url|max:255',
            'akreditasi'       => 'required|string|max:50',
            'skor'             => 'required|numeric|min:0',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        JurnalPtkis::create($data);

        return redirect()->route('admin.jurnal-ptkis.index')
                         ->with('success', 'Jurnal berhasil ditambahkan');
    }

    // Tampilkan form edit jurnal
    public function edit(JurnalPtkis $jurnal)
    {
        return view('jurnal.edit', compact('jurnal'));
    }

    // Update data jurnal
    public function update(Request $request, JurnalPtkis $jurnal)
    {
        $data = $request->validate([
            'nama_universitas' => 'required|string|max:255',
            'nama_jurnal'      => 'required|string|max:255',
            'link_jurnal'      => 'required|url|max:255',
            'akreditasi'       => 'required|string|max:50',
            'skor'             => 'required|numeric|min:0',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($jurnal->logo) {
                Storage::disk('public')->delete($jurnal->logo);
            }

            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $jurnal->update($data);

        return redirect()->route('admin.jurnal-ptkis.index')
                         ->with('success', 'Jurnal berhasil diperbarui');
    }

    // Hapus data jurnal
    public function destroy(JurnalPtkis $jurnal)
    {
        if ($jurnal->logo) {
            Storage::disk('public')->delete($jurnal->logo);
        }

        $jurnal->delete();

        return back()->with('success', 'Jurnal berhasil dihapus');
    }

    // Tampilkan data jurnal untuk publik (dengan pencarian dan skor rata-rata)
    public function publicView(Request $request)
{
    $search = $request->search;

    $query = JurnalPtkis::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_universitas', 'like', "%{$search}%")
              ->orWhere('nama_jurnal', 'like', "%{$search}%");
        });
    }

    $jurnals = $query->get();

    // Kelompokkan berdasarkan universitas dan hitung skor total (bukan rata-rata)
    $universitasList = $jurnals->groupBy('nama_universitas')->map(function ($group) {
        return (object)[
            'nama' => $group->first()->nama_universitas,
            'skor_overall' => $group->sum('skor'), // <- total skor
            'jurnals' => $group,
        ];
    });

    return view('jurnal-ptkis', compact('universitasList', 'search'));
}

}
