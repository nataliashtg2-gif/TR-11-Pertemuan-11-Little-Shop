
@extends('layouts.app')

@section('title', 'Kategori Produk')

@section('content')
<div class="products-page">

    {{-- Judul halaman --}}
    <div class="products-heading">
        <div>
            <span class="products-eyebrow">LITTLE SHOP COLLECTION</span>
            <h2>Kategori pilihan <span>✿</span></h2>
            <p>Temukan produk favoritmu berdasarkan kategori.</p>
        </div>

        <div class="products-count">
            {{ $categories->count() }} kategori
        </div>
    </div>

    {{-- Daftar kategori --}}
    <div class="category-section">
        @forelse ($categories as $category)
            <a
                href="{{ route('products.index', ['category' => $category->id]) }}"
                class="category-tile
                @if ($loop->index % 5 === 0) category-pink
                @elseif ($loop->index % 5 === 1) category-cream
                @elseif ($loop->index % 5 === 2) category-mint
                @elseif ($loop->index % 5 === 3) category-lilac
                @else category-peach
                @endif"
            >
                <span>
                    @if ($loop->index % 5 === 0)
                        ✿
                    @elseif ($loop->index % 5 === 1)
                        ♧
                    @elseif ($loop->index % 5 === 2)
                        ❀
                    @elseif ($loop->index % 5 === 3)
                        ♡
                    @else
                        🎀
                    @endif
                </span>

                <strong>{{ $category->name }}</strong>

                @if ($category->description)
                    <small>{{ $category->description }}</small>
                @endif

                <span>Lihat produk →</span>
            </a>
        @empty
            <div class="empty-products">
                <span>🌱</span>
                <h3>Belum ada kategori</h3>
                <p>Kategori produk belum tersedia saat ini.</p>
            </div>
        @endforelse
    </div>

    {{-- Tombol semua produk --}}
    <div style="margin-top: 24px;">
        <a href="{{ route('products.index') }}" class="btn primary">
            Lihat Semua Produk →
        </a>
    </div>

</div>
@endsection
