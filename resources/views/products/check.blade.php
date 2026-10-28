
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - TAREMPA</title>
    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #38271d;
        }

        .checkout {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px #40271912;
        }

        .back {
            color: #795b48;
            text-decoration: none;
        }

        h1 { margin-top: 25px; }

        .product {
            display: flex;
            align-items: center;
            gap: 18px;
            margin: 24px 0;
            padding: 15px;
            border: 1px solid #efddca;
            border-radius: 14px;
        }

        .product img {
            width: 110px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
        }

        .product h3 { margin-top: 0; }

        .price {
            color: #f4511e;
            font-weight: bold;
        }

        .payment {
            display: block;
            margin-top: 12px;
            padding: 16px;
            border: 1px solid #efddca;
            border-radius: 12px;
            cursor: pointer;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin: 25px 0;
            font-size: 18px;
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: #f4511e;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        #message {
            display: none;
            margin-top: 20px;
            padding: 16px;
            border-radius: 12px;
            background: #fff0df;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <main class="checkout">
        <a class="back"
           href="{{ route('products.show', ['id' => $product['id']]) }}">
            ← Kembali ke Detail
        </a>

        <h1>Konfirmasi Pesanan</h1>
        <p>Periksa pesanan dan pilih metode pembayaran.</p>

        <div class="product">
            <img src="{{ $product['image'] }}"
                 alt="{{ $product['name'] }}">

            <div>
                <h3>{{ $product['name'] }}</h3>
                <p>Jumlah: {{ $quantity }}</p>
                <p class="price">
                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                </p>
            </div>
        </div>

        <h3>Metode Pembayaran</h3>

        <label class="payment">
            <input type="radio" name="payment" value="QRIS" checked>
            QRIS
        </label>

        <label class="payment">
            <input type="radio" name="payment" value="VA">
            Virtual Account (VA)
        </label>

        <div class="total">
            <span>Total</span>
            <span>
                Rp{{ number_format($product['price'] * $quantity, 0, ',', '.') }}
            </span>
        </div>

        <button type="button" onclick="confirmPayment()">
            Konfirmasi Pembayaran
        </button>

        <div id="message"></div>
    </main>

    <script>
    function confirmPayment() {
        const selectedPayment = document.querySelector(
            'input[name="payment"]:checked'
        );
        
        if (!selectedPayment) {
            alert('Pilih metode pembayaran terlebih dahulu.');
            return;
        }
        
        const payment = selectedPayment.value;
        
        if (payment === 'QRIS') {
            const params = new URLSearchParams({
                product_id: @json($product['id']),
                quantity: @json($quantity)
            });
            
            window.location.href =
            "{{ route('payment.qris') }}" + '?' + params.toString();
        } else {
            const message = document.getElementById('message');
            
            message.style.display = 'block';
            message.innerHTML =
            '<strong>Simulasi Virtual Account</strong><br>' +
            'Pembayaran VA belum terhubung ke sistem pembayaran asli.';
        }
    }

    </script>
    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>
</body>
</html>