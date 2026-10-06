<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Detail {{ $product['name'] }}
    </title>

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
            max-width: 900px;
            margin: auto;
            padding: 30px;
        }

        .back-button {
            display: inline-block;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .back-button:hover {
            color: #f4511e;
        }

        .detail-card {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow:
                0 5px 20px rgba(0,0,0,0.08);
        }

        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
        }

        .detail-content {
            padding: 30px;
        }

        .badges {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .badge {
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .favorite {
            background: #fff0e8;
            color: #f4511e;
        }

        .stock {
            background: #e4f7ef;
            color: #16836b;
        }

        .stock-empty {
            background: #fee2e2;
            color: #b91c1c;
        }

        .title-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 12px;
        }

        .title-price h1 {
            font-size: 30px;
        }

        .price {
            color: #f4511e;
            font-size: 24px;
            font-weight: bold;
            white-space: nowrap;
        }

        .description {
            color: #777;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .nutrition {
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .nutrition-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .nutrition-title {
            font-weight: bold;
            font-size: 16px;
        }

        .nutrition-arrow {
            color: #f4511e;
            font-size: 20px;
        }

        .nutrition-summary {
            color: #777;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .nutrition-list {
            display: grid;
            grid-template-columns:
                repeat(4, 1fr);
            gap: 10px;
        }

        .nutrition-item {
            background: #fff7ed;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
        }

        .nutrition-value {
            font-size: 17px;
            font-weight: bold
            margin-bottom: 5px;
        }

        .nutrition-label {
            font-size: 11px;
            color: #777;
        }

        .buy-box {
            background: #fafafa;
            border-radius: 18px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .quantity {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quantity button {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .minus {
            background: #eee;
            color: #333;
        }

        .plus {
            background: #f4511e;
            color: white;
        }

        .quantity-number {
            width: 30px;
            text-align: center;
            font-size: 18px;
            border: none;
            background: transparent;
        }

        .buy-button {
            flex: 1;
            max-width: 350px;
            padding: 16px;
            border: none;
            border-radius: 14px;
            background: #f4511e;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .buy-button:hover {
            background: #e94717;
        }

        .disabled {
            background: #aaa;
            cursor: not-allowed;
        }

        @media (max-width: 650px) {

            .container {
                padding: 20px;
            }

            .product-image {
                height: 280px;
            }

            .title-price {
                flex-direction: column;
                align-items: flex-start;
            }

            .nutrition-list {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .buy-box {
                flex-direction: column;
            }

            .buy-button {
                max-width: none;
                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <a
        href="{{ route('products.index') }}"
        class="back-button"
    >

        ← Kembali ke menu

    </a>


    <div class="detail-card">

        <img
            src="{{ $product['image'] }}"
            alt="{{ $product['name'] }}"
            class="product-image"
        >

        <div class="detail-content">

            <div class="badges">


                @if($product['favorite'])

                    <span class="badge favorite">

                        ☆ PALING LARIS

                    </span>

                @endif


                @if($product['stock'] > 0)

                    <span class="badge stock">

                        ✓ Stok tersedia:
                        {{ $product['stock'] }}

                    </span>

                @else

                    <span class="badge stock-empty">

                        Stok kosong

                    </span>

                @endif


            </div>


            <div class="title-price">


                <h1>

                    {{ $product['name'] }}

                </h1>


                <div class="price">

                    Rp{{ number_format(
                        $product['price'],
                        0,
                        ',',
                        '.'
                    ) }}

                </div>


            </div>


            <p class="description">

                {{ $product['description'] }}

            </p>


            <div class="nutrition">


                <div class="nutrition-header">


                    <div class="nutrition-title">

                        Kandungan nutrisi

                    </div>


                    <div class="nutrition-arrow">

                        ›

                    </div>


                </div>


                <div class="nutrition-summary">

                    {{ $product['calories'] }}
                    kkal
                    • Protein
                    {{ $product['protein'] }} g
                    • Porsi ringan

                </div>


                <div class="nutrition-list">


                    <div class="nutrition-item">

                        <div class="nutrition-value">

                            {{ $product['calories'] }}

                        </div>

                        <div class="nutrition-label">

                            Kalori (kkal)

                        </div>

                    </div>


                    <div class="nutrition-item">

                        <div class="nutrition-value">

                            {{ $product['protein'] }} g

                        </div>

                        <div class="nutrition-label">

                            Protein

                        </div>

                    </div>


                    <div class="nutrition-item">

                        <div class="nutrition-value">

                            {{ $product['carbohydrates'] }} g

                        </div>

                        <div class="nutrition-label">

                            Karbohidrat

                        </div>

                    </div>


                    <div class="nutrition-item">

                        <div class="nutrition-value">

                            {{ $product['fat'] }} g

                        </div>

                        <div class="nutrition-label">

                            Lemak

                        </div>

                    </div>


                </div>

            </div>


            <form
                action="#"
                method="POST"
                id="buyForm"
            >

                @csrf


                <div class="buy-box">


                    <div class="quantity">


                        <button
                            type="button"
                            class="minus"
                            onclick="decreaseQuantity()"
                        >

                            −

                        </button>


                        <input
                            type="text"
                            id="quantity"
                            class="quantity-number"
                            value="1"
                            readonly
                        >


                        <button
                            type="button"
                            class="plus"
                            onclick="increaseQuantity()"
                        >

                            +

                        </button>


                    </div>


                    @if($product['stock'] > 0)

                        <button
                            type="submit"
                            class="buy-button"
                            id="buyButton"
                        >

                            🛍 Beli • Rp

                            <span id="totalPrice">

                                {{ number_format(
                                    $product['price'],
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </span>

                        </button>

                    @else

                        <button
                            type="button"
                            class="buy-button disabled"
                            disabled
                        >

                            Stok Habis

                        </button>

                    @endif


                </div>

            </form>


        </div>

    </div>

</div>



<script>


    const price =
        {{ $product['price'] }};

    const stock =
        {{ $product['stock'] }};

    function increaseQuantity()
    {

        const input =
            document.getElementById(
                'quantity'
            );

        let quantity =
            parseInt(input.value);

        if (quantity < stock) {

            quantity++;

            input.value =
                quantity;

            updateTotal();

        }

    }

    function decreaseQuantity()
    {

        const input =
            document.getElementById(
                'quantity'
            );


        let quantity =
            parseInt(input.value);

        if (quantity > 1) {

            quantity--;

            input.value =
                quantity;

            updateTotal();

        }

    }

    function updateTotal()
    {

        const quantity =
            parseInt(
                document.getElementById(
                    'quantity'
                ).value
            );

        const total =
            price * quantity;


        document.getElementById(
            'totalPrice'
        ).innerText =
            total.toLocaleString(
                'id-ID'
            );

    }

</script>


</body>

</html>