<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kopertais xv lampung</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- AOS CSS for scroll animations -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else

        @endif
    </head>
    <body> 
      <header class="bg-white shadow sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4">
    <div class="flex justify-between items-center">
      <!-- Logo Section -->
      <div class="flex items-center space-x-2">
        <img src="images/kopertais.png" alt="Logo Kopertais" class="w-6 h-6 lg:w-7 lg:h-7 object-contain" />
        <span class="text-lg lg:text-xl font-bold text-green-700">Kopertais Wilayah XV Lampung</span>
      </div>

      <!-- Desktop Navigation - Always Visible on Large Screen -->
      <nav class="hidden lg:flex items-center space-x-4 text-sm font-medium">
        <a href="#home" class="text-gray-700 hover:text-green-700 transition-colors">Home</a>
        <a href="#profile" class="text-gray-700 hover:text-green-700 transition-colors">Profil</a>
        <a href="#ketenagaan" class="text-gray-700 hover:text-green-700 transition-colors">Ketenagaan</a>
        <a href="#kelembagaan" class="text-gray-700 hover:text-green-700 transition-colors">Kelembagaan</a>
        <a href="#layanan" class="text-gray-700 hover:text-green-700 transition-colors">Layanan</a>
        <a href="#informasi" class="text-gray-700 hover:text-green-700 transition-colors">Informasi</a>
        <a href="#tautan" class="text-gray-700 hover:text-green-700 transition-colors">Tautan Terkait</a>
        <a href="#kontak" class="text-gray-700 hover:text-green-700 transition-colors">Kontak Kami</a>
      </nav>

      <!-- Mobile Menu Button -->
      <button id="mobileMenuBtn" class="lg:hidden text-gray-700 hover:text-green-700 transition-colors p-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobileMenu" class="lg:hidden hidden mt-4 pb-4 border-t border-gray-200">
      <nav class="flex flex-col space-y-1 mt-4">
        <a href="#home" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Home</a>
        <a href="#profile" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Profil</a>
        <a href="#ketenagaan" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Ketenagaan</a>
        <a href="#kelembagaan" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Kelembagaan</a>
        <a href="#layanan" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Layanan</a>
        <a href="#informasi" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Informasi</a>
        <a href="#tautan" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Tautan Terkait</a>
        <a href="#kontak" class="text-gray-700 hover:text-green-700 transition-colors py-3 px-2 rounded hover:bg-green-50">Kontak Kami</a>
      </nav>
    </div>
  </div>
</header>

<script>
// Mobile menu toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');

if (mobileMenuBtn && mobileMenu) {
  mobileMenuBtn.addEventListener('click', function() {
    mobileMenu.classList.toggle('hidden');
  });

  // Close mobile menu when clicking on a link
  const mobileMenuLinks = mobileMenu.querySelectorAll('a');
  mobileMenuLinks.forEach(link => {
    link.addEventListener('click', function() {
      mobileMenu.classList.add('hidden');
    });
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', function(event) {
    const isClickInsideMenu = mobileMenu.contains(event.target);
    const isClickOnMenuBtn = mobileMenuBtn.contains(event.target);
    
    if (!isClickInsideMenu && !isClickOnMenuBtn && !mobileMenu.classList.contains('hidden')) {
      mobileMenu.classList.add('hidden');
    }
  });
}
</script>
    
      <!-- Section: Dashboard -->
      <section id="home" class="bg-green-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-10">
      
          <!-- Kiri: Teks -->
          <div data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
              Selamat Datang di Website <span class="text-yellow-300">Kopertais XV Lampung</span>
            </h1>
            <p class="text-lg mb-8">
              Lembaga yang membantu Kementerian Agama dalam bidang pendidikan tinggi keagamaan Islam swasta di wilayah Lampung.
            </p>
            <a href="{{ url('/jelajahi') }}" class="inline-block bg-white text-green-700 font-semibold px-6 py-3 rounded-lg shadow hover:bg-yellow-400 hover:text-green-900 transition">
              Tentang Kopertais
            </a>
          </div>
      
          <!-- Kanan: Gambar -->
         <!-- Container -->
        <div data-aos="fade-left" data-aos-duration="1200" class="bg-green-700 py-6 px-4 rounded-2xl text-center text-white w-fit mx-auto">

      <!-- Foto -->
      <div class="bg-white p-2 rounded-xl shadow-lg mb-4">
        <img src="images/rektor2.png" alt="Foto Pimpinan" class="w-60 h-80 object-cover rounded-xl mx-auto" />
      </div>

      <!-- Teks Nama dan Jabatan -->
      <div class="bg-white text-green-700 font-bold rounded-xl px-2 py-2 shadow">
        <p class="border-b border-green-700 pb-1">
          Prof. H. Wan Jamaluddin Z, M.Ag., Ph.D
        </p>
        <p class="pt-1">
          Koordinator Kopertais XV Lampung
        </p>
      </div>

    </div>     
    </div>
    </section>
          
        
          <!-- Section: Profile -->
  
    <section id="profile" class="py-20 min-h-screen bg-gradient-to-br from-white to-green-50 p-6 flex flex-col items-center justify-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-green-700 text-center mb-12" data-aos="fade-up">
                Profil Kopertais XV Lampung
            </h2>

            <!-- Card Container -->
            <div class="grid md:grid-cols-2 gap-8">

                <!-- Card: Visi -->
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition duration-300 p-6 border border-green-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                            <span class="text-2xl">🌟</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-green-700">Visi</h3>
                    </div>
                    <div class="w-16 h-1 bg-green-500 rounded mb-4"></div>
                    <p class="font-medium text-gray-700 leading-relaxed">
                        "Menjadi lembaga professional dalam pembinaan Perguruan Tinggi Keagamaan Islam Swasta (PTKIS) yang Bermutu, Mandiri, Unggul, dan Berdaya Saing"
                    </p>
                </div>

                <!-- Card: Tujuan -->
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition duration-300 p-6 border border-green-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                            <span class="text-2xl">🎓</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-green-700">Tujuan</h3>
                    </div>
                    <div class="w-16 h-1 bg-green-500 rounded mb-4"></div>
                    <p class="font-medium text-gray-700 leading-relaxed">
                        "Terwujudnya Pendidikan Tinggi Keagamaan Islam Swasta (PTKIS) yang Bermutu, Mandiri, Unggul, dan Berdaya Saing"
                    </p>
                </div>

                <!-- Card: Misi -->
                <div data-aos="fade-up" data-aos-delay="300" class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition duration-300 p-6 border border-green-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-green-700">Misi</h3>
                    </div>
                    <div class="w-16 h-1 bg-green-500 rounded mb-4"></div>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-green-500 text-white text-sm font-bold rounded-full flex items-center justify-center mt-0.5">1</span>
                            <p class="font-medium text-gray-700">Melaksanakan pengawasan penyelenggaraan Perguruan Tinggi Keagamaan Islam Swasta (PTKIS) di wilayah Lampung.</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-green-500 text-white text-sm font-bold rounded-full flex items-center justify-center mt-0.5">2</span>
                            <p class="font-medium text-gray-700">Melaksanakan pengendalian mutu penyelenggaraan Perguruan Tinggi Keagamaan Islam Swasta (PTKIS) di wilayah Lampung.</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-green-500 text-white text-sm font-bold rounded-full flex items-center justify-center mt-0.5">3</span>
                            <p class="font-medium text-gray-700">Melaksanakan pembinaan Perguruan Tinggi Keagamaan Islam Swasta (PTKIS) di wilayah Lampung.</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-green-500 text-white text-sm font-bold rounded-full flex items-center justify-center mt-0.5">4</span>
                            <p class="font-medium text-gray-700">Melaksanakan pemberdayaan Perguruan Tinggi Keagamaan Islam Swasta (PTKIS) di wilayah Lampung.</p>
                        </div>
                    </div>
                </div>

                <!-- Card: Struktur Organisasi -->
                <div data-aos="fade-up" data-aos-delay="400" class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition duration-300 p-6 border border-green-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                            <span class="text-2xl">🏢</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-green-700">Struktur Organisasi</h3>
                    </div>
                    <div class="w-16 h-1 bg-green-500 rounded mb-4"></div>
                    <p class="font-medium text-gray-700 mb-6">Struktur organisasi Kopertais XV Lampung:</p>
                    <div class="text-center">
                        <img src="images/struktur.jpg" alt="Struktur Organisasi" class="rounded-xl mx-auto shadow-md w-full max-w-md hover:shadow-lg transition duration-300" />
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        AOS.init({
            duration: 600,
            easing: 'ease-out',
            once: true
        });
    </script>

    <!-- Section Tim -->
    <section class="bg-gray-100 py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">Jajaran Struktur Jabatan</h2>
                <p class="text-green-700 text-lg max-w-2xl mx-auto">
                    Berikut Jajaran Struktur Jabatan Kopertais Wilayah XV Lampung
                </p>
            </div>
            
            <!-- Team Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="aspect-square overflow-hidden">
                        <img src="images/WK-1.png">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Prof. Dr.Alamsyah, S.Ag., M.Ag</h3>
                        <p class="text-green-700 font-semibold mb-3">Wakil Koordinator I</p>
                        <p class="text-gray-600 text-sm">
                            Wakil Koordinator I Kopertais Wilayah XV Lampung
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="aspect-square overflow-hidden">
                        <img src="images/WR-2.png">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Safari, S.Ag., M.Sos.I.</h3>
                        <p class="text-green-700 font-semibold mb-3">Wakil Koordinator II</p>
                        <p class="text-gray-600 text-sm">
                            Wakil Koordinator II Kopertais Wilayah XV Lampung
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="aspect-square overflow-hidden">
                        <img src="images/sekretaris-2.png">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. M. Afif Amrulloh, M.Pd.I.</h3>
                        <p class="text-green-700 font-semibold mb-3">Sekretaris Koordinator</p>
                        <p class="text-gray-600 text-sm">
                             Sekretaris Koordinator Kopertais Wilayah XV Lampung
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

                     
                <!-- Ketenagaan -->                
               <style>
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
    </style>
    <section id="ketenagaan" class="bg-gradient-to-br from-green-700 to-green-600 py-16 px-4 md:px-12">
        <div class="max-w-6xl mx-auto text-center text-white">
            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">Ketenagaan</h2>
            <p class="text-green-100 mb-12 text-lg" data-aos="fade-up" data-aos-delay="100">
                Informasi dosen dan tenaga pendidik
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1: Dosen Tersertifikasi -->
                <div data-aos="fade-right" data-aos-delay="200" class="card-hover bg-white text-left rounded-xl shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Dosen Tersertifikasi</h3>
                        <p class="text-gray-600 mb-4">
                            Informasi mengenai dosen yang telah lulus sertifikasi pendidik.
                        </p>
                    </div>
                    <div>
                        <a href="{{ url('/dosen1') }}" class="inline-flex items-center bg-green-700 hover:bg-green-800 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">
                            Kunjungi
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Dosen Tugas Belajar -->
                <div data-aos="fade-left" data-aos-delay="300" class="card-hover bg-white text-left rounded-xl shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Dosen Tugas Belajar</h3>
                        <p class="text-gray-600 mb-4">
                            Daftar dosen yang sedang menjalani tugas belajar di perguruan tinggi lain.
                        </p>
                    </div>
                    <div>
                        <a href="{{ url('/dosen2') }}" class="inline-flex items-center bg-green-700 hover:bg-green-800 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">
                            Kunjungi
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
                

           <!-- Section: Kelembagaan -->

           <section id="kelembagaan" class="min-h-screen bg-gradient-to-br from-white to-blue-50 p-6 flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold text-green-700 mb-4" data-aos="fade-up">Halaman Kelembagaan</h1>
            <p class="text-center text-gray-600 max-w-xl mb-10" data-aos="fade-up" data-aos-delay="100">
              Silakan pilih salah satu menu di bawah untuk melihat informasi kelembagaan secara lebih lengkap.
            </p>
          
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl">
              <!-- Kartu Profil PTKIS -->
              <a data-aos="zoom-in" data-aos-delay="200"
                href="{{ url('/profile-ptkis-user') }}"
                class="bg-white shadow-lg hover:shadow-xl transition rounded-2xl p-6 border border-blue-100 flex flex-col items-center text-center group hover:bg-blue-50">
                <div class="bg-blue-100 text-blue-700 rounded-full p-4 mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.08 12.08 0 0112 20a12.08 12.08 0 01-6.16-9.422L12 14z" />
                  </svg>
                </div>
                <h2 class="text-xl font-semibold mb-2">Profil PTKIS</h2>
                <p class="text-gray-500 text-sm">
                  Lihat informasi detail tentang Perguruan Tinggi Keagamaan Islam Swasta.
                </p>
              </a>
          
              <!-- Kartu Profil Program Studi -->
              <a data-aos="zoom-in" data-aos-delay="300"
                href="{{ url('/akreditasi-user') }}"
                class="bg-white shadow-lg hover:shadow-xl transition rounded-2xl p-6 border border-green-100 flex flex-col items-center text-center group hover:bg-green-50">
                <div class="bg-green-100 text-green-700 rounded-full p-4 mb-4 group-hover:bg-green-600 group-hover:text-white transition">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6V4a2 2 0 00-2-2H6a2 2 0 00-2 2v16a2 2 0 002 2h4a2 2 0 002-2v-2m0-12h6a2 2 0 012 2v12a2 2 0 01-2 2h-6" />
                  </svg>                  
                </div>
                <h2 class="text-xl font-semibold mb-2">Profil Program Studi</h2>
                <p class="text-gray-500 text-sm">
                  Temukan informasi program studi yang tersedia di lingkungan PTKIS.
                </p>
              </a>
            </div>
          </section>

            <!-- Section: Layanan -->

     <section id="layanan" class="bg-gradient-to-br from-slate-50 via-green-50 to-emerald-50 shadow-xl p-6 hover:shadow-2xl transition-all duration-500">
        <div class="max-w-6xl mx-auto p-6">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-green-700 to-green-500 bg-clip-text text-transparent" data-aos="fade-up">
                    Layanan Pengajuan
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mx-auto mb-4 rounded-full" data-aos="fade-up" data-aos-delay="50"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    Daftar layanan yang disediakan oleh instansi untuk memudahkan proses pengajuan Anda.
                </p>
            </div>

            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Pengajuan Rekomendasi -->
                <div data-aos="fade-up" data-aos-delay="150" 
                     class="group bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 
                            hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 
                            transition-all duration-300 relative overflow-hidden">
                    <!-- Icon -->
                    <div class="mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl 
                                    flex items-center justify-center mb-4 group-hover:scale-110 
                                    transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                            Pengajuan Rekomendasi
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Ajukan surat rekomendasi dari Kopertais sesuai kebutuhan Anda dengan proses yang mudah.
                        </p>
                    </div>
                    <a href="/pengajuan-rekomendasi" 
                       class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 
                              text-white px-6 py-3 rounded-xl font-medium 
                              hover:from-green-700 hover:to-green-600 hover:-translate-y-0.5 
                              hover:shadow-lg transition-all duration-300 group">
                        Continue
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Pengajuan SKTP -->
                <div data-aos="fade-up" data-aos-delay="200" 
                     class="group bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 
                            hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 
                            transition-all duration-300 relative overflow-hidden">
                    <div class="mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl 
                                    flex items-center justify-center mb-4 group-hover:scale-110 
                                    transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                            Pengajuan SKTP
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Layanan untuk mengajukan Surat Keputusan Tunjangan Profesi (SKTP) dengan sistem terintegrasi.
                        </p>
                    </div>
                    <a href="/pengajuan-sktp" 
                       class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 
                              text-white px-6 py-3 rounded-xl font-medium 
                              hover:from-green-700 hover:to-green-600 hover:-translate-y-0.5 
                              hover:shadow-lg transition-all duration-300 group">
                        Continue
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Pengajuan Inpassing -->
                <div data-aos="fade-up" data-aos-delay="250" 
                     class="group bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 
                            hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 
                            transition-all duration-300 relative overflow-hidden">
                    <div class="mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl 
                                    flex items-center justify-center mb-4 group-hover:scale-110 
                                    transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                            Pengajuan Inpassing
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Ajukan penyetaraan jabatan dosen untuk mendapatkan inpassing dengan prosedur yang jelas.
                        </p>
                    </div>
                    <a href="/pengajuan-inpassing" 
                       class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 
                              text-white px-6 py-3 rounded-xl font-medium 
                              hover:from-green-700 hover:to-green-600 hover:-translate-y-0.5 
                              hover:shadow-lg transition-all duration-300 group">
                        Continue
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Pengajuan Fungsional -->
                <div data-aos="fade-up" data-aos-delay="300" 
                     class="group bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 
                            hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 
                            transition-all duration-300 relative overflow-hidden">
                    <div class="mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl 
                                    flex items-center justify-center mb-4 group-hover:scale-110 
                                    transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                            Pengajuan Fungsional
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Ajukan kenaikan jabatan fungsional dosen secara online dengan sistem yang efisien.
                        </p>
                    </div>
                    <a href="/pengajuan-fungsional" 
                       class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 
                              text-white px-6 py-3 rounded-xl font-medium 
                              hover:from-green-700 hover:to-green-600 hover:-translate-y-0.5 
                              hover:shadow-lg transition-all duration-300 group">
                        Continue
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Izin Tugas Belajar -->
                <div data-aos="fade-up" data-aos-delay="350" 
                     class="group bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 
                            hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 
                            transition-all duration-300 relative overflow-hidden lg:col-span-1 sm:col-span-2">
                    <div class="mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl 
                                    flex items-center justify-center mb-4 group-hover:scale-110 
                                    transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 14l9-5-9-5-9 5 9 5m0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                            Izin Tugas Belajar
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Ajukan izin resmi untuk melanjutkan studi sambil tetap aktif sebagai dosen dengan dukungan penuh.
                        </p>
                    </div>
                    <a href="/pengajuan-tugas-belajar" 
                       class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 
                              text-white px-6 py-3 rounded-xl font-medium 
                              hover:from-green-700 hover:to-green-600 hover:-translate-y-0.5 
                              hover:shadow-lg transition-all duration-300 group">
                        Continue
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="350" 
                     class="group bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 
                            hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 
                            transition-all duration-300 relative overflow-hidden lg:col-span-1 sm:col-span-2">
                    <div class="mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl 
                                    flex items-center justify-center mb-4 group-hover:scale-110 
                                    transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 14l9-5-9-5-9 5 9 5m0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                            Beban Kerja Dosen (BKD)
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kelola pelaporan beban kerja dosen secara daring.
                        </p>
                    </div>
                    <a href="https://bkd.kopertais15.or.id/" target="_blank"
                       class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 
                              text-white px-6 py-3 rounded-xl font-medium 
                              hover:from-green-700 hover:to-green-600 hover:-translate-y-0.5 
                              hover:shadow-lg transition-all duration-300 group">
                        Continue
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        AOS.init({
            duration: 600,
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>
        
          <!-- Section: Informasi -->
        <section id="informasi" class="py-20 bg-gradient-to-br from-white to-blue-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-green-700 mb-4" data-aos="fade-up">Informasi Terkini</h2>
        <p class="text-gray-600 mb-10" data-aos="fade-up" data-aos-delay="100">Pengumuman, berita, dan dokumentasi informasi lainnya.</p>
        
        <div data-aos="fade-up" data-aos-delay="200" class="relative overflow-hidden">
            <div class="flex transition-transform duration-700 ease-in-out" id="gambar-carousel">
                @php
                    use App\Models\InformasiGambar;
                    $gambarList = InformasiGambar::latest()->get();
                    $totalGambar = $gambarList->count();
                @endphp
                
                @if($totalGambar > 0)
                    {{-- Tampilkan gambar asli --}}
                    @foreach($gambarList as $index => $gambar)
                        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                            <img src="{{ asset('uploads/' . $gambar->gambar) }}" 
                                 class="w-full max-h-96 object-contain mb-2 rounded-lg shadow-md" 
                                 alt="Informasi Gambar {{ $index + 1 }}">
                        </div>
                    @endforeach
                    
                    {{-- Duplikasi gambar untuk infinite loop --}}
                    @foreach($gambarList as $index => $gambar)
                        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                            <img src="{{ asset('uploads/' . $gambar->gambar) }}" 
                                 class="w-full max-h-96 object-contain mb-2 rounded-lg shadow-md" 
                                 alt="Informasi Gambar {{ $index + 1 }}">
                        </div>
                    @endforeach
                @else
                    {{-- Fallback jika tidak ada gambar --}}
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                        <div class="bg-gray-200 rounded-lg shadow-md w-full h-64 flex items-center justify-center">
                            <p class="text-gray-500">Belum ada gambar</p>
                        </div>
                    </div>
                @endif
            </div>
            

            
            {{-- Pause indicator --}}
            <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm opacity-0 transition-opacity" id="pause-indicator">
                ⏸ Paused
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('gambar-carousel');
    
    if (!carousel) return;
    
    // Hitung jumlah gambar dari PHP
    const totalImages = {{ $totalGambar ?? 0 }};
    
    // Jika kurang dari 2 gambar, tidak perlu carousel
    if (totalImages < 2) {
        console.log('Tidak cukup gambar untuk carousel');
        return;
    }
    
    let currentIndex = 0;
    let isTransitioning = false;
    let autoScrollInterval;
    
    console.log('Carousel initialized with', totalImages, 'images');
    
    // Function to move to next slide
    function nextSlide() {
        if (isTransitioning) return;
        
        isTransitioning = true;
        currentIndex++;
        
        const translateX = -(currentIndex * (100 / totalImages));
        carousel.style.transform = `translateX(${translateX}%)`;
        
        // Reset ke awal ketika mencapai gambar duplikat
        if (currentIndex >= totalImages) {
            setTimeout(() => {
                carousel.style.transition = 'none';
                currentIndex = 0;
                carousel.style.transform = `translateX(0%)`;
                
                setTimeout(() => {
                    carousel.style.transition = 'transform 0.7s ease-in-out';
                    isTransitioning = false;
                }, 50);
            }, 700);
        } else {
            setTimeout(() => {
                isTransitioning = false;
            }, 700);
        }
        
        console.log('Moved to slide:', currentIndex);
    }
    
    // Start auto-scroll
    function startAutoScroll() {
        if (autoScrollInterval) clearInterval(autoScrollInterval);
        autoScrollInterval = setInterval(nextSlide, 3000); // 3 detik
        console.log('Auto-scroll started');
    }
    
    // Initialize
    startAutoScroll();
    
    console.log('Carousel setup complete');
});
</script>
        
          <!-- tautan terkait -->  
    <section id="tautan" class="py-16 bg-gradient-to-br from-green-700 via-green-600 to-green-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px); background-size: 60px 60px;"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-white text-4xl font-bold mb-12 text-center drop-shadow-lg" data-aos="fade-up">
                Tautan Terkait
            </h2>
           
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1 - Jurnal PTKIS -->
                <div data-aos="flip-left" data-aos-delay="200" 
                     class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 p-6 flex flex-col justify-between min-h-[220px] border border-gray-100">
                    <div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 group-hover:text-green-700 transition-colors">Jurnal PTKIS</h3>
                        <p class="text-gray-600 leading-relaxed">Akses publikasi dan penelitian dari PTKIS se-Indonesia.</p>
                    </div>
                    <a href="/jurnal-ptkis" 
                       class="mt-6 self-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:scale-105">
                        Kunjungi
                    </a>
                </div>
        
                <!-- Card 2 - Pengumuman -->
                <div data-aos="flip-left" data-aos-delay="300" 
                     class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 p-6 flex flex-col justify-between min-h-[220px] border border-gray-100">
                    <div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 group-hover:text-green-700 transition-colors">Pengumuman</h3>
                        <p class="text-gray-600 leading-relaxed">Berikut pengumuman dapat anda kunjungi sekarang.</p>
                    </div>
                    <a href="/pengumuman" target="_blank"
                       class="mt-6 self-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:scale-105">
                        Kunjungi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
        
          <!-- Section: Kontak Kami -->
          <section id="kontak" class=" bg-white py-16 container mx-auto px-4">
            <h2 class="text-2xl font-semibold mb-4" data-aos="fade-up">Kontak Kami</h2>
            <p class="mb-8" data-aos="fade-up" data-aos-delay="100">Silakan hubungi kami melalui formulir berikut atau langsung ke informasi kontak di bawah.</p>
          
            <div class="grid md:grid-cols-2 gap-8">
              <!-- Form Kontak -->
              <form data-aos="fade-right" data-aos-delay="200" method="POST" action="{{ route('kontak.store') }}" class="bg-white p-6 rounded-lg shadow space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Nama Lengkap</label>
                    <input name="nama" type="text" placeholder="Nama Anda" class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input name="email" type="email" placeholder="email@contoh.com" class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium">Pesan</label>
                    <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda..." class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kirim Pesan</button>
            </form>
          
              <!-- Info Kontak -->
              <div class="space-y-4">
                <div data-aos="fade-left" data-aos-delay="200" class="bg-white p-6 rounded-lg shadow">
                  <h3 class="text-lg font-semibold mb-2">Alamat</h3>
                  <p>Jl. Letkol Endo Suratmin, Sukarame, Bandar Lampung, 35131</p>
                </div>
                <div data-aos="fade-left" data-aos-delay="300" class="bg-white p-6 rounded-lg shadow">
                  <h3 class="text-lg font-semibold mb-2">Email & Telepon</h3>
                  <p>Email: kopertais15@radenintan.ac.id</p>
                  <p>Telepon: +62 812-3456-7890</p>
                </div>
              <div data-aos="fade-left" data-aos-delay="400" class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Media Sosial</h3>
            
            <p style="display: flex; align-items: center; margin-bottom: 8px;">
                <a href="https://instagram.com/kopertais15" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="#E4405F" style="margin-right: 8px;">
                    <rect x="2" y="2" width="20" height="20" rx="6" ry="6" stroke="#E4405F" stroke-width="2" fill="none"/>
                    <circle cx="12" cy="12" r="4" stroke="#E4405F" stroke-width="2" fill="none"/>
                    <path d="m17.5 6.51.01 0" stroke="#E4405F" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Instagram: @kopertais15
                </a>
            </p>
            
            <p style="display: flex; align-items: center;">
                <a href="https://www.facebook.com/share/16gVNVjnHa/" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2" style="margin-right: 8px;">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                Facebook: Koordinatorat Ptkisxvlampung
                </a>
            </p>
            </div>
              </div>
            </div>
          </section>
          
          
          
          <!-- AOS JS Library -->
          <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
          
          <script>
            // Initialize AOS animation library
            AOS.init({
              duration: 800,
              easing: 'ease-in-out',
              once: true,
              offset: 100
            });
            
            // Smooth scrolling for navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
              anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                  target.scrollIntoView({
                    behavior: 'smooth'
                  });
                }
              });
            });
          </script>

          <!-- Footer -->
          <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; 2025 Kopertais XV Lampung. All rights reserved.</p>
          </footer>    
          
        </body>
    </html>