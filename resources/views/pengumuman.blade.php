<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengumuman</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-10 px-4">

  <div class="max-w-5xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">
      Informasi Pengumuman
    </h1>

    <!-- Card Template -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mb-6 transition hover:shadow-xl flex justify-between items-center gap-4">
      <p class="text-lg font-medium text-gray-800">
        Pelaporan data diri dan BKD Bagi Peserta Lulus Sertifikasi Dosen Tahun 2024
      </p>
      <a href="/uploads/2025.01.15 SURAT PENGUMUMAN BKD PESERTA LULUS PKDP 2024 (1).pdf" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg font-semibold flex items-center gap-2 whitespace-nowrap transition">
        Download Pengumuman
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
      </a>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mb-6 transition hover:shadow-xl flex justify-between items-center gap-4">
      <p class="text-lg font-medium text-gray-800">
        Surat Keputusan Penetapan Kelulusan Serdos Tahun 2024
      </p>
      <a href="/uploads/SK Penetapan Kelulusan Sertifikasi Dosen PTKI Tahun 2024_compressed (1).pdf" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg font-semibold flex items-center gap-2 whitespace-nowrap transition">
        Download Pengumuman
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
      </a>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 transition hover:shadow-xl flex justify-between items-center gap-4">
      <p class="text-lg font-medium text-gray-800">
        Pengumuman Pembukaan Pendaftaran Program Bantuan Publikasi Ilmiah pada Perguruan Tinggi Keagamaan Islam Tahun Anggaran 2025.
      </p>
      <a href="/uploads/Pengumuman-Pembukaan-Pendaftaran-Program-Bantuan-Publikasi-Ilmiah-pada-Perguruan-Tinggi-Keagamaan-Islam-Tahun-Anggaran-2025.-1.pdf" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg font-semibold flex items-center gap-2 whitespace-nowrap transition">
        Download Pengumuman
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
      </a>      
    </div>

  </div>

</body>
</html>
