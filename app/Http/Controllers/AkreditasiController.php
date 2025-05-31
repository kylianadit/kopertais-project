<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    /**
     * TAMPILKAN DATA UNTUK ADMIN (dengan pencarian & pagination)
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $akreditasis = Akreditasi::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ptkis', 'like', "%$search%")
                      ->orWhere('jenjang', 'like', "%$search%")
                      ->orWhere('prodi', 'like', "%$search%")
                      ->orWhere('akreditasi', 'like', "%$search%")
                      ->orWhere('exp', 'like', "%$search%");
                });
            })
            ->orderBy('ptkis')  // Urutkan berdasarkan PTKIS dulu
            ->orderBy('jenjang') // Lalu jenjang
            ->orderBy('prodi')   // Lalu prodi
            ->paginate(20)
            ->withQueryString();

        return view('akreditasi.index', compact('akreditasis', 'search'));
    }

    /**
     * TAMPILKAN DATA UNTUK USER (dengan pencarian, pagination, dan dikelompokkan per PTKIS)
     */
    public function userIndex(Request $request)
    {
        $search = $request->query('search');
        $perPage = 20;

        // Query dasar untuk mendapatkan data akreditasi
        $query = Akreditasi::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ptkis', 'like', "%$search%")
                      ->orWhere('jenjang', 'like', "%$search%")
                      ->orWhere('prodi', 'like', "%$search%")
                      ->orWhere('akreditasi', 'like', "%$search%")
                      ->orWhere('exp', 'like', "%$search%");
                });
            })
            ->orderBy('ptkis')
            ->orderBy('jenjang')
            ->orderBy('prodi');

        // Ambil data dengan pagination
        $akreditasis = $query->paginate($perPage)->withQueryString();
        
        // Hitung offset untuk penomoran per universitas
        $currentPage = $akreditasis->currentPage();
        $universityCounters = [];
        
        // Jika bukan halaman pertama, hitung counter dari halaman sebelumnya
        if ($currentPage > 1) {
            $previousQuery = Akreditasi::query()
                ->when($search, function ($query, $search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('ptkis', 'like', "%$search%")
                          ->orWhere('jenjang', 'like', "%$search%")
                          ->orWhere('prodi', 'like', "%$search%")
                          ->orWhere('akreditasi', 'like', "%$search%")
                          ->orWhere('exp', 'like', "%$search%");
                    });
                })
                ->orderBy('ptkis')
                ->orderBy('jenjang')
                ->orderBy('prodi');
            
            // Ambil data dari halaman sebelumnya
            $previousData = $previousQuery->take(($currentPage - 1) * $perPage)->get();
            
            // Hitung jumlah item per universitas dari data sebelumnya
            foreach ($previousData->groupBy('ptkis') as $ptkis => $items) {
                $universityCounters[$ptkis] = $items->count();
            }
        }
        
        // Group data untuk halaman saat ini
        $groupedAkreditasi = $akreditasis->getCollection()->groupBy('ptkis');
        
        // Tambahkan counter ke setiap item
        foreach ($groupedAkreditasi as $ptkis => $prodis) {
            // Inisialisasi counter untuk universitas ini jika belum ada
            if (!isset($universityCounters[$ptkis])) {
                $universityCounters[$ptkis] = 0;
            }
            
            // Tambahkan nomor urut untuk setiap prodi dalam universitas ini
            foreach ($prodis as $prodi) {
                $prodi->university_number = ++$universityCounters[$ptkis];
            }
        }

        return view('akreditasi-user', [
            'akreditasis' => $akreditasis,
            'groupedAkreditasi' => $groupedAkreditasi,
            'search' => $search,
        ]);
    }

    /**
     * TAMPILKAN FORM TAMBAH DATA (admin)
     */
    public function create()
    {
        return view('akreditasi.create');
    }

    /**
     * SIMPAN DATA BARU (admin)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ptkis' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'prodi' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:10',
            'exp' => 'required|date',
        ], [
            'ptkis.required' => 'Nama PTKIS wajib diisi',
            'jenjang.required' => 'Jenjang wajib diisi',
            'prodi.required' => 'Program Studi wajib diisi',
            'akreditasi.required' => 'Status Akreditasi wajib diisi',
            'exp.required' => 'Tanggal Expired wajib diisi',
            'exp.date' => 'Format tanggal tidak valid',
        ]);

        try {
            Akreditasi::create($validated);
            return redirect()->route('akreditasi.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * TAMPILKAN FORM EDIT (admin)
     */
    public function edit(Akreditasi $akreditasi)
    {
        return view('akreditasi.edit', compact('akreditasi'));
    }

    /**
     * UPDATE DATA (admin)
     */
    public function update(Request $request, Akreditasi $akreditasi)
    {
        $validated = $request->validate([
            'ptkis' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'prodi' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:10',
            'exp' => 'required|date',
        ], [
            'ptkis.required' => 'Nama PTKIS wajib diisi',
            'jenjang.required' => 'Jenjang wajib diisi',
            'prodi.required' => 'Program Studi wajib diisi',
            'akreditasi.required' => 'Status Akreditasi wajib diisi',
            'exp.required' => 'Tanggal Expired wajib diisi',
            'exp.date' => 'Format tanggal tidak valid',
        ]);

        try {
            $akreditasi->update($validated);
            return redirect()->route('akreditasi.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * HAPUS DATA (admin)
     */
    public function destroy(Akreditasi $akreditasi)
    {
        try {
            $akreditasi->delete();
            return redirect()->route('akreditasi.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * EXPORT DATA (opsional - untuk CSV atau Excel)
     */
    public function export(Request $request)
    {
        $search = $request->query('search');

        $akreditasis = Akreditasi::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ptkis', 'like', "%$search%")
                      ->orWhere('jenjang', 'like', "%$search%")
                      ->orWhere('prodi', 'like', "%$search%")
                      ->orWhere('akreditasi', 'like', "%$search%")
                      ->orWhere('exp', 'like', "%$search%");
                });
            })
            ->orderBy('ptkis')
            ->orderBy('jenjang')
            ->orderBy('prodi')
            ->get();

        // Return sebagai JSON (ganti ke Excel/CSV jika dibutuhkan)
        return response()->json($akreditasis);
    }
}