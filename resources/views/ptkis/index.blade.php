@extends('layouts.app')

@section('content')
<div class="p-4">
    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header + Tombol Tambah --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 gap-3">
        <h2 class="text-2xl font-bold text-gray-800">Data PTKIS</h2>

        <div class="flex flex-col md:flex-row gap-2 items-stretch md:items-center">
            {{-- Form Pencarian --}}
            <form method="GET" action="{{ route('ptkis.index') }}" class="flex gap-2">
                <input type="text" name="search" placeholder="Cari nama PTKIS..." value="{{ request('search') }}"
                       class="px-4 py-2 border border-gray-300 rounded w-64">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('ptkis.index') }}"
                       class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
                        Reset
                    </a>
                @endif
            </form>

            {{-- Tombol Tambah --}}
            <a href="{{ route('ptkis.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
                + Tambah PTKIS
            </a>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-300 bg-white shadow rounded">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-2 text-left">Logo</th>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">Akreditasi</th>
                    <th class="border px-4 py-2 text-left">Alamat</th>
                    <th class="border px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ptkis as $ptki)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">
                            @if($ptki->logo)
                                @if($ptki->website)
                                    <a href="{{ $ptki->website }}" target="_blank">
                                        <img src="{{ asset('storage/' . $ptki->logo) }}"
                                             alt="Logo {{ $ptki->nama }}"
                                             class="w-16 h-16 object-contain rounded hover:opacity-80 transition duration-150">
                                    </a>
                                @else
                                    <img src="{{ asset('storage/' . $ptki->logo) }}"
                                         alt="Logo {{ $ptki->nama }}"
                                         class="w-16 h-16 object-contain rounded">
                                @endif
                            @else
                                <span class="text-gray-400 italic">Tidak ada logo</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 font-semibold text-gray-800">{{ $ptki->nama }}</td>
                        <td class="border px-4 py-2">{{ $ptki->akreditasi }}</td>
                        <td class="border px-4 py-2">{{ $ptki->alamat }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('ptkis.edit', $ptki->id) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('ptkis.destroy', $ptki->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data PTKIS.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
