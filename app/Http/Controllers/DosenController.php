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

        // ✅ Hitung penomoran kontinyu per PTKIS
        $counters = $this->calculateContinuousCounters($search, $dosens);
        
        // ✅ Hitung total dosen per PTKIS untuk ditampilkan di header
        $totalDosenPerPtkis = $this->calculateTotalDosenPerPtkis($search, $dosens);

        return view('dosen.index', compact('dosens', 'counters', 'totalDosenPerPtkis'));
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

        // ✅ Hitung penomoran kontinyu per PTKIS
        $counters = $this->calculateContinuousCounters($search, $dosens);
        
        // ✅ Hitung total dosen per PTKIS untuk ditampilkan di header
        $totalDosenPerPtkis = $this->calculateTotalDosenPerPtkis($search, $dosens);

        return view('dosen1', compact('dosens', 'counters', 'totalDosenPerPtkis'));
    }

    // ✅ Helper method untuk menghitung penomoran kontinyu per PTKIS
    private function calculateContinuousCounters($search, $paginatedDosens)
    {
        $counters = [];
        
        if ($paginatedDosens->count() > 0) {
            // Ambil semua data yang sesuai filter sampai halaman saat ini
            $currentPage = $paginatedDosens->currentPage();
            $perPage = $paginatedDosens->perPage();
            $offset = ($currentPage - 1) * $perPage;
            
            $allPreviousDosens = Dosen::query()
                ->when($search, function ($query, $search) {
                    $query->where('nama', 'like', "%$search%")
                          ->orWhere('jabatan', 'like', "%$search%")
                          ->orWhere('ptkis', 'like', "%$search%");
                })
                ->orderBy('ptkis')
                ->orderBy('id')
                ->take($offset) // Ambil data sebelum halaman saat ini
                ->get();
            
            // Hitung berapa banyak dosen per PTKIS yang sudah lewat
            $previousCounts = [];
            foreach ($allPreviousDosens as $dosen) {
                if (!isset($previousCounts[$dosen->ptkis])) {
                    $previousCounts[$dosen->ptkis] = 0;
                }
                $previousCounts[$dosen->ptkis]++;
            }
            
            // Set counter awal untuk setiap PTKIS di halaman ini
            $groupedDosens = $paginatedDosens->groupBy('ptkis');
            foreach ($groupedDosens as $ptkis => $group) {
                $counters[$ptkis] = isset($previousCounts[$ptkis]) ? $previousCounts[$ptkis] : 0;
            }
        }

        return $counters;
    }

    // ✅ Helper method untuk menghitung total dosen per PTKIS
    private function calculateTotalDosenPerPtkis($search, $paginatedDosens)
    {
        $totalCounts = [];
        
        if ($paginatedDosens->count() > 0) {
            // Ambil semua data yang sesuai filter untuk menghitung total per PTKIS
            $allFilteredDosens = Dosen::query()
                ->when($search, function ($query, $search) {
                    $query->where('nama', 'like', "%$search%")
                          ->orWhere('jabatan', 'like', "%$search%")
                          ->orWhere('ptkis', 'like', "%$search%");
                })
                ->select('ptkis')
                ->get()
                ->groupBy('ptkis');
            
            // Hitung total untuk setiap PTKIS
            foreach ($allFilteredDosens as $ptkis => $group) {
                $totalCounts[$ptkis] = $group->count();
            }
        }

        return $totalCounts;
    }
}