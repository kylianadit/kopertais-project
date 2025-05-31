<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    // Menyimpan data dari form kontak
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        Kontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }

    // Menampilkan daftar pesan ke dashboard admin dengan pencarian nama
    public function index(Request $request)
    {
        $query = Kontak::query();

        // Fitur pencarian berdasarkan nama
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kontaks = $query->latest()->get(); // Ambil semua data (bisa juga pakai paginate)

        return view('kontak.index', compact('kontaks'));
    }

    // Menghapus data pesan kontak
    public function destroy($id)
    {
        try {
            $kontak = Kontak::findOrFail($id);
            $namaKontak = $kontak->nama; // Simpan nama untuk pesan
            $kontak->delete();
            
            return redirect()->route('kontak.index')
                           ->with('success', 'Pesan dari "' . $namaKontak . '" berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('kontak.index')
                           ->with('error', 'Terjadi kesalahan saat menghapus pesan.');
        }
    }
}