<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Dosen</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <section class="px-4 py-6">
        <h2 class="font-semibold text-xl mb-4">Tambah Dosen</h2>

        <a href="{{ route('dosen.index') }}"
        class="inline-block mb-4 px-4 py-2 border bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
       Kembali
     </a>
     


        <form action="{{ route('dosen.store') }}" method="POST" class="bg-white shadow rounded p-6 max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" name="jabatan" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-700">PTKIS</label>
                <input type="text" name="ptkis" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        </form>
    </section>
</body>
</html>
