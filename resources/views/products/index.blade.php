@extends('layouts.app')

@section('title', 'Semua Produk')

@section('content')
<!-- Page Header -->
<section class="relative bg-gradient-to-r from-slate-900 to-slate-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Semua Produk
            </h1>
            <p class="text-xl text-blue-200">
                Temukan koleksi lengkap kaos berkualitas premium
            </p>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->count() > 0)
            <div class="mb-8">
                <p class="text-gray-600">
                    Menampilkan {{ $products->firstItem() }}-{{ $products->lastItem() }} dari {{ $products->total() }} produk
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        <div class="relative group">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : '/images/placeholder.jpg' }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition duration-300"
                                     onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjNGNEY2Ii8+Cjx0ZXh0IHg9IjE1MCIgeT0iMTUwIiBmaWxsPSIjOUI5QjlCIiBmb250LXNpemU9IjE2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+S0FPUzwvdGV4dD4KPC9zdmc+'">
                            </a>
                            
                            <div class="absolute top-4 right-4">
                                <span class="bg-slate-900 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $product->category->name }}
                                </span>
                            </div>

                            <div class="absolute inset-0 bg-slate-400/0 group-hover:bg-slate-400/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                <a href="{{ route('products.show', $product->slug) }}"
                                class="bg-white text-slate-900 hover:bg-blue-50 font-bold py-2 px-4 rounded transition duration-300">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-1">
                                {{ $product->name }}
                            </h3>

                            <p class="text-gray-600 mb-4 text-sm line-clamp-2">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-slate-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>

                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded text-sm transition duration-300">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $products->links('pagination::tailwind') }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="text-gray-400 mb-6">
                    <svg class="mx-auto h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-medium text-gray-900 mb-4">Belum Ada Produk</h3>
                <p class="text-gray-500 mb-8">Produk akan segera hadir. Silakan kembali lagi nanti atau lihat katalog kami.</p>
                <a href="{{ route('catalogue') }}" 
                   class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 inline-block">
                    Lihat Katalog
                </a>
            </div>
        @endif
    </div>
</section>


<!-- Call to Action -->
<section class="bg-gradient-to-r from-slate-700 to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Tidak Menemukan yang Anda Cari?
        </h2>
        <p class="text-xl text-blue-200 mb-8">
            Hubungi kami untuk konsultasi produk atau custom design
        </p>
        <a href="https://wa.me/6281234567890?text=Halo, saya ingin konsultasi tentang produk kaos" 
           target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
            Hubungi WhatsApp
        </a>
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
</style>
@endpush