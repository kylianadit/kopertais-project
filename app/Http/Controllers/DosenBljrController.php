<?php

namespace App\Http\Controllers;

use App\Models\DosenBljr;
use Illuminate\Http\Request;

class DosenBljrController extends Controller
{
    /**
     * HALAMAN INDEX (ADMIN) - Dengan pencarian dan pagination
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = DosenBljr::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%")
                      ->orWhere('jabatan', 'like', "%$search%")
                      ->orWhere('tempat_tugas', 'like', "%$search%")
                      ->orWhere('tahun', 'like', "%$search%")
                      ->orWhere('ptkis', 'like', "%$search%");
                });
            })
            ->orderBy('nama')
            ->paginate(20)
            ->withQueryString();

        return view('dosen-bljr.index', compact('data', 'search'));
    }

    /**
     * TAMPILKAN FORM TAMBAH
     */
    public function create()
    {
        return view('dosen-bljr.create');
    }

    /**
     * SIMPAN DATA BARU
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'tempat_tugas' => 'required|string|max:255',
            'tahun' => 'required|numeric|min:1900|max:2100',
            'ptkis' => 'required|string|max:255',
        ]);

        DosenBljr::create($request->all());

        return redirect()->route('dosen-bljr.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * TAMPILKAN FORM EDIT
     */
    public function edit($id)
    {
        $item = DosenBljr::findOrFail($id);
        return view('dosen-bljr.edit', compact('item'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'tempat_tugas' => 'required|string|max:255',
            'tahun' => 'required|numeric|min:1900|max:2100',
            'ptkis' => 'required|string|max:255',
        ]);

        $item = DosenBljr::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('dosen-bljr.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * HAPUS DATA
     */
    public function destroy($id)
    {
        DosenBljr::destroy($id);
        return redirect()->route('dosen-bljr.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * TAMPILAN UNTUK USER (halaman dosen2)
     */
    public function dosen2(Request $request)
    {
        $search = $request->input('search');

        $tugasBelajar = DosenBljr::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%")
                      ->orWhere('jabatan', 'like', "%$search%")
                      ->orWhere('tempat_tugas', 'like', "%$search%")
                      ->orWhere('tahun', 'like', "%$search%")
                      ->orWhere('ptkis', 'like', "%$search%");
                });
            })
            ->orderBy('nama')
            ->paginate(20)
            ->withQueryString();

        return view('dosen2', compact('tugasBelajar', 'search'));
    }
}
