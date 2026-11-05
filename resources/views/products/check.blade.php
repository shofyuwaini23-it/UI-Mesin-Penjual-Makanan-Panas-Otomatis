<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - TAREMPA</title>
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

        .checkout-overlay {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
            background: rgba(35, 25, 18, 0.35);
        }

        .checkout-modal {
            position: relative;
            width: 100%;
            max-width: 560px;
            max-height: 94vh;
            overflow-y: auto;
            padding: 24px;
            border-radius: 17px;
            background: #fff7ec;
            color: #432718;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
        }

        .checkout-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .checkout-header h2 {
            margin: 0;
            font-size: 23px;
            font-weight: 700;
        }

        .checkout-close {
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 10px;
            background: #ffe5c6;
            color: #432718;
            font-size: 25px;
            cursor: pointer;
        }

        .checkout-close:hover {
            background: #ffd8ae;
        }

        .payment-step {
            display: none;
        }

        .payment-step.active {
            display: block;
        }

        /* TAHAP 1: KONFIRMASI PESANAN */

        .checkout-product {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .checkout-product img {
            width: 82px;
            height: 82px;
            object-fit: cover;
            border-radius: 11px;
        }

        .checkout-product-info {
            flex: 1;
            min-width: 0;
        }

        .checkout-product-info h3 {
            margin: 0 0 5px;
            font-size: 20px;
        }

        .checkout-product-info p {
            margin: 3px 0;
            font-size: 17px;
            color: #755e4c;
        }

        .checkout-quantity {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0 15px;
            border-bottom: 1px solid #efddca;
            font-size: 17px;
        }

        .checkout-quantity strong {
            font-size: 17px;
        }

        .checkout-total-card {
            margin-top: 12px;
            padding: 15px;
            border-radius: 12px;
            background: #ffe5c6;
        }

        .checkout-total-card small {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .checkout-total-card h2 {
            margin: 5px 0;
            font-size: 26px;
        }

        .checkout-total-card p {
            margin: 0;
            font-size: 12px;
            color: #806650;
        }

        .checkout-question {
            margin: 16px 0 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .checkout-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .checkout-button {
            min-height: 48px;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .checkout-edit {
            background: #ffe5c6;
            color: #432718;
        }

        .checkout-next {
            background: #432718;
            color: #fff;
        }

        .checkout-button:hover {
            opacity: 0.88;
        }

        /* TAHAP 2: PILIH METODE PEMBAYARAN */

        .payment-heading {
            margin: 0 0 18px;
            font-size: 25px;
            font-weight: 700;
        }

        .payment-description {
            margin: 0 0 18px;
            color: #806e5e;
            font-size: 15px;
        }

        .payment-total-card {
            margin-bottom: 14px;
            padding: 16px;
            border-radius: 12px;
            background: #f4511e;
            color: #fff;
        }

        .payment-total-card small {
            font-size: 15px;
            font-weight: 700;
        }

        .payment-total-card h2 {
            margin: 5px 0;
            font-size: 27px;
        }

        .payment-total-card p {
            margin: 0;
            font-size: 14px;
        }

        .payment-available {
            margin: 0 0 12px;
            color: #89796d;
            font-size: 11px;
            font-weight: 700;
        }

        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* DASAR CARD PEMBAYARAN */

        .payment-option {
            position: relative;
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 76px;
            padding: 13px;
            border: 1px solid #efddca;
            border-radius: 16px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .payment-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        /* QRIS SELALU HITAM */

        .payment-option.qris-option {
            background: #211f1d;
            border-color: #211f1d;
            color: #fff;
        }

        .qris-option .
         {
            color: #fff;
        }

        .qris-option .payment-info small {
            color: #e0d9d3;
        }

        .qris-option .payment-icon {
            background: #f4511e;
            color: #fff;
        }

        .qris-option .payment-arrow {
            color: #f4511e;
        }

        /* VIRTUAL ACCOUNT SELALU PUTIH */

        .payment-option.va-option {
            background: #fff;
            border-color: #efddca;
            color: #432718;
        }

        .va-option .payment-info strong {
            color: #432718;
        }

        .va-option .payment-info small {
            color: #89796d;
        }

        .va-option .payment-icon {
            background: #ffe1d2;
            color: #f4511e;
        }

        .va-option .payment-arrow {
            color: #f4511e;
        }

        /* IKON */

        .payment-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 11px;
            font-size: 22px;
        }

        .payment-info {
            flex: 1;
            min-width: 0;
        }

        .payment-info strong {
            display: block;
            margin-bottom: 5px;
            font-size: 15px;
            font-weight: 700;
        }

        .payment-info small {
            display: block;
            font-size: 10px;
            line-height: 1.4;
        }

        .payment-arrow {
            flex-shrink: 0;
            font-size: 22px;
        }

        .payment-back {
            margin-top: 16px;
            padding: 0;
            border: none;
            background: transparent;
            color: #806e5e;
            font-size: 12px;
            text-align: left;
            cursor: pointer;
        }

        .payment-back:hover {
            color: #f4511e;
        }

        /* MODAL QRIS DAN VA */

        .payment-overlay {
            position: fixed;
            inset: 0;
            z-index: 1100;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 14px;
            background: rgba(35, 25, 18, 0.45);
        }

        .payment-overlay.show {
            display: flex;
        }

        .payment-modal {
            position: relative;
            width: 100%;
            max-width: 520px;
            max-height: 94vh;
            overflow-y: auto;
            padding: 24px;
            border-radius: 16px;
            background: #fff7ec;
        }

        @media (max-width: 600px) {
            .checkout-modal,
            .payment-modal {
                padding: 18px;
            }

            .checkout-header h2 {
                font-size: 21px;
            }

            .checkout-total-card h2,
            .payment-total-card h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    {{-- LATAR BELAKANG KATALOG --}}
    <div class="catalog-background modal-open">
        @include('partials.catalog')
    </div>

    {{-- MODAL KONFIRMASI PESANAN --}}
    <div class="checkout-overlay">
        <div class="checkout-modal">

            <div class="checkout-header">
                <h2 id="checkoutTitle">Konfirmasi Pesanan</h2>

                <button type="button"
                        class="checkout-close"
                        onclick="closeCheckout()">
                    ×
                </button>
            </div>

            {{-- TAHAP 1 --}}
            <div id="orderStep" class="payment-step active">

                <div class="checkout-product">

                    <img src="{{ $product['image'] }}"
                         alt="{{ $product['name'] }}">

                    <div class="checkout-product-info">
                        <h3>{{ $product['name'] }}</h3>

                        <p>
                            Rp. {{ number_format($product['price'], 0, ',', '.') }}
                        </p>
                    </div>

                </div>

                <div class="checkout-quantity">
                    <span>Jumlah</span>
                    <strong>{{ $quantity }}</strong>
                </div>

                <div class="checkout-total-card">
                    <small>TOTAL BAYAR</small>

                    <h2>
                        Rp. {{ number_format($total, 0, ',', '.') }}
                    </h2>

                    <p>
                        {{ $quantity }} × {{ $product['name'] }}
                    </p>
                </div>

                <p class="checkout-question">
                    Apakah pesanan Anda sudah benar?
                </p>

                <div class="checkout-actions">

                    <button type="button"
                            class="checkout-button checkout-edit"
                            onclick="closeCheckout()">
                        UBAH ✎
                    </button>

                    <button type="button"
                            class="checkout-button checkout-next"
                            onclick="showPaymentStep()">
                        LANJUT →
                    </button>

                </div>

            </div>

            {{-- TAHAP 2: PILIH METODE PEMBAYARAN --}}
            <div id="paymentStep" class="payment-step">
                <p class="payment-description">
                    Semua transaksi aman dan diproses secara nontunai.
                </p>

                <div class="payment-total-card">
                    <small>TOTAL BAYAR</small>

                    <h2>
                        Rp. {{ number_format($total, 0, ',', '.') }}
                    </h2>

                    <p>
                        {{ $quantity }} × {{ $product['name'] }}
                    </p>
                </div>

                <p class="payment-available">
                    METODE TERSEDIA
                </p>

                <div class="payment-options">

                    {{-- CARD QRIS --}}
                    <label class="payment-option qris-option">

                        <input type="radio"
                               name="payment"
                               value="qris"
                               onchange="confirmPayment('qris')">

                        <div class="payment-icon">
                            ▦
                        </div>

                        <div class="payment-info">
                            <strong>QRIS</strong>

                            <small>
                                Pindai dengan GoPay, OVO, DANA, ShopeePay,
                                atau aplikasi bank.
                            </small>
                        </div>

                        <span class="payment-arrow">›</span>

                    </label>

                    {{-- CARD VIRTUAL ACCOUNT --}}
                    <label class="payment-option va-option">

                        <input type="radio"
                               name="payment"
                               value="va"
                               onchange="confirmPayment('va')">

                        <div class="payment-icon">
                            ♧
                        </div>

                        <div class="payment-info">
                            <strong>Virtual Account</strong>

                            <small>
                                Transfer melalui m-banking atau e-wallet
                                ke nomor VA.
                            </small>
                        </div>
                        <span class="payment-arrow">›</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL QRIS --}}
    <div class="payment-overlay" id="qrisModal">
        <div class="payment-modal">
            @include('payment.qris-modal')
        </div>
    </div>

    {{-- MODAL VIRTUAL ACCOUNT --}}
    <div class="payment-overlay" id="vaModal">
        <div class="payment-modal">
            @include('payment.va-modal')
        </div>
    </div>

    @php
        $checkoutBackUrl = route('products.show', $product['id']);
    @endphp

    <script>
        const checkoutBackUrl = @json($checkoutBackUrl);

        // Berpindah ke tahap pilih metode pembayaran
        function showPaymentStep() {
            document.getElementById('orderStep').classList.remove('active');
            document.getElementById('paymentStep').classList.add('active');

            document.getElementById('checkoutTitle').textContent =
                'Pilih metode pembayaran';
        }

        // Kembali ke konfirmasi pesanan
        function backToOrderStep() {
            document.getElementById('paymentStep').classList.remove('active');
            document.getElementById('orderStep').classList.add('active');

            document.getElementById('checkoutTitle').textContent =
                'Konfirmasi Pesanan';
        }

        // Membuka modal berdasarkan metode pembayaran
        function confirmPayment(method) {
            const qrisModal = document.getElementById('qrisModal');
            const vaModal = document.getElementById('vaModal');

            if (method === 'qris') {
                vaModal.classList.remove('show');
                qrisModal.classList.add('show');
            }

            if (method === 'va') {
                qrisModal.classList.remove('show');
                vaModal.classList.add('show');
            }
        }

        // Kembali ke detail menu
        function closeCheckout() {
            window.location.href = checkoutBackUrl;
        }

        // Menutup modal QRIS atau VA
        function closeModal() {
            document.getElementById('qrisModal').classList.remove('show');
            document.getElementById('vaModal').classList.remove('show');
        }
    </script>
    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>
</body>
</html>