<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Fungsional</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 min-h-screen py-12 px-6 flex items-center justify-center">

  <div class="w-full max-w-4xl">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Pengajuan Jabatan Fungsional</h1>

    <!-- Card: Asisten Ahli dan Lektor -->
    <div class="bg-green-700 text-white rounded-3xl p-8 mb-6 shadow-lg">
      <h2 class="text-2xl font-semibold mb-3">Pengajuan Asisten Ahli dan Lektor</h2>
      <p class="mb-5 text-lg">Ajukan permohonan untuk jabatan fungsional Asisten Ahli dan Lektor sesuai ketentuan yang berlaku di PTKIS.</p>
      <div class="flex flex-wrap gap-4">
        <a href="https://docs.google.com/forms/d/179yBfEKjS8Byxwo6tzgKFZNz8dNgds5QhrbpCfQo1GM/viewform?edit_requested=true" class="bg-white text-green-700 font-semibold px-6 py-3 rounded-xl hover:bg-green-100 transition duration-200">
          Ajukan Disini
        </a>
        <a href="/uploads/036.-Usul-PAK-Tenaga-Pengajar-dan-Inpassing-Dosen-PTKIS-4.pdf" target="_blank" class="bg-white text-green-700 font-semibold px-6 py-3 rounded-xl hover:bg-green-100 transition duration-200">
          Unduh Edaran 📄
        </a>
        
        
        </a>
      </div>
    </div>

    <!-- Card: Lektor Kepala dan Guru Besar -->
    <div class="bg-green-700 text-white rounded-3xl p-8 shadow-lg">
      <h2 class="text-2xl font-semibold mb-3">Pengajuan Lektor Kepala dan Guru Besar</h2>
      <p class="mb-5 text-lg">Ajukan permohonan untuk jabatan fungsional Lektor Kepala dan Guru Besar melalui sistem ini.</p>
      <div class="flex flex-wrap gap-4">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeundzDB46yzzLDoIs13Buzr9hib_wgaoLpw7d5HEPrxF567A/viewform" class="bg-white text-green-700 font-semibold px-6 py-3 rounded-xl hover:bg-green-100 transition duration-200">
          Ajukan Disini
        </a>
        <a href="/uploads/041.-Pengusulan-Jafung-LK-dan-GB-Rumpun-Ilmu-Agama-Tahun-2025-1.pdf" target="_blank" class="bg-white text-green-700 font-semibold px-6 py-3 rounded-xl hover:bg-green-100 transition duration-200">
          Unduh Edaran 📄
        </a>
      </div>
    </div>

  </div>

</body>
</html>
