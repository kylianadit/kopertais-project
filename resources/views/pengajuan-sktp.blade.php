<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan sktp</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-200 min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-3xl text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-10">Halaman Pengajuan</h1>

    <div class="bg-green-700 text-white rounded-3xl shadow-xl p-8">
      <h2 class="text-2xl font-semibold mb-4">Penerbitan Surat Keputusan Tenaga Pengajar (SKTP)</h2>
      <p class="text-lg mb-6">
        Ajukan permohonan untuk penerbitan SKTP sebagai tenaga pengajar di PTKIS.
      </p>
      <a href="https://docs.google.com/forms/d/179yBfEKjS8Byxwo6tzgKFZNz8dNgds5QhrbpCfQo1GM/viewform?edit_requested=true" class="inline-block bg-white text-green-700 font-semibold px-6 py-3 rounded-xl hover:bg-green-100 transition duration-200">
        Ajukan Sekarang
      </a>
    </div>
  </div>

</body>
</html>
