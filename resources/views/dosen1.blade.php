<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen Tersertifikasi</title>
    @vite('resources/css/app.css')
    <style>
        /* Custom styles untuk alignment yang lebih baik */
        .table-fixed {
            table-layout: fixed;
        }
        
        .table-cell {
            vertical-align: middle;
            word-wrap: break-word;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-green-700 mb-2">Daftar Dosen Tersertifikasi</h1>
                <div class="w-24 h-1 bg-green-600 mx-auto rounded"></div>
            </div>

            <!-- Form Pencarian -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <form method="GET" action="{{ route('dosen1') }}" class="flex flex-col sm:flex-row items-center gap-3">
                    <div class="flex-1 w-full">
                        <input
                            type="text"
                            name="search"
                            placeholder="Cari nama, jabatan, atau PTKIS"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                            value="{{ request('search') }}"
                        >
                    </div>
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors font-medium shadow-sm">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('dosen1') }}" class="text-sm text-gray-600 hover:text-gray-800 underline transition-colors">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Cek apakah ada data -->
            @if($dosens->isEmpty())
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12">
                    <div class="text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-lg">Tidak ada data dosen yang ditemukan.</p>
                    </div>
                </div>
            @else
                @php
                    $groupedDosens = $dosens->groupBy('ptkis');
                    // Counter sudah dihitung di controller, tidak perlu query lagi di sini
                @endphp

                <!-- Grouped by PTKIS -->
                @foreach ($groupedDosens as $ptkis => $group)
                <div class="mb-10 border rounded-md shadow-sm">
                    <div class="bg-green-600 text-white text-lg font-semibold px-4 py-3 rounded-t-md">
                        {!! request('search') ? 
                            str_ireplace(request('search'), '<strong class="underline">'.request('search').'</strong>', $ptkis) 
                            : e($ptkis) !!}
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-fixed text-sm border-collapse">
                            <thead class="bg-green-100 text-green-800 font-semibold">
                                <tr>
                                    <th class="w-16 px-4 py-3 border border-gray-300 text-center">No</th>
                                    <th class="w-1/3 px-4 py-3 border border-gray-300 text-left">Nama</th>
                                    <th class="w-1/3 px-4 py-3 border border-gray-300 text-left">Jabatan Fungsional</th>
                                    <th class="w-1/3 px-4 py-3 border border-gray-300 text-left">PTKIS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group as $dosen)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 border border-gray-300 text-center table-cell">{{ ++$counters[$ptkis] }}</td>
                                    <td class="px-4 py-3 border border-gray-300 text-left table-cell">
                                        {!! request('search') ? 
                                            str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $dosen->nama) 
                                            : e($dosen->nama) !!}
                                    </td>
                                    <td class="px-4 py-3 border border-gray-300 text-left table-cell">
                                        {!! request('search') ? 
                                            str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $dosen->jabatan) 
                                            : e($dosen->jabatan) !!}
                                    </td>
                                    <td class="px-4 py-3 border border-gray-300 text-left table-cell">
                                        {!! request('search') ? 
                                            str_ireplace(request('search'), '<strong class="text-green-700">'.request('search').'</strong>', $dosen->ptkis) 
                                            : e($dosen->ptkis) !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $dosens->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>