<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profil Kopertais XV</title>
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])

 
</head>
<body class="bg-gradient-to-b from-green-50 via-white to-green-100 text-gray-800 font-sans">

  <section class="min-h-screen py-16 px-6 md:px-20 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, #16a34a 2px, transparent 2px); background-size: 80px 80px;"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 right-20 w-32 h-32 bg-green-200/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-40 left-10 w-24 h-24 bg-green-300/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;"></div>
    
    <div class="max-w-5xl mx-auto relative z-10">
      <!-- Header -->
      <div class="text-center mb-16" data-aos="fade-up">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl mb-6 shadow-lg">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-green-700 to-green-600 bg-clip-text text-transparent mb-4">
          Tentang Kopertais Wilayah XV
        </h1>
        <p class="text-gray-600 text-lg max-w-3xl mx-auto">
          Mengenal Sejarah, Peran, dan Komitmen Kami dalam Dunia Pendidikan Tinggi Islam
        </p>
        <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-green-600 mx-auto mt-6 rounded-full"></div>
      </div>

      <!-- Sambutan -->
      <div class="relative mb-16" data-aos="fade-up" data-aos-delay="200">
        <div class="absolute -top-4 -left-4 w-24 h-24 bg-gradient-to-br from-green-500 to-green-600 rounded-full opacity-10"></div>
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 border border-green-100 relative overflow-hidden">
          <!-- Decorative elements -->
          <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-500/10 to-green-600/10 rounded-full -translate-y-16 translate-x-16"></div>
          <div class="absolute bottom-0 left-0 w-20 h-20 bg-gradient-to-br from-green-400/10 to-green-500/10 rounded-full translate-y-10 -translate-x-10"></div>
          
          <!-- Quote icon -->
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-4">
              <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-green-700">Sambutan Koordinator</h3>
          </div>
          
          <div class="prose prose-lg max-w-none relative z-10">
            <p class="text-lg leading-relaxed text-gray-700 first-letter:text-5xl first-letter:font-bold first-letter:text-green-600 first-letter:float-left first-letter:mr-3 first-letter:mt-1">
              <strong class="text-green-800">Assalamu'alaikum Warahmatullahi Wabarakatuh.</strong><br><br>

              Puji syukur kehadirat Allah SWT, website resmi Kopertais Wilayah XV hadir sebagai sarana informasi yang akurat, serta bermanfaat bagi seluruh civitas akademika dan masyarakat luas.

              <br><br>Kopertais memiliki tugas pokok dalam melaksanakan pembinaan, pengawasan, pengendalian mutu, serta fasilitasi penyelenggaraan pendidikan di PTKIS. Kopertais berperan strategis dalam memastikan terwujudnya ekosistem pendidikan tinggi keagamaan Islam yang berkualitas, relevan dengan kebutuhan zaman, serta mampu menghasilkan lulusan yang kompeten, inovatif, dan berintegritas.

              <br><br>Saat ini, Kopertais Wilayah XV Lampung membina <span class="font-bold text-green-700 bg-green-100 px-2 py-1 rounded">35 Perguruan Tinggi Keagamaan Islam Swasta</span> dengan <span class="font-bold text-green-700 bg-green-100 px-2 py-1 rounded">441 dosen yang telah tersertifikasi</span>. Pencapaian ini mencerminkan komitmen dalam meningkatkan mutu pendidikan tinggi keagamaan Islam di wilayah Lampung. Jumlah dosen tersertifikasi tersebut menjadi indikator penting dalam upaya peningkatan kualitas tenaga pendidik yang diharapkan mampu memberikan kontribusi signifikan terhadap pengembangan keilmuan dan kompetensi mahasiswa.

              <br><br>Kopertais Wilayah XV berkomitmen untuk terus mendorong peningkatan kualitas pendidikan tinggi keagamaan Islam dengan mengedepankan prinsip akuntabilitas, transparansi, dan profesionalisme. Kami juga berperan aktif dalam mendukung pengembangan sumber daya manusia yang mampu menghadapi tantangan globalisasi, transformasi digital, serta dinamika sosial budaya yang terus berkembang.

              <br><br>Semoga, langkah ini memberikan layanan yang optimal serta kontribusi nyata bagi kemajuan pendidikan tinggi Islam di Indonesia.

              <br><br><strong class="text-green-800">Wassalamu'alaikum Warahmatullahi Wabarakatuh.</strong>
            </p>
          </div>
        </div>
      </div>

      <!-- Stats Cards -->
      
        
        

      <!-- Content Cards -->
      <div class="space-y-12">
        <!-- Sejarah -->
        <div class="group" data-aos="fade-right" data-aos-delay="400">
          <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 md:p-10 shadow-lg hover:shadow-2xl transition-all duration-500 border border-green-100 relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-gradient-to-br from-green-500/10 to-green-600/10 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
            
            <div class="flex items-start space-x-4 mb-6">
              <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div>
                <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-2">Sejarah Kopertais Wilayah XV</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-green-500 to-green-600 rounded-full"></div>
              </div>
            </div>
            
            <p class="text-gray-700 leading-relaxed text-lg relative z-10">
              Kopertais Wilayah XV Lampung dibentuk sebagai bagian dari upaya pemerintah dalam meningkatkan pengawasan dan pembinaan terhadap Perguruan Tinggi Keagamaan Islam Swasta. Seiring perkembangan zaman dan kebutuhan mutu pendidikan tinggi Islam, Kopertais terus berkembang dan memperluas peran strategisnya.
            </p>
          </div>
        </div>

        <!-- Apa itu PTKIS -->
        <div class="group" data-aos="fade-left" data-aos-delay="500">
          <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 md:p-10 shadow-lg hover:shadow-2xl transition-all duration-500 border border-green-100 relative overflow-hidden">
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-gradient-to-br from-green-500/10 to-green-600/10 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
            
            <div class="flex items-start space-x-4 mb-6">
              <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div>
                <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-2">Apa itu PTKIS?</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-green-500 to-green-700 rounded-full"></div>
              </div>
            </div>
            
            <p class="text-gray-700 leading-relaxed text-lg relative z-10">
              PTKIS (Perguruan Tinggi Keagamaan Islam Swasta) adalah institusi pendidikan tinggi yang menyelenggarakan program pendidikan keagamaan Islam dan dikelola secara swasta. PTKIS menjadi bagian penting dari sistem pendidikan nasional, menyediakan akses pendidikan tinggi berbasis nilai-nilai Islam kepada masyarakat.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-green-700 text-white text-center py-4">
    <p>&copy; 2025 Kopertais XV Lampung. All rights reserved.</p>
  </footer>

</body>
</html>
