
@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="products-page">

    <div class="products-heading">
        <div>
            <span class="products-eyebrow">LITTLE SHOP COLLECTION</span>
            <h2>Produk pilihan <span>✿</span></h2>
            <p>Temukan produk favorit untuk menemani keseharianmu.</p>
        </div>

        <div class="products-count">
            {{ $products->total() }} produk
        </div>
    </div>

    <form class="filters" method="GET" action="{{ route('products.index') }}">
        <div class="filter-search">
            <span>⌕</span>
            <input
                type="search"
                name="q"
                value="{{ request('q') }}"
                placeholder="Cari produk..."
            >
        </div>

        <select name="category" aria-label="Pilih kategori">
            <option value="">Semua kategori</option>

            @foreach ($categories as $c)
                <option
                    value="{{ $c->id }}"
                    @selected((string) request('category') === (string) $c->id)
                >
                    {{ $c->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn primary">
            Cari produk →
        </button>
    </form>

    <div class="product-grid">
        @forelse ($products as $p)
            <article class="product-card">

                <a
                    href="{{ route('products.show', $p) }}"
                    class="product-art"
                    aria-label="Lihat {{ $p->name }}"
                >
                    @if ($p->image)
                        <img
                            src="{{ \Illuminate\Support\Str::startsWith($p->image, ['http://', 'https://']) ? $p->image : asset(ltrim($p->image, '/')) }}"
                            alt="{{ $p->name }}"
                            loading="lazy"
                            onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='grid';"
                        >
                        <span class="product-placeholder" style="display: none;">🌷</span>
                    @else
                        <span class="product-placeholder">🌷</span>
                    @endif

                    <span class="product-art-badge">Little Shop ♡</span>
                </a>

                <div class="product-info">
                    <span class="product-category">
                        {{ $p->category->name ?? 'Pilihan kami' }}
                    </span>

                    <h3>
                        <a href="{{ route('products.show', $p) }}">
                            {{ $p->name }}
                        </a>
                    </h3>

                    <div class="product-price">
                        Rp {{ number_format((float) $p->price, 0, ',', '.') }}
                    </div>

                    <div class="product-stock">
                        @if ($p->stock > 0)
                            <span class="stock-dot"></span>
                            Stok tersedia
                        @else
                            <span class="stock-dot stock-empty"></span>
                            Stok habis
                        @endif
                    </div>

                    <a
                        href="{{ route('products.show', $p) }}"
                        class="product-button"
                    >
                        Lihat detail <span>→</span>
                    </a>
                </div>

            </article>
        @empty
            <div class="empty-products">
                <span>🌱</span>
                <h3>Produk belum ditemukan</h3>
                <p>Coba kata kunci lain atau pilih kategori berbeda.</p>

                <a href="{{ route('products.index') }}" class="btn primary">
                    Lihat semua produk
                </a>
            </div>
        @endforelse
    </div>

    <div class="products-pagination">
        {{ $products->appends(request()->query())->links() }}
    </div>

</div>
@endsection
