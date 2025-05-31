@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-green-700">Daftar Jurnal PTKIS</h1>
        <a href="{{ route('admin.jurnal-ptkis.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($jurnals->count())
        @foreach ($jurnals as $universitas => $jurnalList)
            <h2 class="text-lg font-bold text-green-800 mt-8 mb-2">{{ $universitas }}</h2>
            <div class="overflow-x-auto mb-6">
                <table class="w-full table-fixed border border-gray-300 text-sm">
                    <thead class="bg-green-100 text-left">
                        <tr>
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
                                <td class="p-2 border break-words">{{ $jurnal->nama_jurnal }}</td>
                                <td class="p-2 border">
                                    <a href="{{ $jurnal->link_jurnal }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">Lihat</a>
                                </td>
                                <td class="p-2 border">{{ $jurnal->akreditasi }}</td>
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
    @else
        <p class="text-center text-gray-600 mt-4">Belum ada data jurnal.</p>
    @endif
</div>
@endsection
