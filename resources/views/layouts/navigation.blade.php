    <!-- Navigation Component - Fixed version with working logout -->
    <div x-data="{ sidebarOpen: false, userDropdownOpen: false }">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-xl transform transition-transform duration-300 ease-in-out lg:translate-x-0">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 bg-gradient-to-r from-green-600 to-green-700">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">PTKIS</h1>
                        <p class="text-xs text-green-100">Dashboard</p>
                    </div>
                </div>
                <!-- Close button for mobile -->
                <button @click="sidebarOpen = false" class="lg:hidden text-white hover:text-green-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->routeIs('dashboard') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 5l4-3 4 3"></path>
                    </svg>
                    {{ __('Dashboard') }}
                </x-nav-link>

                <x-nav-link :href="route('dosen.index')" :active="request()->routeIs('dosen.*')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->routeIs('dosen.*') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    {{ __('Dosen Tersertifikasi') }}
                </x-nav-link>

                <x-nav-link :href="route('dosen-bljr.index')" :active="request()->is('dosen-bljr')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->is('dosen-bljr') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    {{ __('Dosen Tugas Belajar') }}
                </x-nav-link>

                <x-nav-link href="{{ url('/profile-ptkis') }}" :active="request()->is('profile-ptkis')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->is('profile-ptkis') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    {{ __('Profil PTKIS') }}
                </x-nav-link>

                <x-nav-link href="{{ route('akreditasi.index') }}" :active="request()->is('akreditasi')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->is('akreditasi') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    {{ __('Akreditasi') }}
                </x-nav-link>

                <x-nav-link :href="route('informasi-gambar.index')" :active="request()->routeIs('informasi-gambar.*')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->routeIs('informasi-gambar.*') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ __('Informasi Gambar') }}
                </x-nav-link>

                <x-nav-link :href="route('admin.jurnal-ptkis.index')" :active="request()->routeIs('admin.jurnal-ptkis.*')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->routeIs('admin.jurnal-ptkis.*') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    {{ __('Jurnal PTKIS') }}
                </x-nav-link>

                <x-nav-link :href="route('kontak.index')" :active="request()->routeIs('kontak.index')"
                        class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-200
                                {{ request()->routeIs('kontak.index') 
                                    ? 'text-green-700 bg-green-100 dark:text-green-300 dark:bg-green-900/50 border-r-2 border-green-600' 
                                    : 'text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    {{ __('Pesan Kontak') }}
                </x-nav-link>
            </nav>

            <!-- User Profile Section - FIXED VERSION -->
            <div class="border-t border-gray-200 dark:border-gray-700 p-4">
                <div class="relative" x-data="{ open: false }">
                    <!-- User Button -->
                    <button @click="open = !open" 
                            class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-700 hover:text-green-700 hover:bg-green-50 dark:text-gray-300 dark:hover:text-green-300 dark:hover:bg-green-900/20 rounded-lg transition-colors duration-200">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mr-3 shadow-sm">
                            <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1 text-left">
                            <div class="font-medium truncate">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Administrator</div>
                        </div>
                        <svg class="fill-current h-4 w-4 ml-2 transform transition-transform duration-200" 
                            :class="{ 'rotate-180': open }" 
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        @click.away="open = false"
                        class="absolute bottom-full left-0 w-full mb-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-50">
                        
                        <!-- User Info Header -->
                        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-600">
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <!-- Profile Link -->
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" 
                            class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-green-50 dark:text-gray-300 dark:hover:bg-green-900/20 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ __('Profile') }}
                            </a>
                        </div>

                        <div class="border-t border-gray-100 dark:border-gray-600"></div>

                        <!-- Logout Form -->
                        <div class="py-1">
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" 
                                        class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Header Bar for Mobile -->
        <header class="lg:hidden bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 relative z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <!-- Logo for mobile -->
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-600 to-green-600 rounded-lg flex items-center justify-center mr-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                            </svg>
                        </div>
                        <h1 class="text-lg font-bold text-gray-900 dark:text-white">PTKIS</h1>
                    </div>

                    <!-- Mobile user menu -->
                    <div class="relative" x-data="{ mobileOpen: false }">
                        <button @click="mobileOpen = !mobileOpen" 
                                class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </button>
                        
                        <!-- Mobile Dropdown -->
                        <div x-show="mobileOpen" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            @click.away="mobileOpen = false"
                            class="absolute right-0 top-full mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-50">
                            
                            <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-600">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <div class="py-1">
                                <a href="{{ route('profile.edit') }}" 
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-green-50 dark:text-gray-300 dark:hover:bg-green-900/20">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ __('Profile') }}
                                </a>
                            </div>

                            <div class="border-t border-gray-100 dark:border-gray-600"></div>

                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar Overlay for Mobile -->
        <div x-show="sidebarOpen" 
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="sidebarOpen = false" 
            class="fixed inset-0 bg-gray-600 bg-opacity-75 lg:hidden z-40"
            style="display: none;"></div>
    </div>