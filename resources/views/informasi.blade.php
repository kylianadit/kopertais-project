<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Informasi PTKIS</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-50 text-gray-800">

<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Informasi PTKIS</h1>

    @forelse ($informasis as $informasi)
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        @if ($informasi->gambar)
            <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="Gambar" class="w-full h-auto">
        @endif
    
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ $informasi->judul }}</h2>
            <p class="text-gray-700">{{ $informasi->deskripsi }}</p>
        </div>
    </div>
    
    @empty
        <p class="text-gray-600 italic">Belum ada informasi yang tersedia.</p>
    @endforelse
</div>

</body>
</html>
