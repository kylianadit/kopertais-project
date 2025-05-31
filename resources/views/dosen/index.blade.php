@extends('layouts.app')

@section('content')
<section>
    <h2 class="font-semibold text-xl">Data Dosen</h2>

    <div class="py-6 px-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-2">
            <a href="{{ route('dosen.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded inline-block transition">
                + Tambah Dosen
            </a>

            <form action="{{ route('dosen.index') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama / jabatan / PTKIS"
                       class="border border-gray-300 rounded px-3 py-2 w-64 focus:outline-none focus:ring focus:border-green-400">

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
                    Cari
                </button>

                @if(request('search'))
                <a href="{{ route('dosen.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded transition">
                    Reset
                </a>
                @endif
            </form>
        </div>

        {{-- Grouped by PTKIS --}}
        @php
            $groupedDosens = $dosens->groupBy('ptkis');
        @endphp

        @forelse($groupedDosens as $ptkis => $group)
        <div class="mb-6 bg-white shadow rounded overflow-hidden">
            <!-- Header PTKIS -->
            <div class="bg-green-600 text-white px-4 py-2 flex justify-between items-center">
                <span class="font-semibold">
                    {!! request('search') ? 
                        str_ireplace(request('search'), '<strong class="underline">'.request('search').'</strong>', $ptkis) 
                        : e($ptkis) !!}
                </span>
                <span class="text-sm bg-green-700 px-2 py-1 rounded">
                    {{ $totalDosenPerPtkis[$ptkis] ?? $group->count() }} dosen
                </span>
            </div>

            <!-- Table untuk group ini -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="px-4 py-3 text-center font-medium text-gray-700 border-b w-16">No</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 border-b min-w-48">Nama</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 border-b min-w-40">Jabatan</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 border-b min-w-32">PTKIS</th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700 border-b w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($group as $dosen)
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-center align-top">
                                {{-- ✅ Penomoran kontinyu per PTKIS --}}
                                {{ ++$counters[$ptkis] }}
                            </td>
                            <td class="px-4 py-3 align-top">
                                {!! request('search') ? 
                                    str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $dosen->nama) 
                                    : e($dosen->nama) !!}
                            </td>
                            <td class="px-4 py-3 align-top">
                                {!! request('search') ? 
                                    str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $dosen->jabatan) 
                                    : e($dosen->jabatan) !!}
                            </td>
                            <td class="px-4 py-3 align-top">
                                {!! request('search') ? 
                                    str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $dosen->ptkis) 
                                    : e($dosen->ptkis) !!}
                            </td>
                            <td class="px-4 py-3 align-top">
                                <div class="flex gap-2 justify-center items-start">
                                    <a href="{{ route('dosen.edit', $dosen->id) }}"
                                       class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition whitespace-nowrap">
                                        Edit
                                    </a>
                                    <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus {{ $dosen->nama }}?')"
                                                class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition whitespace-nowrap">
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
        <div class="bg-white shadow rounded p-8 text-center text-gray-500">
            <p class="text-lg">Tidak ada data dosen.</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Dosen" untuk menambah data baru.</p>
        </div>
        @endforelse

        <!-- Pagination -->
        <div class="mt-4">
            {{ $dosens->withQueryString()->links() }}
        </div>
    </div>
</section>
@endsection