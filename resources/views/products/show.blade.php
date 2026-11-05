<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Menu - HotMeal</title>
    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
        }
        .catalog-background {
            filter: blur(3px);
            pointer-events: none;
            user-select: none;
        }
        /* Lapisan modal */
        .detail-overlay {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(40, 25, 15, 0.35);
        }

        .detail-modal {
            width: 100%;
            max-width: 560px;
            max-height: 94vh;
            overflow-y: auto;
            padding: 18px;
            border-radius: 18px;
            background: #fff7ec;
            border: 1px solid #f0e2d2;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .title h2 {
            margin: 0;
            font-size: 30px;
        }

        .close {
            border: 0;
            border-radius: 10px;
            padding: 8px 12px;
            background: #fff0df;
            font-size: 25px;
            color: #432718;
            cursor: pointer;
        }

        .food {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 14px;
        }

        .product-info {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            margin-top: 16px;
        }

        .product-info h2 {
            margin: 0;
            font-size: 25px;
        }

        .price {
            color: #f4511e;
            font-size: 19px;
            white-space: nowrap;
        }

        .stock {
            margin-top: 8px;
            color: #8b755f;
            font-size: 14px;
        }

        .description {
            font-size: 13px;
            line-height: 1.6;
            color: #81776e;
        }

        /* Tombol kandungan nutrisi */
        .nutrition {
            width: 100%;
            padding: 14px;
            border: 1px solid #efddca;
            border-radius: 12px;
            background: #fffaf4;
            text-align: left;
            font-size: 17px;
            color: #432718;
            cursor: pointer;
        }

        .nutrition small {
            display: block;
            margin-top: 5px;
            color: #897f75;
        }

        /* Detail kandungan nutrisi */
        .nutrition-detail {
            display: none;
            padding: 12px 0 4px;
        }

        .nutrition-detail.open {
            display: block;
        }

        .nutrition-heading {
            margin: 0 0 10px;
            font-size: 11px;
            color: #89715e;
        }

        .nutrition-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .nutrition-item {
            display: flex;
            flex-direction: column;
            gap: 7px;
            padding: 13px;
            border: 1px solid #efddca;
            border-radius: 10px;
            background: #fffaf4;
        }

        .nutrition-item span {
            color: #89715e;
            font-size: 20px;
        }

        .nutrition-item b {
            color: #432718;
            font-size: 16px;
        }

        .nutrition-empty {
            padding: 12px;
            border-radius: 10px;
            background: #fffaf4;
            color: #89715e;
            font-size: 12px;
            line-height: 1.5;
        }

        /* Jumlah pesanan dan tombol beli */
        .purchase {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 16px;
        }

        .quantity {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 6px 8px;
            background: #fff3e5;
            border-radius: 12px;
        }

        .quantity button {
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 50%;
            background: #ffe5c6;
            font-size: 18px;
            cursor: pointer;
        }

        .quantity .plus {
            background: #f4511e;
            color: white;
        }

        .buy {
            flex: 1;
            padding: 15px 8px;
            border: 0;
            border-radius: 12px;
            background: #432718;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 360px) {
            .detail-overlay {
                padding: 10px;
            }

            .detail-modal {
                padding: 14px;
            }

            .food {
                height: 160px;
            }

            .product-info h2 {
                font-size: 17px;
            }

            .price {
                font-size: 17px;
            }

            .purchase {
                gap: 6px;
            }

            .quantity {
                gap: 6px;
            }
        }
    </style>
</head>

<body>
    <div class="catalog-background modal-open">
        @include('partials.catalog')
    </div>

    {{-- MODAL DETAIL PRODUK --}}
    <div class="detail-overlay">
        <main class="detail-modal">
            <div class="title">
                <h2>Detail Menu</h2>
                <button
                    type="button"
                    class="close"
                    onclick="backToMenu()"
                    aria-label="Tutup detail menu"
                >
                    ×
                </button>
            </div>

            <img
                class="food"
                src="{{ $product['image'] }}"
                alt="{{ $product['name'] }}"
            >

            <div class="product-info">
                <h2>{{ $product['name'] }}</h2>

                <div class="price">
                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                </div>
            </div>

            <div class="stock">
                Stok Tersedia: 8
            </div>

            {{-- KANDUNGAN NUTRISI --}}
            <button
                type="button"
                class="nutrition"
                onclick="toggleNutrition()"
            >
                Kandungan Nutrisi ⓘ
                <small>Lihat informasi nutrisi menu</small>
            </button>

            <div class="nutrition-detail" id="nutrition">

                <p class="nutrition-heading">
                    Informasi gizi per 1 porsi:
                </p>

                @if(isset($product['nutrition']))
                    <div class="nutrition-list">

                        <div class="nutrition-item">
                            <span>Kalori</span>
                            <b>
                                {{ $product['nutrition']['kalori'] ?? '-' }} kkal
                            </b>
                        </div>

                        <div class="nutrition-item">
                            <span>Karbohidrat</span>
                            <b>
                                {{ $product['nutrition']['karbohidrat'] ?? '-' }} g
                            </b>
                        </div>

                        <div class="nutrition-item">
                            <span>Lemak</span>
                            <b>
                                {{ $product['nutrition']['lemak'] ?? '-' }} g
                            </b>
                        </div>

                        <div class="nutrition-item">
                            <span>Protein</span>
                            <b>
                                {{ $product['nutrition']['protein'] ?? '-' }} g
                            </b>
                        </div>

                    </div>
                @else
                    <div class="nutrition-empty">
                        Informasi nutrisi belum tersedia untuk menu ini.
                    </div>
                @endif
            </div>

            {{-- JUMLAH PESANAN --}}
            <div class="purchase">

                <div class="quantity">
                    <button type="button" onclick="changeQty(-1)">−</button>

                    <b id="qty">1</b>

                    <button
                        type="button"
                        class="plus"
                        onclick="changeQty(1)"
                    >
                        +
                    </button>
                </div>

                <button
                    type="button"
                    class="buy"
                    onclick="buyProduct()"
                >
                    BELI → Rp<span id="totalPrice">{{ number_format($product['price'], 0, ',', '.') }}</span>
                </button>
            </div>
        </main>
    </div>

    <script>
        
    let quantity = 1;

    const price = {{ $product['price'] }};

    // Tanggal dan waktu
    function updateDate() {
        const dateElement = document.getElementById('date');
        const timeElement = document.getElementById('time');

        if (!dateElement || !timeElement) return;

        const now = new Date();

        dateElement.textContent = now.toLocaleDateString('id-ID', {
            weekday: 'short',
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            timeZone: 'Asia/Jakarta'
        });

        timeElement.textContent = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            timeZone: 'Asia/Jakarta'
        }) + ' WIB';
    }

    updateDate();
    setInterval(updateDate, 60000);

    // Membuka dan menutup informasi nutrisi
    function toggleNutrition() {
        document.getElementById('nutrition').classList.toggle('open');
    }

    // Memperbarui jumlah dan total harga
    function updateOrder() {
        const total = price * quantity;

        document.getElementById('qty').textContent = quantity;

        document.getElementById('totalPrice').textContent =
            total.toLocaleString('id-ID');
    }

    // Menambah atau mengurangi jumlah pesanan
    function changeQty(value) {
        quantity = Math.max(1, Math.min(8, quantity + value));

        updateOrder();
    }

    // Kembali ke katalog dengan pencarian dan kategori sebelumnya
    function backToMenu() {
        const url = new URL(
            @json(route('products.index')),
            window.location.origin
        );

        url.searchParams.set('search', @json($search ?? ''));
        url.searchParams.set('category', @json($category ?? 'all'));

        window.location.href = url.toString();
    }

    // Menuju halaman konfirmasi pesanan
    function buyProduct() {
        const url = new URL(
            @json(route('checkout.show', $product['id'])),
            window.location.origin
        );

        url.searchParams.set('quantity', quantity);

        window.location.href = url.toString();
    }
    </script>
    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>
</body>
</html>