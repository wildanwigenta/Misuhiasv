@extends('layouts.app')

@section('title', $product->name)

@section('content')
<!-- Breadcrumb -->
<section class="bg-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('products.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Produk</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            <!-- Product Image -->
            <div class="flex flex-col-reverse">
                <div class="w-full aspect-w-1 aspect-h-1">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : '/images/placeholder.jpg' }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-96 lg:h-[500px] object-cover rounded-lg shadow-lg"
                         onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjRjNGNEY2Ii8+Cjx0ZXh0IHg9IjI1MCIgeT0iMjUwIiBmaWxsPSIjOUI5QjlCIiBmb250LXNpemU9IjI0IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+S0FPUyBQUkVNSVVNPC90ZXh0Pgo8L3N2Zz4='">
                </div>
            </div>

            <!-- Product Info -->
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                <!-- Category Badge -->
                <div class="mb-4">
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                        {{ $product->category->name }}
                    </span>
                </div>
                
                <!-- Product Name -->
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <div class="mt-6">
                    <p class="text-3xl tracking-tight text-blue-900 font-bold">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-900">Deskripsi Produk</h3>
                    <div class="mt-4 prose prose-sm text-gray-500">
                        <p class="text-base leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>

                <!-- Product Features -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Keunggulan Produk</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Bahan 100% Cotton Combed 30s
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Sablon Plastisol Berkualitas Tinggi
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Nyaman Dipakai Sehari-hari
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Tersedia Berbagai Ukuran
                        </li>
                    </ul>
                </div>

                <!-- Size Guide -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Panduan Ukuran</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="grid grid-cols-4 gap-4 text-sm">
                            <div class="font-medium text-gray-900">Ukuran</div>
                            <div class="font-medium text-gray-900">Lebar Dada</div>
                            <div class="font-medium text-gray-900">Panjang</div>
                            <div class="font-medium text-gray-900">Lengan</div>
                            
                            <div class="text-gray-600">S</div>
                            <div class="text-gray-600">48 cm</div>
                            <div class="text-gray-600">68 cm</div>
                            <div class="text-gray-600">19 cm</div>
                            
                            <div class="text-gray-600">M</div>
                            <div class="text-gray-600">50 cm</div>
                            <div class="text-gray-600">70 cm</div>
                            <div class="text-gray-600">20 cm</div>
                            
                            <div class="text-gray-600">L</div>
                            <div class="text-gray-600">52 cm</div>
                            <div class="text-gray-600">72 cm</div>
                            <div class="text-gray-600">21 cm</div>
                            
                            <div class="text-gray-600">XL</div>
                            <div class="text-gray-600">54 cm</div>
                            <div class="text-gray-600">74 cm</div>
                            <div class="text-gray-600">22 cm</div>
                        </div>
                    </div>
                </div>

                <!-- Order Button -->
                <div class="mt-10">
                    <a href="https://wa.me/6281234567890?text=Halo, saya tertarik membeli kaos {{ urlencode($product->name) }}. Apakah masih tersedia?" 
                       target="_blank"
                       class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-lg transition duration-300 flex items-center justify-center text-lg">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        Pesan Sekarang via WhatsApp
                    </a>
                </div>
                
                <!-- Additional Info -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-500">
                        Atau hubungi kami di <strong>+62 812-3456-7890</strong> untuk informasi lebih lanjut
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Produk Terkait</h2>
        
        @php
            $relatedProducts = App\Models\Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->where('is_active', true)
                ->take(4)
                ->get();
        @endphp
        
        @if($relatedProducts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="{{ $relatedProduct->image ? asset('storage/' . $relatedProduct->image) : '/images/placeholder.jpg' }}" 
                                 alt="{{ $relatedProduct->name }}" 
                                 class="w-full h-48 object-cover"
                                 onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjNGNEY2Ii8+Cjx0ZXh0IHg9IjE1MCIgeT0iMTUwIiBmaWxsPSIjOUI5QjlCIiBmb250LXNpemU9IjE2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+S0FPUzwvdGV4dD4KPC9zdmc+'">
                        </div>
                        
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-1">
                                {{ $relatedProduct->name }}
                            </h3>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-900">
                                    Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                </span>
                                
                                <a href="{{ route('products.show', $relatedProduct->slug) }}" 
                                   class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center">Tidak ada produk terkait.</p>
        @endif
    </div>
</section>
@endsection