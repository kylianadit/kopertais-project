@extends('layouts.user')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-teal-50 to-green-100">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-green-600 to-green-700 py-16">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white bg-opacity-10 rounded-full blur-xl"></div>
            <div class="absolute bottom-10 right-10 w-40 h-40 bg-white bg-opacity-5 rounded-full blur-2xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-white bg-opacity-5 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative container mx-auto px-4 text-center">
           
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                Profil PTKIS Wilayah XV
                <span class="block text-white">Lampung</span>
            </h1>
            <p class="text-white text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Perguruan Tinggi Keagamaan Islam Swasta yang berkualitas dan terakreditasi
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 -mt-8 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($ptkis as $ptki)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:-translate-y-2">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 border-b border-gray-100">
                        <div class="flex items-center space-x-4">
                            {{-- Logo --}}
                            <div class="relative">
                                @if ($ptki->website)
                                    <a href="{{ $ptki->website }}" target="_blank" class="block">
                                        <div class="w-16 h-16 bg-white rounded-xl shadow-md flex items-center justify-center group-hover:shadow-lg transition-shadow duration-300 border-2 border-green-100 hover:border-green-200">
                                            <img src="{{ $ptki->logo ? asset('images/logo/' . $ptki->logo) : asset('images/logo.png') }}"
                                                 alt="Logo {{ $ptki->nama }}"
                                                 class="w-12 h-12 object-contain hover:scale-110 transition-transform duration-300" />
                                        </div>
                                    </a>
                                @else
                                    <div class="w-16 h-16 bg-white rounded-xl shadow-md flex items-center justify-center border-2 border-green-100">
                                        <img src="{{ $ptki->logo ? asset('images/logo/' . $ptki->logo) : asset('images/logo.png') }}"
                                             alt="Logo {{ $ptki->nama }}"
                                             class="w-12 h-12 object-contain" />
                                             {{-- Debug info --}}
                                        <div class="text-xs text-red-500 mt-1">
                                            Debug: {{ $ptki->logo ?? 'NULL' }}
                                            <br>
                                            Full Path: {{ $ptki->logo ? asset('images/logo/' . $ptki->logo) : 'No logo' }}
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- Institution Name --}}
                            <div class="flex-1">
                                @if ($ptki->website)
                                    <h2 class="text-xl font-bold text-gray-800 leading-tight mb-1 group-hover:text-green-700 transition-colors">
                                        <a href="{{ $ptki->website }}" target="_blank" class="hover:underline decoration-2 underline-offset-2 decoration-green-500">
                                            {{ $ptki->nama }}
                                        </a>
                                    </h2>
                                @else
                                    <h2 class="text-xl font-bold text-gray-800 leading-tight mb-1">{{ $ptki->nama }}</h2>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 space-y-4">
                        {{-- Accreditation Badge --}}
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600">Akreditasi</span>
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                {{ $ptki->akreditasi === 'A' ? 'bg-green-100 text-green-800 border border-green-200' : 
                                   ($ptki->akreditasi === 'B' ? 'bg-blue-100 text-blue-800 border border-blue-200' : 
                                    'bg-yellow-100 text-yellow-800 border border-yellow-200') }}">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $ptki->akreditasi }}
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-5 h-5 text-gray-400 mt-0.5">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed flex-1">{{ $ptki->alamat }}</p>
                        </div>

                        {{-- Website Link --}}
                        
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data</h3>
                        <p class="text-gray-500">Data PTKIS belum tersedia saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Spacer -->
    <div class="h-20"></div>
</div>

<!-- Enhanced Footer -->
<footer class="relative bg-gradient-to-r from-green-700 via-green-800 to-emerald-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0">
        <div class="absolute top-5 left-10 w-20 h-20 bg-white bg-opacity-5 rounded-full blur-xl"></div>
        <div class="absolute bottom-5 right-10 w-32 h-32 bg-white bg-opacity-5 rounded-full blur-2xl"></div>
    </div>
    
    <div class="relative container mx-auto px-4 py-8">
        <div class="text-center">
            <div class="flex items-center justify-center mb-4">
                
                <p class="text-emerald-200 text-sm">
                    © 2025 Kopertais XV Lampung. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
@endsection