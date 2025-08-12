<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    
    <!-- ✅ Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/kopertais.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Sidebar Styles -->
    <style>
        @media (min-width: 1024px) {
            .main-content {
                margin-left: 256px; /* width sidebar w-64 */
                transition: margin-left 0.3s ease;
            }
        }

        .content-wrapper {
            max-width: calc(100vw - 256px);
        }

        @media (max-width: 1023px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <!-- ✅ Include Navigation Sidebar -->
    @include('layouts.navigation')

    <!-- Main Content Area -->
    <div class="main-content min-h-screen">
        
        <!-- ✅ Header (dengan Logo) -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="content-wrapper mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center space-x-4">
                    <!-- ✅ Logo PTKIS -->
                    <img src="{{ asset('images/kopertais.png') }}" alt="Logo PTKIS" class="w-10 h-10 rounded">

                    <!-- Judul / Info -->
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                            PTKIS Kopertais Wilayah XV Lampung
                        </h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Sistem Informasi Data
                        </p>
                    </div>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="content-wrapper p-4 lg:p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
