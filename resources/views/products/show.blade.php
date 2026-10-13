@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-cyan-50">

    <div class="max-w-6xl mx-auto px-6 py-12">

        {{-- Breadcrumb --}}
        <div class="mb-8">
            <a href="{{ route('products.index') }}"
               class="text-sm font-semibold text-pink-500 hover:text-pink-600 transition">
                ← Kembali ke Produk
            </a>
        </div>

        {{-- Detail Card --}}
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">

            <div class="grid md:grid-cols-2">

                {{-- Product Image --}}
                <div class="bg-gradient-to-br from-pink-100 via-purple-100 to-cyan-100
                            min-h-[420px] flex items-center justify-center">

                    @if($product->image)
                        <img
                            src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset(ltrim($product->image, '/')) }}"
                            alt="{{ $product->name }}"
                            loading="lazy"
                            style="display:block; width:100%; max-width:560px; max-height:520px; object-fit:contain; padding:24px;"
                            onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='block';"
                        >
                        <div class="text-center" style="display:none">
                            <div class="text-8xl mb-5">🛍️</div>
                            <p class="text-sm font-semibold text-gray-500">Little Shop</p>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="text-8xl mb-5">🛍️</div>
                            <p class="text-sm font-semibold text-gray-500">Little Shop</p>
                        </div>
                    @endif

                </div>

                {{-- Product Information --}}
                <div class="p-8 md:p-12 flex flex-col justify-center">

                    {{-- Category --}}
                    <div class="mb-4">
                        <span class="inline-block px-4 py-2 rounded-full
                                     bg-pink-100 text-pink-600
                                     text-sm font-bold">
                            {{ $product->category->name }}
                        </span>
                    </div>

                    {{-- Product Name --}}
                    <h1 class="text-3xl md:text-4xl font-extrabold
                               text-slate-800 leading-tight mb-5">
                        {{ $product->name }}
                    </h1>

                    {{-- Description --}}
                    <p class="text-gray-500 leading-relaxed mb-7">
                        {{ $product->description }}
                    </p>

                    {{-- Price --}}
                    <div class="mb-5">
                        <p class="text-sm text-gray-400 mb-1">
                            Harga
                        </p>

                        <div class="text-3xl font-extrabold text-pink-500">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    {{-- Stock --}}
                    <div class="mb-8">
                        <p class="text-gray-600">
                            Stok tersedia:
                            <strong class="text-slate-800">
                                {{ $product->stock }}
                            </strong>
                        </p>
                    </div>

        

                </div>

            </div>

        </div>

    </div>

</div>

@endsection