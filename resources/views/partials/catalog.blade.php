{{-- HEADER --}}
<header>
    <div>
        <div class="brand">
            <img
                src="{{ asset('images/logo 2.jpg') }}"
                alt="Logo HotMeal"
                class="logo"
            >

            <div>
                <b>HotMeal</b>
                <small>FAST & FRESH KIOSK</small>
            </div>
        </div>

        <div class="header-contact">
            <img
                src="{{ asset('images/icons/icon-call-center.svg') }}"
                alt="Call Center"
                class="header-icon"
            >

            <a href="tel:0778123456" style="color:inherit;text-decoration:none">
                Call Center
            </a>
        </div>
    </div>

    <div class="header-info">
        <div class="wifi">
            <img
                src="{{ asset('images/icons/icon-wifi.svg') }}"
                alt="Wi-Fi"
                class="header-icon"
            >

            <span>Wi-Fi Terhubung</span>
        </div>

        <div class="date" id="date"></div>
        <div id="time"></div>
    </div>
</header>


{{-- KONTEN KATALOG --}}
<main class="container">

    <h1>Smart Kiosk</h1>

    <p class="subtitle">
        Pilih makanan yang kamu inginkan
    </p>


    {{-- PENCARIAN --}}
    <form
        class="search"
        method="GET"
        action="{{ route('products.index') }}"
    >
        <input
            type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Cari makanan..."
            aria-label="Cari makanan"
        >

        <input
            type="hidden"
            name="category"
            value="{{ $category ?? 'all' }}"
        >

        <button type="submit">
            Cari
        </button>
    </form>


    {{-- FILTER KATEGORI --}}
    <nav class="filters">

        <a
            class="{{ ($category ?? 'all') === 'all' ? 'active' : '' }}"
            href="{{ route('products.index', [
                'category' => 'all',
                'search' => $search ?? ''
            ]) }}"
        >
            Semua
        </a>

        <a
            class="{{ ($category ?? '') === 'recommended' ? 'active' : '' }}"
            href="{{ route('products.index', [
                'category' => 'recommended',
                'search' => $search ?? ''
            ]) }}"
        >
            Rekomendasi
        </a>

        <a
            class="{{ ($category ?? '') === 'makanan' ? 'active' : '' }}"
            href="{{ route('products.index', [
                'category' => 'makanan',
                'search' => $search ?? ''
            ]) }}"
        >
            Makanan
        </a>

        <a
            class="{{ ($category ?? '') === 'snack' ? 'active' : '' }}"
            href="{{ route('products.index', [
                'category' => 'snack',
                'search' => $search ?? ''
            ]) }}"
        >
            Snack
        </a>

    </nav>


    {{-- DAFTAR PRODUK --}}
    <section class="grid">

        @forelse($products as $item)

            <article class="card">

                <img
                    src="{{ $item['image'] }}"
                    alt="{{ $item['name'] }}"
                >

                <div class="card-info">

                    <span class="category">
                        {{ ucfirst($item['category']) }}
                    </span>

                    <h2>
                        {{ $item['name'] }}
                    </h2>

                    <div class="card-price">
                        Rp{{ number_format($item['price'], 0, ',', '.') }}
                    </div>

                    <a
                        class="detail-link"
                        href="{{ route('products.show', [
                            'id' => $item['id'],
                            'search' => $search ?? '',
                            'category' => $category ?? 'all'
                        ]) }}"
                    >
                        Lihat Detail
                    </a>

                </div>

            </article>

        @empty

            <div class="empty">
                Menu tidak ditemukan untuk pencarian atau kategori ini.
            </div>

        @endforelse

    </section>

</main>


{{-- FOOTER --}}
<footer>

    <div class="footer-item">

        <img
            src="{{ asset('images/icons/icon-temperature.svg') }}"
            alt="Suhu"
            class="header-icon"
        >

        <div>
            <small>Suhu penyimpanan</small>
            <b>85°C · Aman</b>
        </div>

    </div>

    <div class="footer-item">
        <img
            src="{{ asset('images/icons/icon-location.svg') }}"
            alt="Lokasi"
            class="header-icon"
        >

        <div>
            <small>Lokasi mesin</small>
            <b>Politeknik Negeri Batam · Gedung Tower A</b>
        </div>
    </div>
</footer>