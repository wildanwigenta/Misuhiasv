@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<!-- Page Header -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Katalog Produk
            </h1>
            <p class="text-xl text-blue-200">
                Jelajahi koleksi kami berdasarkan kategori
            </p>
        </div>
    </div>
</section>

<!-- Categories and Products -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($categories->count() > 0)
            @foreach($categories as $category)
                @if($category->products->count() > 0)
                    <!-- Category Section -->
                    <div class="mb-16">
                        <!-- Category Header -->
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">
                                    {{ $category->name }}
                                </h2>
                                <p class="text-gray-600 mt-2">
                                    {{ $category->products->count() }} produk tersedia
                                </p>
                            </div>
                            
                            <!-- View All Button -->
                            <a href="{{ route('products.index') }}?category={{ $category->slug }}" 
                               class="text-blue-900 hover:text-blue-700 font-semibold flex items-center">
                                Lihat Semua
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                        
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($category->products->take(8) as $product)
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                                    <div class="relative group">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : '/images/placeholder.jpg' }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-64 object-cover group-hover:scale-105 transition duration-300"
                                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjNGNEY2Ii8+Cjx0ZXh0IHg9IjE1MCIgeT0iMTUwIiBmaWxsPSIjOUI5QjlCIiBmb250LXNpemU9IjE2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+S0FPUzwvdGV4dD4KPC9zdmc+'">
                                        
                                        <!-- Quick View Overlay -->
                                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                            <div class="space-x-2">
                                                <button @click="$dispatch('product-modal', {{ $product->toJson() }})" 
                                                        class="bg-white text-blue-900 hover:bg-blue-50 font-bold py-2 px-4 rounded transition duration-300">
                                                    Quick View
                                                </button>
                                                <a href="{{ route('products.show', $product->slug) }}" 
                                                   class="bg-blue-900 text-white hover:bg-blue-800 font-bold py-2 px-4 rounded transition duration-300">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <!-- New Badge (for products created in last 7 days) -->
                                        @if($product->created_at->diffInDays(now()) <= 7)
                                            <div class="absolute top-4 left-4">
                                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                                    Baru
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-1">
                                            {{ $product->name }}
                                        </h3>
                                        
                                        <p class="text-gray-600 mb-4 text-sm line-clamp-2">
                                            {{ Str::limit($product->description, 80) }}
                                        </p>
                                        
                                        <div class="flex justify-between items-center">
                                            <span class="text-xl font-bold text-blue-900">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            
                                            <button @click="$dispatch('product-modal', {{ $product->toJson() }})" 
                                                    class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded text-sm transition duration-300">
                                                Detail
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Show More Button if there are more than 8 products -->
                        @if($category->products->count() > 8)
                            <div class="text-center mt-8">
                                <a href="{{ route('products.index') }}?category={{ $category->slug }}" 
                                   class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 inline-block">
                                    Lihat {{ $category->products->count() - 8 }} Produk Lainnya
                                </a>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="text-gray-400 mb-6">
                    <svg class="mx-auto h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-2xl font-medium text-gray-900 mb-4">Belum Ada Kategori</h3>
                <p class="text-gray-500 mb-8">Kategori dan produk akan segera hadir. Silakan kembali lagi nanti.</p>
                <a href="{{ route('home') }}" 
                   class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 inline-block">
                    Kembali ke Home
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Category Navigation -->
@if($categories->count() > 1)
<section class="bg-white py-8 border-t">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Navigasi Kategori</h3>
        <div class="flex flex-wrap gap-4">
            @foreach($categories as $category)
                @if($category->products->count() > 0)
                    <a href="#category-{{ $category->slug }}" 
                       class="bg-blue-100 hover:bg-blue-200 text-blue-900 font-medium py-2 px-4 rounded-lg transition duration-300"
                       onclick="document.querySelector('h2:contains(\"{{ $category->name }}\")').scrollIntoView({behavior: 'smooth'})">
                        {{ $category->name }} ({{ $category->products->count() }})
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="bg-blue-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Tertarik dengan Produk Kami?
        </h2>
        <p class="text-xl text-blue-200 mb-8">
            Hubungi kami sekarang untuk mendapatkan penawaran terbaik
        </p>
        <div class="space-x-4">
            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan produk kaos Anda. Bisa minta informasi lebih lanjut?" 
               target="_blank"
               class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
                Hubungi WhatsApp
            </a>
            <a href="{{ route('products.index') }}" 
               class="border-2 border-white text-white hover:bg-white hover:text-blue-900 font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    html {
        scroll-behavior: smooth;
    }
</style>
@endpush