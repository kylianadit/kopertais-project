<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jurnal - {{ $universitas->nama }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-50 p-6">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-green-800 mb-4">
            Daftar Jurnal - {{ $universitas->nama }}
        </h1>

        <div class="space-y-4">
            @forelse ($jurnals as $jurnal)
                <div class="bg-white rounded-xl shadow p-4 border border-green-200">
                    <h2 class="text-lg font-semibold text-green-900">{{ $jurnal->nama_jurnal }}</h2>
                    <p class="text-green-700 text-sm">Akreditasi: <strong>{{ $jurnal->akreditasi ?? '-' }}</strong></p>
                    <a href="{{ $jurnal->link_jurnal }}" target="_blank" class="text-blue-600 hover:underline">
                        Kunjungi Jurnal
                    </a>
                </div>
            @empty
                <p class="text-gray-600">Belum ada jurnal terdaftar untuk universitas ini.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
