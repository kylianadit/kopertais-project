@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="bg-gradient-to-br from-green-50 to-white dark:from-gray-800 dark:to-gray-900 shadow-xl rounded-2xl p-8 transition-all duration-500">
            <div class="flex items-start gap-5">
                <!-- Ikon atau Emoji -->
                <div class="text-indigo-500 text-4xl">
                    ✨
                </div>

                <!-- Teks Selamat Datang -->
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-2">
                        Selamat datang, Admin Kopertais!
                    </h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300">
                        Silakan pilih menu di atas untuk mulai mengelola data. Semoga harimu produktif dan penuh berkah!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
