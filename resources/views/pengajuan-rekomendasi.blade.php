<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pengajuan Rekomendasi</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        
        <body class="bg-gradient-to-br from-green-50 to-green-100 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="text-center mb-12">
            <h1 class="text-gray-700 text-4xl font-bold mb-4 drop-shadow-sm">
                Halaman Pengajuan Rekomendasi
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-green-600 mx-auto rounded-full"></div>
        </div>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="group bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-105 flex flex-col justify-between min-h-[240px] relative overflow-hidden">
                <!-- Shimmer Effect -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:animate-shimmer"></div>
                
                <div>
                    <h2 class="text-lg font-semibold mb-3 text-white">Akreditasi Program Studi</h2>
                    <p class="text-sm text-white/90 mb-4 leading-relaxed">Ajukan rekomendasi untuk akreditasi program studi Anda.</p>
                </div>
                <div class="mt-auto">
                    <a href="https://docs.google.com/forms/d/1OMYzTxHeDMY-pdqVM2Hni-szBkOyGUiKvW3aXmxi05g/viewform?edit_requested=true" target="_blank"
                       class="w-full text-center bg-white hover:bg-green-50 text-green-700 font-medium py-3 px-4 rounded-xl text-sm block transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-105 flex flex-col justify-between min-h-[240px] relative overflow-hidden">
                <!-- Shimmer Effect -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:animate-shimmer"></div>
                
                <div>
                    <h2 class="text-lg font-semibold mb-3 text-white">Pembukaan Periode PDDIKTI</h2>
                    <p class="text-sm text-white/90 mb-4 leading-relaxed">Ajukan rekomendasi untuk pembukaan periode PDDIKTI baru.</p>
                </div>
                <div class="mt-auto">
                    <a href="https://docs.google.com/forms/d/1DVsNAYaTbaVaDdL093mDJQbI6_Z72UOu3b4BXXcBx2s/viewform?edit_requested=true" target="_blank"
                       class="w-full text-center bg-white hover:bg-green-50 text-green-700 font-medium py-3 px-4 rounded-xl text-sm block transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-105 flex flex-col justify-between min-h-[240px] relative overflow-hidden">
                <!-- Shimmer Effect -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:animate-shimmer"></div>
                
                <div>
                    <h2 class="text-lg font-semibold mb-3 text-white">Pengajuan Rekomendasi Penggabungan PTKIS</h2>
                    <p class="text-sm text-white/90 mb-4 leading-relaxed">Ajukan rekomendasi untuk penggabungan PTKIS.</p>
                </div>
                <div class="mt-auto">
                    <a href="https://docs.google.com/forms/d/1OTUUF2Ivhq-bu1lB4mmwi1_NTtUlXqA235ssDpFqGYM/closedform" target="_blank"
                       class="w-full text-center bg-white hover:bg-green-50 text-green-700 font-medium py-3 px-4 rounded-xl text-sm block transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-105 flex flex-col justify-between min-h-[240px] relative overflow-hidden">
                <!-- Shimmer Effect -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:animate-shimmer"></div>
                
                <div>
                    <h2 class="text-lg font-semibold mb-3 text-white">Pengajuan Rekomendasi Usul Program Studi</h2>
                    <p class="text-sm text-white/90 mb-4 leading-relaxed">Ajukan rekomendasi untuk usul Program Studi.</p>
                </div>
                <div class="mt-auto">
                    <a href="https://docs.google.com/forms/d/1owht1JsjX_X20q7K2s7aZSR677b7c9hODAvtNw7-Wy0/viewform?edit_requested=true" target="_blank"
                       class="w-full text-center bg-white hover:bg-green-50 text-green-700 font-medium py-3 px-4 rounded-xl text-sm block transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="group bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-105 flex flex-col justify-between min-h-[240px] relative overflow-hidden">
                <!-- Shimmer Effect -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:animate-shimmer"></div>
                
                <div>
                    <h2 class="text-lg font-semibold mb-3 text-white">Pengajuan Rekomendasi Pindah Homebase</h2>
                    <p class="text-sm text-white/90 mb-4 leading-relaxed">Ajukan rekomendasi untuk pindah Homebase.</p>
                </div>
                <div class="mt-auto">
                    <a href="https://docs.google.com/forms/d/1-o1Odvddhx-VgYXnapsrI8LB6XoFLNFEni2J7FuBThE/viewform?edit_requested=true" target="_blank"
                       class="w-full text-center bg-white hover:bg-green-50 text-green-700 font-medium py-3 px-4 rounded-xl text-sm block transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="group bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-105 flex flex-col justify-between min-h-[240px] relative overflow-hidden">
                <!-- Shimmer Effect -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:animate-shimmer"></div>
                
                <div>
                    <h2 class="text-lg font-semibold mb-3 text-white">Pengajuan Rekomendasi Sarana dan Prasarana</h2>
                    <p class="text-sm text-white/90 mb-4 leading-relaxed">Ajukan rekomendasi untuk sarana dan prasarana</p>
                </div>
                <div class="mt-auto">
                    <a href="https://docs.google.com/forms/d/1AgI06PD13HnCJ6-PooT4xcKuGy0p9sxEZMvgGV-qEpg/closedform" target="_blank"
                       class="w-full text-center bg-white hover:bg-green-50 text-green-700 font-medium py-3 px-4 rounded-xl text-sm block transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
          <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; 2025 Kopertais XV Lampung. All rights reserved.</p>
          </footer>  
          
    </body>
</html>