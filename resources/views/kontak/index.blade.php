@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-xl rounded-2xl p-6 border border-green-100">
        <h1 class="text-3xl font-bold text-green-700 mb-6 border-b-2 border-green-200 pb-3">
            📬 Daftar Pesan Kontak
        </h1>

        {{-- Form pencarian --}}
        <form method="GET" action="{{ route('kontak.index') }}" class="mb-4">
            <div class="flex items-center gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari berdasarkan nama..."
                    class="w-full sm:w-1/3 px-4 py-2 border border-green-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300"
                >
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
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700 border border-green-200 rounded-lg">
                <thead class="bg-green-100 text-green-900 font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-center w-16">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Pesan</th>
                        <th class="px-6 py-3">Waktu</th>
                        <th class="px-6 py-3 text-center w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-green-100">
                    @forelse ($kontaks as $index => $kontak)
                        <tr class="hover:bg-green-50 transition duration-150">
                            <td class="px-4 py-4 text-center font-medium text-green-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-green-800">
                                {!! request('search') ? 
                                    str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $kontak->nama) 
                                    : e($kontak->nama) !!}
                            </td>
                            <td class="px-6 py-4">{{ $kontak->email }}</td>
                            <td class="px-6 py-4">
                                <div class="max-w-xs truncate" title="{{ $kontak->pesan }}">
                                    {{ $kontak->pesan }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                               {{ \Carbon\Carbon::parse($kontak->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full hover:bg-red-200 transition duration-150"
                                            title="Hapus pesan"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pesan dari {{ $kontak->nama }}?')">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-400 italic">
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