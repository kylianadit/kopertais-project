<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurnal PTKIS</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom CSS untuk fix alignment -->
    <style>
        .journals-table {
            table-layout: fixed;
            border-collapse: collapse;
        }
        
        .journals-table th,
        .journals-table td {
            vertical-align: top;
            text-align: left;
        }
        
        /* Fixed column widths */
        .journals-table th:nth-child(1),
        .journals-table td:nth-child(1) {
            width: 60px;
            text-align: center;
            vertical-align: middle;
        }
        
        .journals-table th:nth-child(2),
        .journals-table td:nth-child(2) {
            width: 45%;
            min-width: 200px;
        }
        
        .journals-table th:nth-child(3),
        .journals-table td:nth-child(3) {
            width: 120px;
            text-align: center;
            vertical-align: middle;
        }
        
        .journals-table th:nth-child(4),
        .journals-table td:nth-child(4) {
            width: 120px;
            text-align: center;
            vertical-align: middle;
        }
        
        /* Ensure consistent row height */
        .journals-table tbody tr {
            min-height: 60px;
        }
        
        .journals-table tbody td {
            padding-top: 12px;
            padding-bottom: 12px;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Header with Akreditasi Prodi PTKIS title -->
    <div class="bg-green-700 rounded-lg shadow p-6 mb-6">
        <div class="text-center">
            <i class="fas fa-university text-3xl text-white mb-3"></i>
            <h1 class="text-2xl font-semibold text-white mb-1">
                Jurnal PTKIS
            </h1>
            <p class="text-white">
                Berikut Jurnal Jurnal PTKIS
            </p>
        </div>
    </div>

    <!-- Search -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <form method="GET" action="{{ route('jurnal-ptkis') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama PTKIS..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
            </div>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <i class="fas fa-search mr-2"></i>Cari
            </button>
        </form>
    </div>

    <!-- Universities List -->
    @php $search = request('search'); @endphp

    @forelse ($universitasList as $univ)
        @php
            $highlightedNamaUniv = $search
                ? str_ireplace($search, '<strong class="text-green-700 font-semibold">'.$search.'</strong>', $univ->nama)
                : $univ->nama;
        @endphp

        <div class="bg-white rounded-lg shadow mb-6">
            <!-- University Header as green bar -->
            <div class="bg-green-600 text-white px-6 py-4 rounded-t-lg">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h2 class="text-lg font-semibold">{!! $highlightedNamaUniv !!}</h2>
                    <div class="bg-green-50 px-3 py-2 rounded-lg border border-green-200">
                        <div class="text-xs text-green-700">Skor Overall</div>
                        <div class="text-lg font-semibold text-green-800">{{ number_format($univ->skor_overall ?? 0, 2) }}</div>
                    </div>
                </div>
            </div>

            @if ($univ->jurnals->count())
                <!-- Journals Table with fixed alignment -->
                <div class="overflow-x-auto">
                    <table class="journals-table w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-sm font-medium text-gray-700 border-r">No</th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-700 border-r">
                                    <i class="fas fa-book mr-2"></i>Nama Jurnal
                                </th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-700 border-r">
                                    <i class="fas fa-link mr-2"></i>Link
                                </th>
                                <th class="px-4 py-3 text-sm font-medium text-gray-700">
                                    <i class="fas fa-award mr-2"></i>Akreditasi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($univ->jurnals as $index => $jurnal)
                                @php
                                    $highlightedNamaJurnal = $search
                                        ? str_ireplace($search, '<strong class="text-black font-semibold">'.$search.'</strong>', $jurnal->nama_jurnal)
                                        : $jurnal->nama_jurnal;
                                @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm border-r">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800 break-words border-r">{!! $highlightedNamaJurnal !!}</td>
                                    <td class="px-4 py-3 border-r">
                                        <a href="{{ $jurnal->link_jurnal }}" target="_blank"
                                           class="inline-flex items-center gap-1 px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">
                                            <i class="fas fa-external-link-alt"></i>Kunjungi
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-medium">
                                            {{ $jurnal->akreditasi }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-8 text-center">
                    <i class="fas fa-folder-open text-2xl text-gray-400 mb-2"></i>
                    <p class="text-gray-500">Belum ada jurnal yang terdaftar.</p>
                </div>
            @endif
        </div>
    @empty
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <i class="fas fa-search text-3xl text-gray-400 mb-4"></i>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Data tidak ditemukan</h3>
            <p class="text-gray-500">Coba ubah kata kunci pencarian Anda</p>
        </div>
    @endforelse
</div>

<!-- Footer -->
<footer class="bg-green-700 border-t border-gray-200 mt-8">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="text-center">
            <p class="text-sm text-white">&copy; 2025 Kopertais XV Lampung. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    window.addEventListener("pageshow", function(event) {
        if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
            window.location.reload();
        }
    });
</script>

</body>
</html>