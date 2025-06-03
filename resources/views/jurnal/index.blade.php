@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-green-700">Daftar Jurnal PTKIS</h1>
        <a href="{{ route('admin.jurnal-ptkis.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah</a>
    </div>

    {{-- Search Form --}}
    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
        <form method="GET" action="{{ route('admin.jurnal-ptkis.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari jurnal atau universitas..." 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Cari
                </button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @php
        $searchTerm = request('search');
        
        function highlightText($text, $search) {
            if (empty($search)) {
                return $text;
            }
            
            // Escape special regex characters
            $search = preg_quote($search, '/');
            
            // Replace matched text with highlighted version
            return preg_replace('/(' . $search . ')/i', '<span class="bg-yellow-200 font-bold text-black">$1</span>', $text);
        }
    @endphp

    @if ($jurnals->count())
        @foreach ($jurnals as $universitas => $jurnalList)
            <h2 class="text-lg font-bold text-green-800 mt-8 mb-2">
                {!! highlightText($universitas, $searchTerm) !!}
            </h2>
            <div class="overflow-x-auto mb-6">
                <table class="w-full table-fixed border border-gray-300 text-sm">
                    <thead class="bg-green-100 text-left">
                        <tr>
                            <th class="p-2 border w-1/12">No</th>
                            <th class="p-2 border w-1/4">Nama Jurnal</th>
                            <th class="p-2 border w-1/4">Link</th>
                            <th class="p-2 border w-1/6">Akreditasi</th>
                            <th class="p-2 border w-1/12">Skor</th>
                            <th class="p-2 border w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurnalList as $jurnal)
                            <tr class="hover:bg-green-50">
                                <td class="p-2 border text-center">{{ $jurnal->display_number }}</td>
                                <td class="p-2 border break-words">
                                    {!! highlightText($jurnal->nama_jurnal, $searchTerm) !!}
                                </td>
                                <td class="p-2 border">
                                    <a href="{{ $jurnal->link_jurnal }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">Lihat</a>
                                </td>
                                <td class="p-2 border">
                                    {!! highlightText($jurnal->akreditasi, $searchTerm) !!}
                                </td>
                                <td class="p-2 border text-center">{{ $jurnal->skor }}</td>
                                <td class="p-2 border">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.jurnal-ptkis.edit', $jurnal->id) }}" class="px-2 py-1 text-xs bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('admin.jurnal-ptkis.destroy', $jurnal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jurnal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        {{-- Laravel Default Pagination --}}
        <div class="mt-6 justify-between items-center">
            <div>
                {{ $jurnals->appends(request()->query())->links() }}
            </div>
        </div>
    @else
        <div class="text-center py-8">
            <div class="text-gray-400 mb-2">
                <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <p class="text-gray-600">
                @if(request('search'))
                    Tidak ada jurnal yang ditemukan untuk pencarian "{!! highlightText(request('search'), request('search')) !!}"
                @else
                    Belum ada data jurnal.
                @endif
            </p>
        </div>
    @endif
</div>
@endsection