<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Katalog Produk - Vending Food</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
        }

        .header span {
            font-size: 14px;
            color: #777;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box input {
            flex: 1;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
        }

        .search-box button {
            padding: 14px 22px;
            border: none;
            border-radius: 10px;
            background: #222;
            color: white;
            cursor: pointer;
        }

        .categories {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .category {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 20px;
            background: white;
            color: #555;
            border: 1px solid #ddd;
        }

        .category.active {
            background: #222;
            color: white;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .category-label {
            font-size: 12px;
            color: #777;
            margin-bottom: 5px;
        }

        .card h3 {
            margin-bottom: 8px;
        }

        .price {
            font-weight: bold;
            margin-bottom: 12px;
        }

        .detail-button {
            display: block;
            text-align: center;
            text-decoration: none;
            background: #222;
            color: white;
            padding: 10px;
            border-radius: 8px;
        }

        .empty {
            text-align: center;
            padding: 50px;
            color: #777;
            grid-column: 1 / -1;
        }

        @media (max-width: 900px) {
            .products {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .products {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>🍱 Vending Food</h1>
            <span>Pilih makanan yang kamu inginkan</span>
        </div>
    </div>

    <!-- SEARCH -->
    <form action="{{ route('products.index') }}" method="GET">

        <div class="search-box">
            <input
                type="text"
                name="search"
                placeholder="Cari makanan..."
                value="{{ $search }}"
            >

            <button type="submit">
                Cari
            </button>
        </div>

    </form>

    <!-- CATEGORY -->
    <div class="categories">

        <a
            href="{{ route('products.index') }}"
            class="category {{ !$category || $category === 'Semua' ? 'active' : '' }}"
        >
            Semua
        </a>

        <a
            href="{{ route('products.index', ['category' => 'Rekomendasi']) }}"
            class="category {{ $category === 'Rekomendasi' ? 'active' : '' }}"
        >
            Rekomendasi
        </a>

        <a
            href="{{ route('products.index', ['category' => 'Makanan']) }}"
            class="category {{ $category === 'Makanan' ? 'active' : '' }}"
        >
            Makanan
        </a>

        <a
            href="{{ route('products.index', ['category' => 'Snack']) }}"
            class="category {{ $category === 'Snack' ? 'active' : '' }}"
        >
            Snack
        </a>

    </div>

    <!-- PRODUCTS -->
    <div class="products">

        @forelse ($products as $product)

            <div class="card">

                <img
                    src="{{ $product['image'] }}"
                    alt="{{ $product['name'] }}"
                >

                <div class="card-content">

                    <div class="category-label">
                        {{ $product['category'] }}
                    </div>

                    <h3>
                        {{ $product['name'] }}
                    </h3>

                    <div class="price">
                        Rp{{ number_format($product['price'], 0, ',', '.') }}
                    </div>

                    <a
                        href="#"
                        class="detail-button"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>

        @empty

            <div class="empty">
                Produk tidak ditemukan.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>