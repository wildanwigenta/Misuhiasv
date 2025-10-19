<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Misuhiasu') }} - @yield('title', 'Gaya Simpel, Kualitas Premium')</title>

    <!-- Favicon - Simple Version -->
    <link rel="icon" href="/images/logo_c.png" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Header -->
    <header class="bg-slate-900 shadow-lg" x-data="{ mobileMenuOpen: false }">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo_c.png') }}"   alt="Misuhiasu Logo"  class="h-12 w-12 mr-2">
                    <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                        Misuhiasu
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-white hover:text-blue-200 transition duration-300 {{ request()->routeIs('home') ? 'border-b-2 border-blue-300' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="text-white hover:text-blue-200 transition duration-300 {{ request()->routeIs('products.*') ? 'border-b-2 border-blue-300' : '' }}">
                        Product
                    </a>
                    <a href="{{ route('catalogue') }}"
                        class="text-white hover:text-blue-200 transition duration-300 {{ request()->routeIs('catalogue') ? 'border-b-2 border-blue-300' : '' }}">
                        Catalogue
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-blue-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="mobileMenuOpen" x-transition @click.away="mobileMenuOpen = false" class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('home') }}"
                        class="text-white hover:text-blue-200 block px-3 py-2 text-base font-medium">
                        Home
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="text-white hover:text-blue-200 block px-3 py-2 text-base font-medium">
                        Product
                    </a>
                    <a href="{{ route('catalogue') }}"
                        class="text-white hover:text-blue-200 block px-3 py-2 text-base font-medium">
                        Catalogue
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Misuhiasu</h3>
                    <p class="text-blue-200">Gaya Simpel, Kualitas Premium. Temukan koleksi kaos terbaik dengan desain
                        yang menarik dan bahan berkualitas tinggi.</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="text-blue-200 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="{{ route('products.index') }}"
                                class="text-blue-200 hover:text-white transition duration-300">Product</a></li>
                        <li><a href="{{ route('catalogue') }}"
                                class="text-blue-200 hover:text-white transition duration-300">Catalogue</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <p class="text-blue-200 mb-2">WhatsApp: +62 812-3456-7890</p>
                    <p class="text-blue-200">Email: info@tokokaos.com</p>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-8 pt-8 text-center">
                <p class="text-blue-200">&copy; {{ date('Y') }} Misuhiasu. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Product Detail Modal -->
    {{-- <div x-data="{ showModal: false, product: null }" 
         x-show="showModal" 
         x-cloak
         @keydown.escape.window="showModal = false"
         class="fixed inset-0 z-50 overflow-y-auto"
         @product-modal.window="showModal = true; product = $event.detail">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Backdrop -->
            <div x-show="showModal" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 transition-opacity" 
                 @click="showModal = false">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            
            <!-- Modal Content -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div x-show="showModal" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full" x-show="product">
                            <div class="mb-4">
                                <img :src="product?.image ? '/storage/' + product.image : '/images/placeholder.jpg'" 
                                     :alt="product?.name" 
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-2" x-text="product?.name"></h3>
                            
                            <p class="text-sm text-gray-500 mb-4" x-text="product?.description"></p>
                            
                            <p class="text-2xl font-bold text-slate-900 mb-4" x-text="'Rp ' + (product?.price ? new Intl.NumberFormat('id-ID').format(product.price) : '0')"></p>
                            
                            <div class="flex justify-between gap-4">
                                <button @click="showModal = false" 
                                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-300">
                                    Tutup
                                </button>
                                
                                <a :href="'https://wa.me/6281234567890?text=Halo, saya tertarik membeli kaos ' + encodeURIComponent(product?.name || '') + '. Apakah masih tersedia?'" 
                                   target="_blank"
                                   class="flex-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 text-center">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</body>

</html>
