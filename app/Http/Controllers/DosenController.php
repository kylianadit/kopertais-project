<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // ✅ Halaman Admin: Daftar Semua Dosen (dengan pencarian & pagination)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $dosens = Dosen::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%$search%")
                      ->orWhere('jabatan', 'like', "%$search%")
                      ->orWhere('ptkis', 'like', "%$search%");
            })
            ->orderBy('ptkis')  // ✅ Urutkan berdasarkan PTKIS dulu
            ->orderBy('nama')   // ✅ Kemudian berdasarkan nama
            ->paginate(40)      // ✅ Ubah menjadi 40 per halaman
            ->withQueryString();

        return view('dosen.index', compact('dosens'));
    }

    // ➕ Form Tambah Data
    public function create()
    {
        return view('dosen.create');
    }

    // 💾 Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'ptkis' => 'required|string|max:255',
        ]);

        Dosen::create($request->only(['nama', 'jabatan', 'ptkis']));

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    // ✏️ Form Edit Data
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    // 💾 Simpan Perubahan Data
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'ptkis' => 'required|string|max:255',
        ]);

        $dosen->update($request->only(['nama', 'jabatan', 'ptkis']));

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diubah');
    }

    // ❌ Hapus Data
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }

    // 🌐 Halaman Publik: Dosen Tersertifikasi, dikelompokkan per PTKIS
    public function dosen1(Request $request)
    {
        $search = $request->input('search');

        // Query untuk pagination
        $dosens = Dosen::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%$search%")
                      ->orWhere('jabatan', 'like', "%$search%")
                      ->orWhere('ptkis', 'like', "%$search%");
            })
            ->orderBy('ptkis')  // ✅ Urutkan berdasarkan PTKIS dulu
            ->orderBy('id')     // ✅ Ubah ke ID untuk konsistensi urutan
            ->paginate(40)      // ✅ Ubah menjadi 40 per halaman
            ->withQueryString();

        // Hitung counter per PTKIS untuk penomoran yang benar
        $counters = [];
        
        if ($dosens->count() > 0) {
            // Ambil semua data yang sesuai filter untuk menghitung posisi
            $allFilteredDosens = Dosen::query()
                ->when($search, function ($query, $search) {
                    $query->where('nama', 'like', "%$search%")
                          ->orWhere('jabatan', 'like', "%$search%")
                          ->orWhere('ptkis', 'like', "%$search%");
                })
                ->orderBy('ptkis')
                ->orderBy('id')
                ->get();
            
            // Buat mapping ID ke nomor urut per PTKIS
            $idToNumber = [];
            $tempCounters = [];
            
            foreach ($allFilteredDosens as $dosen) {
                if (!isset($tempCounters[$dosen->ptkis])) {
                    $tempCounters[$dosen->ptkis] = 0;
                }
                $tempCounters[$dosen->ptkis]++;
                $idToNumber[$dosen->id] = $tempCounters[$dosen->ptkis];
            }
            
            // Set counter awal untuk setiap PTKIS di halaman ini
            $groupedDosens = $dosens->groupBy('ptkis');
            foreach ($groupedDosens as $ptkis => $group) {
                $firstDosenInGroup = $group->first();
                $counters[$ptkis] = $idToNumber[$firstDosenInGroup->id] - 1;
            }
        }

        return view('dosen1', compact('dosens', 'counters'));
    }
}