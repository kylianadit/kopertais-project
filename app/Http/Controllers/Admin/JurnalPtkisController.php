<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JurnalPtkis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class JurnalPtkisController extends Controller
{
    // Tampilkan daftar jurnal untuk admin (terkelompok per universitas dengan pagination dan search)
    public function index(Request $request)
    {
        $search = $request->get('search');
        $perPage = 50;
        $currentPage = $request->get('page', 1);

        // Buat query dengan kondisi search
        $query = JurnalPtkis::query();
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_universitas', 'like', "%{$search}%")
                  ->orWhere('nama_jurnal', 'like', "%{$search}%");
            });
        }

        // Ambil semua jurnal yang diurutkan dengan filter search
        $allJournals = $query->orderBy('nama_universitas')->orderBy('id')->get();
        
        // Hitung total jurnal dan offset
        $totalJournals = $allJournals->count();
        $offset = ($currentPage - 1) * $perPage;
        
        // Ambil jurnal untuk halaman saat ini
        $currentPageJournals = $allJournals->slice($offset, $perPage);
        
        // Buat mapping nomor jurnal berdasarkan universitas
        $universityJournalNumbers = [];
        
        // Hitung nomor jurnal untuk setiap universitas dari awal
        foreach ($allJournals->groupBy('nama_universitas') as $univName => $univJournals) {
            $universityJournalNumbers[$univName] = [];
            $counter = 1;
            foreach ($univJournals as $journal) {
                $universityJournalNumbers[$univName][$journal->id] = $counter++;
            }
        }
        
        // Kelompokkan jurnal berdasarkan universitas untuk halaman saat ini
        $groupedJournals = $currentPageJournals->groupBy('nama_universitas')->map(function ($group) use ($universityJournalNumbers) {
            return $group->map(function ($journal) use ($universityJournalNumbers) {
                $journal->display_number = $universityJournalNumbers[$journal->nama_universitas][$journal->id];
                return $journal;
            });
        });

        // Buat paginator sederhana
        $jurnals = new LengthAwarePaginator(
            $groupedJournals,
            $totalJournals,
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'pageName' => 'page',
            ]
        );

        // Append search parameter ke pagination
        if ($search) {
            $jurnals->appends(['search' => $search]);
        }

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

    // Tampilkan data jurnal untuk publik (dengan pencarian, pagination, dan skor rata-rata)
    public function publicView(Request $request)
    {
        $search = $request->search;
        $perPage = 50;
        $currentPage = $request->get('page', 1);

        $query = JurnalPtkis::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_universitas', 'like', "%{$search}%")
                  ->orWhere('nama_jurnal', 'like', "%{$search}%");
            });
        }

        // Ambil semua jurnal yang diurutkan
        $allJournals = $query->orderBy('nama_universitas')->orderBy('id')->get();
        
        // Hitung skor overall untuk semua universitas dari semua jurnal
        $universityOverallScores = $allJournals->groupBy('nama_universitas')->map(function ($group) {
            return $group->sum('skor');
        });
        
        // Hitung total jurnal dan offset
        $totalJournals = $allJournals->count();
        $offset = ($currentPage - 1) * $perPage;
        
        // Ambil 50 jurnal untuk halaman saat ini
        $currentPageJournals = $allJournals->slice($offset, $perPage);
        
        // Buat mapping nomor jurnal berdasarkan universitas
        $universityJournalNumbers = [];
        
        // Hitung nomor jurnal untuk setiap universitas dari awal
        foreach ($allJournals->groupBy('nama_universitas') as $univName => $univJournals) {
            $universityJournalNumbers[$univName] = [];
            $counter = 1;
            foreach ($univJournals as $journal) {
                $universityJournalNumbers[$univName][$journal->id] = $counter++;
            }
        }
        
        // Kelompokkan jurnal berdasarkan universitas untuk halaman saat ini
        $universitasList = $currentPageJournals->groupBy('nama_universitas')->map(function ($group) use ($universityJournalNumbers, $universityOverallScores) {
            $univName = $group->first()->nama_universitas;
            return (object)[
                'nama' => $univName,
                'skor_overall' => $universityOverallScores[$univName], // Gunakan skor dari semua jurnal
                'jurnals' => $group->map(function ($journal) use ($universityJournalNumbers) {
                    $journal->journal_number = $universityJournalNumbers[$journal->nama_universitas][$journal->id];
                    return $journal;
                }),
            ];
        });

        // Buat custom paginator untuk jurnal dengan info yang benar
        $paginator = new LengthAwarePaginator(
            $currentPageJournals, // Data jurnal untuk pagination info yang benar
            $totalJournals,
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'pageName' => 'page',
            ]
        );

        // Append query parameters untuk search
        if ($search) {
            $paginator->appends(['search' => $search]);
        }

        return view('jurnal-ptkis', compact('universitasList', 'search', 'paginator'));
    }
}