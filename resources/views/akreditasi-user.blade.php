@extends('layouts.user')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-green-700 mb-4 md:mb-0 md:text-left w-full md:w-auto">
                Akreditasi Prodi PTKIS
            </h1>

            {{-- Form Pencarian --}}
            <form method="GET" action="{{ route('akreditasi.user') }}" class="flex gap-2 w-full md:w-auto" id="searchForm">
                <input 
                    type="text" 
                    name="search" 
                    id="searchInput"
                    placeholder="Cari nama PTKIS..." 
                    value="{{ request('search') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md w-full md:w-64 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                    Cari
                </button>
            </form>
        </div>

        {{-- Grouped by PTKIS --}}
        @forelse($groupedAkreditasi as $ptkis => $prodis)
        <div class="mb-10 border rounded-md shadow-sm">
            <div class="bg-green-600 text-white text-lg font-semibold px-4 py-3 rounded-t-md">
                {!! request('search') ? 
                    str_ireplace(request('search'), '<strong class="underline">'.request('search').'</strong>', $ptkis) 
                    : e($ptkis) !!}
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border-collapse">
                    <thead class="bg-green-100 text-green-800 font-semibold">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center w-16">No</th>
                            <th class="px-4 py-3 border border-gray-300 text-center w-20">Jenjang</th>
                            <th class="px-4 py-3 border border-gray-300 text-left min-w-64">Program Studi</th>
                            <th class="px-4 py-3 border border-gray-300 text-center w-24">Akreditasi</th>
                            <th class="px-4 py-3 border border-gray-300 text-center w-28">Exp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prodis as $a)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 border border-gray-300 text-center align-middle">{{ $a->university_number }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center align-middle">{{ $a->jenjang }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-left align-middle">
                                {!! request('search') ? 
                                    str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $a->prodi) 
                                    : e($a->prodi) !!}
                            </td>
                            <td class="px-4 py-3 border border-gray-300 text-center align-middle">
                                <span class="inline-block px-2 py-1 text-xs rounded-full font-bold bg-green-100 text-green-700 whitespace-nowrap">
                                    {{ $a->akreditasi }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border border-gray-300 text-center align-middle whitespace-nowrap">{{ $a->exp }}</td>
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
</div>

<footer class="bg-green-700 text-white text-center py-4">
    <p>&copy; 2025 Kopertais XV Lampung. All rights reserved.</p>
</footer>

<script>
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');

    searchInput.addEventListener('input', function () {
        if (this.value.trim() === '') {
            searchForm.submit();
        }
    });
</script>
@endsection