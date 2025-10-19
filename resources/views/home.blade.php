@extends('layouts.app')

@section('title', 'Home - Gaya Simpel, Kualitas Premium')

@section('content')

<!-- Hero Image/Banner -->
<div class="relative">
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
    <img src="/images/hero.png" 
            alt="Banner Kaos" 
            class="w-full h-96 object-cover">
</div>

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-slate-900 to-slate-700 text-white">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Gaya Simpel, <span class="text-slate-300">Kualitas Premium</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-slate-100">
                Temukan koleksi kaos terbaik dengan desain yang menarik dan bahan berkualitas tinggi
            </p>
            <div class="space-x-4">
                <a href="{{ route('products.index') }}" 
                   class="bg-white text-slate-900 hover:bg-slate-50 font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
                    Lihat Produk
                </a>
                <a href="{{ route('catalogue') }}" 
                   class="border-2 border-white text-white hover:bg-white hover:text-slate-900 font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
                    Katalog
                </a>
            </div>
        </div>
    </div>

</section>

<!-- Featured Products Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Produk Unggulan
            </h2>
            <p class="text-lg text-gray-600">
                Koleksi terbaru dan terpopuler dari toko kami
            </p>
        </div>
        
        @if($featuredProducts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : '/images/placeholder.jpg' }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover"
                                 onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjNGNEY2Ii8+Cjx0ZXh0IHg9IjE1MCIgeT0iMTUwIiBmaWxsPSIjOUI5QjlCIiBmb250LXNpemU9IjE2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+S0FPUzwvdGV4dD4KPC9zdmc+'">
                            <div class="absolute top-4 right-4">
                                <span class="bg-slate-900 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $product->category->name }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                {{ $product->name }}
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-slate-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                
                                <button @click="$dispatch('product-modal', {{ $product->toJson() }})" 
                                        class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded transition duration-300">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" 
                   class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
                    Lihat Semua Produk
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <svg class="mx-auto h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500">Produk akan segera hadir. Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Mengapa Memilih Kami?
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-slate-900 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Kualitas Premium</h3>
                <p class="text-gray-600">Bahan berkualitas tinggi yang nyaman dipakai sehari-hari</p>
            </div>
            
            <div class="text-center">
                <div class="bg-slate-900 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Pengiriman Cepat</h3>
                <p class="text-gray-600">Proses pesanan dan pengiriman yang cepat dan terpercaya</p>
            </div>
            
            <div class="text-center">
                <div class="bg-slate-900 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Pelayanan Terbaik</h3>
                <p class="text-gray-600">Customer service yang responsif dan siap membantu Anda</p>
            </div>
        </div>
    </div>
</section>
@endsection