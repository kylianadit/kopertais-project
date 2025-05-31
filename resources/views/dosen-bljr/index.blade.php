@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Daftar Dosen Tugas Belajar</h2>

        {{-- Form Pencarian --}}
        <form method="GET" action="{{ route('dosen-bljr.index') }}" class="flex items-center gap-2">
            <input type="text" name="search" placeholder="Cari nama dosen..." value="{{ request('search') }}"
                class="border border-green-300 rounded px-3 py-1 w-64">
            <button type="submit"
                class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700 transition">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('dosen-bljr.index') }}"
                    class="bg-gray-300 text-black px-4 py-1 rounded hover:bg-gray-400 transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <a href="{{ route('dosen-bljr.create') }}"
       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block transition">
        + Tambah Data
    </a>

    {{-- Tabel Data --}}
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-green-300 bg-white shadow rounded">
            <thead class="bg-green-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Jabatan</th>
                    <th class="px-4 py-2 border">Tempat Tugas Belajar</th>
                    <th class="px-4 py-2 border">Tahun</th>
                    <th class="px-4 py-2 border">PTKIS</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $item)
                <tr class="text-center">
                    <td class="px-4 py-2 border">{{ $data->firstItem() + $index }}</td>
                    <td class="px-4 py-2 border">{{ $item->nama }}</td>
                    <td class="px-4 py-2 border">{{ $item->jabatan }}</td>
                    <td class="px-4 py-2 border">{{ $item->tempat_tugas }}</td>
                    <td class="px-4 py-2 border">{{ $item->tahun }}</td>
                    <td class="px-4 py-2 border">{{ $item->ptkis }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <a href="{{ route('dosen-bljr.edit', $item->id) }}"
                           class="inline-block px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('dosen-bljr.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                    class="inline-block px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Data tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $data->withQueryString()->links() }}
    </div>
</div>
@endsection
