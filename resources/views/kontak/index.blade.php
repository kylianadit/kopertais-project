@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-xl p-6 border border-green-100">
        <h1 class="text-2xl sm:text-3xl font-bold text-green-700 mb-6 border-b border-green-200 pb-3">
            Daftar Pesan Kontak
        </h1>

        {{-- Form Pencarian --}}
        <form method="GET" action="{{ route('kontak.index') }}" class="mb-4">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari berdasarkan nama..."
                    class="w-full sm:w-1/3 px-4 py-2 border border-green-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300"
                >
                <div class="flex gap-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('kontak.index') }}"
                           class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                            Reset
                        </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Tabel --}}
        <div class="overflow-auto rounded-lg border border-green-100">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-green-100 text-green-900 font-semibold">
                    <tr>
                        <th class="px-3 py-2 text-center w-12">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Pesan</th>
                        <th class="px-4 py-2">Waktu</th>
                        <th class="px-4 py-2 text-center w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-green-100">
                    @forelse ($kontaks as $index => $kontak)
                        <tr class="hover:bg-green-50 transition duration-150">
                            <td class="px-3 py-3 text-center text-green-600 font-semibold">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-green-800">
                                {!! request('search') ? 
                                    str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $kontak->nama) 
                                    : e($kontak->nama) !!}
                            </td>
                            <td class="px-4 py-3">{{ $kontak->email }}</td>
                            <td class="px-4 py-3">
                                <div class="max-w-xs truncate" title="{{ $kontak->pesan }}">
                                    {{ $kontak->pesan }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($kontak->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                    class="bg-red-600 text-white text-sm px-4 py-2 rounded hover:bg-red-700 transition"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pesan dari {{ $kontak->nama }}?')">
                                    Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-400 italic">
                                Belum ada pesan yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
