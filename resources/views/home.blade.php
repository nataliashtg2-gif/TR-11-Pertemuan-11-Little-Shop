
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Shop — Temukan Favoritmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="shop-body">
<div class="shop-layout">

    <!-- SIDEBAR -->
    <aside class="shop-sidebar">
        <a href="{{ route('home') }}" class="shop-brand">
            <span class="brand-mascot">🌷</span>
            <span>
                <strong>LITTLE SHOP</strong>
                <small>Fresh things, happy days ♡</small>
            </span>
        </a>

       
<p class="side-label">MENU UTAMA</p>

<nav class="side-menu">
    <a href="{{ route('home') }}" class="side-link">
        <span>⌂</span> Beranda
    </a>

    <a href="{{ route('products.index') }}" class="side-link">
        <span>♧</span> Produk
    </a>

    <a href="{{ route('categories.index') }}" class="side-link">
        <span>▦</span> Kategori
    </a>

    @auth
        <a href="{{ route('dashboard') }}" class="side-link">
            <span>▤</span> Dashboard
        </a>
    @endauth

    <a href="{{ route('products.explore') }}" class="side-link">
        <span>♡</span> Jelajahi Produk
    </a>
</nav>

<p class="side-label account-label">AKUN</p>

<nav class="side-menu">
    @auth
        <a href="{{ route('dashboard') }}" class="side-link">
            <span>♙</span> Profil / Dashboard
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="side-link side-logout">
                <span>↪</span> Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="side-link">
            <span>♙</span> Login
        </a>

        <a href="{{ route('register') }}" class="side-link">
            <span>＋</span> Daftar Akun
        </a>
    @endauth
</nav>


        <!-- Maskot sementara: nanti bisa diganti ilustrasi orisinal -->
        <div class="mascot-card">
            <div class="mascot-face">🐶🌷</div>
            <strong>Hai, teman belanja!</strong>
            <p>Temukan hal kecil yang bikin harimu lebih ceria ♡</p>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <div class="shop-main">

        <header class="shop-topbar">
            <button type="button" class="mobile-menu"
                    onclick="document.body.classList.toggle('sidebar-open')"
                    aria-label="Buka menu">☰</button>

            <form action="{{ route('products.index') }}"
                  method="GET" class="top-search">
                <span>⌕</span>
                <input type="search" name="search"
                       placeholder="Cari produk, kategori, atau merek...">
            </form>

            <div class="top-user">
                <span class="notification-icon">♡</span>
                <span class="user-avatar">
                    @auth
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    @else
                        L
                    @endauth
                </span>
                <span class="user-caption">
                    <strong>
                        @auth
                            {{ auth()->user()->name }}
                        @else
                            Guest
                        @endauth
                    </strong>
                    <small>Little Shop Member</small>
                </span>
            </div>
        </header>

        <main class="shop-content">

            <!-- HERO -->
            <section class="shop-hero">
                <div class="hero-copy">
                    <span class="hero-tag">FRESH · SIMPLE · PLAYFUL</span>
                    <h1>Temukan sesuatu yang kamu suka.</h1>
                    <p>
                        Produk pilihan, berkualitas, dan menyenangkan
                        untuk melengkapi keseharianmu.
                    </p>
                    <a href="{{ route('products.index') }}" class="primary-button">
                        Jelajahi Produk <span>→</span>
                    </a>
                </div>

                <div class="hero-art" aria-label="Ilustrasi maskot Little Shop">
                    <div class="art-sparkle sparkle-one">✿</div>
                    <div class="art-sparkle sparkle-two">♡</div>
                    <div class="plant-pot">
                        <span class="plant-leaf">🌿</span>
                        <span class="plant-dog">🐶</span>
                        <span class="plant-flower">🌷</span>
                        <span class="plant-bag">🛍️</span>
                    </div>
                    <span class="hero-note">Good things<br>for brighter days ♡</span>
                </div>
            </section>


<!-- KATEGORI -->
<section class="category-section">
    <a href="{{ route('products.index') }}" class="category-tile category-pink">
        <span>✿</span>
        <strong>Semua Produk</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Skin Care']) }}" class="category-tile category-cream">
        <span>♧</span>
        <strong>Skin Care</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Hair Care']) }}" class="category-tile category-mint">
        <span>❀</span>
        <strong>Hair Care</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Fragrance']) }}" class="category-tile category-lilac">
        <span>♧</span>
        <strong>Fragrance</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Body Care']) }}" class="category-tile category-peach">
        <span>❋</span>
        <strong>Body Care</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Make Up']) }}" class="category-tile category-lilac">
        <span>✿</span>
        <strong>Make Up</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Food & Drink']) }}" class="category-tile category-mint">
        <span>♡</span>
        <strong>Food &amp; Drink</strong>
    </a>

    <a href="{{ route('products.index', ['q' => 'Aksesori']) }}" class="category-tile category-pink">
        <span>🎀</span>
        <strong>Aksesori</strong>
    </a>
</section>


            <!-- PRODUK DINAMIS DARI DATABASE -->
            <section class="products-section" id="produk">
                <div class="section-heading">
                    <div>
                        <h2>Fresh Picks <span>✿</span></h2>
                        <p>Produk pilihan untuk melengkapi hari-harimu ✨</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="view-all">
                        Lihat semua →
                    </a>
                </div>

                <div class="product-grid">
                    @forelse($products as $p)
                        <article class="product-card">
                            <a href="{{ route('products.show', $p) }}"
                               class="product-art">
                                <span class="product-art-icon">🌷</span>
                                <span class="product-art-sparkle">✦</span>
                            </a>

                            <div class="product-info">
                                <span class="product-category">
                                    {{ $p->category->name ?? 'Pilihan Kami' }}
                                </span>

                                <h3>
                                    <a href="{{ route('products.show', $p) }}">
                                        {{ $p->name }}
                                    </a>
                                </h3>

                                <p class="product-description">
                                    {{ \Illuminate\Support\Str::limit($p->description ?? '', 65) }}
                                </p>

                                <div class="product-price">
                                    Rp {{ number_format($p->price, 0, ',', '.') }}
                                </div>

                                <a href="{{ route('products.show', $p) }}"
                                   class="product-button">
                                    ♡ &nbsp; Lihat Produk
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="empty-products">
                            <span>🌱</span>
                            <h3>Produk sedang disiapkan</h3>
                            <p>Belum ada produk yang dapat ditampilkan.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <footer class="shop-footer">
                <span>Little Shop ♡</span>
                <span>Small things, brighter days.</span>
            </footer>
        </main>
    </div>
</div>
</body>
</html>
