<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurnalPtkis;

class PtkisJurnalController extends Controller
{
    public function index(Request $request)
    {
        $query = JurnalPtkis::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_univ', 'like', "%$search%")
                  ->orWhere('nama_jurnal', 'like', "%$search%");
        }

        $jurnals = $query->paginate(20); // max 20 per halaman

        return view('jurnal-ptkis', compact('jurnals'));
    }
}
