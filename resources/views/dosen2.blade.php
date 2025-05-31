<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosen Tugas Belajar</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
<body>
<section class="p-6 bg-green-700 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-2xl p-6">
        <h1 class="text-xl font-bold text-green-800 text-center mb-6">
            Daftar Dosen Tugas Belajar
        </h1>

        {{-- Form Pencarian --}}
        <form method="GET" action="{{ url('/dosen2') }}" class="mb-6 flex flex-col sm:flex-row gap-2 sm:items-center justify-between">
            <div class="flex gap-2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari nama dosen..." 
                    value="{{ request('search') }}"
                    class="border border-green-300 rounded px-3 py-1 w-64"
                >
                <button 
                    type="submit"
                    class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700"
                >
                    Cari
                </button>
            </div>
        </form>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="min-w-full table-fixed border border-green-300">
                <thead class="bg-green-100">
                    <tr>
                        <th class="w-16 px-4 py-2 border-b text-center text-sm font-semibold text-green-800">No</th>
                        <th class="w-1/5 px-4 py-2 border-b text-left text-sm font-semibold text-green-800">Nama Dosen</th>
                        <th class="w-1/5 px-4 py-2 border-b text-left text-sm font-semibold text-green-800">Jabatan Fungsional</th>
                        <th class="w-1/5 px-4 py-2 border-b text-left text-sm font-semibold text-green-800">Tempat Tugas Belajar</th>
                        <th class="w-16 px-4 py-2 border-b text-center text-sm font-semibold text-green-800">Tahun</th>
                        <th class="w-1/5 px-4 py-2 border-b text-left text-sm font-semibold text-green-800">PTKIS</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse ($tugasBelajar as $index => $dosen)
                        <tr class="hover:bg-green-50">
                            <td class="px-4 py-2 border-b text-center table-cell">{{ $tugasBelajar->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border-b text-left table-cell">{{ $dosen->nama }}</td>
                            <td class="px-4 py-2 border-b text-left table-cell">{{ $dosen->jabatan }}</td>
                            <td class="px-4 py-2 border-b text-left table-cell">{{ $dosen->tempat_tugas }}</td>
                            <td class="px-4 py-2 border-b text-center table-cell">{{ $dosen->tahun }}</td>
                            <td class="px-4 py-2 border-b text-left table-cell">{{ $dosen->ptkis }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $tugasBelajar->links() }}
        </div>
    </div>
</section>

<footer class="bg-white text-green-700 text-center py-4">
    <p>&copy; 2025 Kopertais XV Lampung. All rights reserved.</p>
</footer>

<script>
    // Bersihkan input pencarian jika kembali dari tombol back browser
    window.addEventListener("pageshow", function (event) {
        if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.value = '';
            }
        }
    });
</script>

</body>
</html>