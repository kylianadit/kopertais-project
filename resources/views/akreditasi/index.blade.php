@extends('layouts.app')

@section('content')
<div class="p-4">
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 gap-4">
        <h2 class="text-2xl font-bold text-green-800">Akreditasi Prodi PTKIS</h2>

        <div class="flex gap-2">
            <form method="GET" action="{{ route('akreditasi.index') }}" class="flex gap-2">
                <input type="text" name="search" placeholder="Cari nama PTKIS..."
                       value="{{ request('search') }}"
                       class="border border-green-300 rounded w-64"
                       style="height: 42px; padding: 0 16px; line-height: 42px;">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white rounded"
                        style="height: 42px; padding: 0 16px; line-height: 42px;">
                    Cari
                </button>
            </form>

            <a href="{{ route('akreditasi.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white rounded shadow text-center"
               style="height: 42px; padding: 0 16px; line-height: 42px; display: inline-block; text-decoration: none;">
                + Tambah Akreditasi
            </a>
        </div>
    </div>

    {{-- Tabel Data Kelompok --}}
    @php
        $groupedAkreditasi = $akreditasis->getCollection()->groupBy('ptkis');
        $currentPage = $akreditasis->currentPage();
        $perPage = $akreditasis->perPage();
        
        // Hitung nomor urut per universitas dari halaman sebelumnya
        $universityCounters = [];
        
        if ($currentPage > 1) {
            // Ambil data dari halaman sebelumnya untuk menghitung counter
            $search = request('search');
            $previousQuery = \App\Models\Akreditasi::query()
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
                ->take(($currentPage - 1) * $perPage)
                ->get();
            
            // Hitung jumlah item per universitas dari data sebelumnya
            foreach ($previousQuery->groupBy('ptkis') as $ptkis => $items) {
                $universityCounters[$ptkis] = $items->count();
            }
        }
    @endphp

    @forelse($groupedAkreditasi as $ptkis => $prodis)
        @php
            // Inisialisasi counter untuk universitas ini jika belum ada
            if (!isset($universityCounters[$ptkis])) {
                $universityCounters[$ptkis] = 0;
            }
        @endphp
        
        <div class="mb-8 border rounded-md shadow-sm">
            <div class="bg-green-600 text-white text-lg font-semibold px-4 py-3 rounded-t-md">
                {{ $ptkis }}
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border text-left table-fixed">
                    <thead class="bg-green-100 text-green-800 font-semibold">
                        <tr>
                            <th class="px-4 py-2 border w-16">No</th>
                            <th class="px-4 py-2 border w-24">Jenjang</th>
                            <th class="px-4 py-2 border">Program Studi</th>
                            <th class="px-4 py-2 border w-32 text-center">Akreditasi</th>
                            <th class="px-4 py-2 border w-32 text-center">Exp</th>
                            <th class="px-4 py-2 border w-40 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prodis as $loopIndex => $a)
                        <tr class="hover:bg-gray-50 border-b">
                            {{-- Nomor urut per universitas --}}
                            <td class="px-4 py-2 border text-center">{{ ++$universityCounters[$ptkis] }}</td>
                            <td class="px-4 py-2 border text-center">{{ $a->jenjang }}</td>
                            <td class="px-4 py-2 border">{{ $a->prodi }}</td>
                            <td class="px-4 py-2 border text-center">
                                <span class="inline-block px-2 py-1 text-xs rounded-full font-bold bg-green-100 text-green-700">
                                    {{ $a->akreditasi }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border text-center">{{ $a->exp }}</td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('akreditasi.edit', $a->id) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('akreditasi.destroy', $a->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-4">Tidak ada data akreditasi.</div>
    @endforelse

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $akreditasis->withQueryString()->links() }}
    </div>
</div>
@endsection