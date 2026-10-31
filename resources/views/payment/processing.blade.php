<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memproses Pembayaran - TAREMPA</title>
    
    <!-- FontAwesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">

    <style>
        :root {
            --orange: #f4511e;
            --cream: #fff7ec;
            --brown: #39291e;
            --muted: #887c71;
            --green: #168b61;
        }

        /* HEADER SELALU ORANGE */
        .topbar {
            min-height: 116px;
            padding: 22px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            background: var(--orange);
            color: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: white;
            color: var(--orange);
            font-size: 30px;
            font-weight: 900;
        }

        .brand-name {
            font-size: 27px;
            font-weight: 900;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            margin-top: 4px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .secure-label {
            font-size: 15px;
            font-weight: 700;
            white-space: nowrap;
            color: white;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 36px 32px 30px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .warning {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: 30px;
            background: #ffe3d2;
            color: #d94314;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.4px;
        }

        .success-badge-top {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 22px;
            border-radius: 30px;
            background: #d1fae5;
            color: #065f46;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        h1 {
            margin: 23px 0 14px;
            font-size: 38px;
            line-height: 1.2;
            font-weight: 800;
        }

        .description {
            max-width: 620px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 19px;
            line-height: 1.6;
        }

        .processing-card {
            width: 100%;
            min-height: 380px;
            margin: 30px auto;
            padding: 35px 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #f2e6da;
            border-radius: 30px;
            background: white;
            box-shadow: 0 12px 32px rgba(77, 48, 26, 0.09);
        }

        .loader {
            width: 160px;
            height: 160px;
            border: 20px solid #ffdfcc;
            border-top-color: var(--orange);
            border-radius: 50%;
            animation: spin 1.2s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .success-circle-wrapper {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: #d1fae5;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .success-circle-inner {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 6px solid #065f46;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #065f46;
            font-size: 55px;
        }

        .processing-message {
            margin-top: 25px;
            color: var(--orange);
            font-size: 18px;
            font-weight: 700;
        }

        .steps-card {
            padding: 26px;
            border: 1px solid #f0e3d6;
            border-radius: 28px;
            background: white;
            box-shadow: 0 8px 24px rgba(77, 48, 26, 0.06);
            text-align: left;
        }

        .summary-top-box {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px dashed #e5e7eb;
        }

        .summary-label {
            font-size: 13px;
            font-weight: 700;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .summary-amount {
            font-size: 36px;
            font-weight: 900;
            color: var(--orange);
            margin-top: 4px;
        }

        .summary-order {
            font-size: 32px;
            font-weight: 900;
            color: var(--brown);
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 17px;
            margin-bottom: 22px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        /* IKON KOTAK CHECKBOX */
        .step-icon {
            flex: 0 0 42px;
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #f4eadf;
            color: #8c8175;
            font-size: 16px;
            font-weight: 800;
        }

        .step.done .step-icon {
            background: var(--green);
            color: white;
        }

        .step.active .step-icon {
            background: var(--orange);
            color: white;
        }

        .step-title {
            padding-top: 2px;
            font-size: 17px;
            line-height: 1.4;
            font-weight: 800;
            color: #1f2937;
        }

        .step-detail {
            margin-top: 4px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        .footer {
            margin-top: 25px;
            padding: 0 0 10px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .footer-mark {
            color: var(--green);
            font-weight: 900;
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <!-- HEADER ORANGE PERMANEN -->
    <header class="topbar" id="topbar">
        <div class="brand">
            <div class="brand-icon">T</div>
            <div>
                <div class="brand-name">TAREMPA</div>
                <div class="brand-subtitle">GO • SMART KIOSK</div>
            </div>
        </div>

        <div class="secure-label" id="secureLabel">
            🔒 Transaksi aman
        </div>
    </header>

    <main class="container">
        <div>
            <div id="badgeContainer" class="warning">
                ⚠ JANGAN TUTUP LAYAR
            </div>

            <h1 id="pageTitle">
                Memproses pembayaran
            </h1>

            <p class="description" id="pageDescription">
                Harap tunggu sebentar. Kami sedang memverifikasi pembayaran sebesar 
                <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>.
            </p>
        </div>

        <section class="processing-card" id="cardContainer">
            <div class="loader" id="loaderAnimation"></div>
            <div class="processing-message" id="processingMessage">
                <i class="fas fa-wifi"></i> Menghubungi penyedia pembayaran...
            </div>
        </section>

        <!-- KARTU TAHAPAN -->
        <section class="steps-card">
            <div id="successSummaryHeader" class="summary-top-box hidden">
                <div>
                    <div class="summary-label">TOTAL DIBAYAR</div>
                    <div class="summary-amount">Rp {{ number_format($total, 0, ',', '.') }}</div>
                </div>
                <div style="text-align: right;">
                    <div class="summary-label">NOMOR PESANAN</div>
                    <div class="summary-order">{{ $orderNumber }}</div>
                </div>
            </div>

            <div class="step done" id="step1">
                <div class="step-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <div class="step-title">Detail transaksi diterima</div>
                    <div class="step-detail" id="step1Detail">Pesanan {{ $orderNumber }} • Rp {{ number_format($total, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="step active" id="step2">
                <div class="step-icon">
                    <i class="fas fa-sync-alt fa-spin" id="step2SpinnerIcon"></i>
                </div>
                <div>
                    <div class="step-title" id="step2Title">Verifikasi pembayaran</div>
                    <div class="step-detail" id="step2Detail">Biasanya selesai dalam beberapa detik.</div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <span class="footer-mark">●</span> TAREMPA GO • SMART KIOSK<br>
            Antarmuka simulasi pembayaran terenkripsi
        </footer>
    </main>
    
    <!-- Skrip Kiosk Viewport -->
    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>

    <!-- Transisi 10 Detik Ke Halaman Sukses -->
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            window.setTimeout(function () {
                // Label header berubah teksnya saja, warna tetap oranye putih
                const secureLabel = document.getElementById('secureLabel');
                if(secureLabel) secureLabel.textContent = 'Pembayaran selesai';

                const badgeContainer = document.getElementById('badgeContainer');
                if(badgeContainer) {
                    badgeContainer.className = 'success-badge-top';
                    badgeContainer.innerHTML = '<i class="fas fa-check-circle"></i> TRANSAKSI BERHASIL';
                }

                document.getElementById('pageTitle').textContent = 'Pembayaran berhasil!';
                document.getElementById('pageDescription').innerHTML = 'Terima kasih. Pesanan Anda sudah diteruskan ke mesin untuk disiapkan.';

                const cardContainer = document.getElementById('cardContainer');
                if(cardContainer) {
                    cardContainer.innerHTML = `
                        <div class="success-circle-wrapper">
                            <div class="success-circle-inner">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    `;
                }

                document.getElementById('successSummaryHeader').classList.remove('hidden');

                const step2 = document.getElementById('step2');
                if(step2) {
                    step2.classList.remove('active');
                    step2.classList.add('done');
                    step2.querySelector('.step-icon').innerHTML = '<i class="fas fa-check"></i>';
                }
                document.getElementById('step2Title').textContent = 'Pembayaran diterima';
                document.getElementById('step2Detail').textContent = 'QRIS • ' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + ' WIB';

                // Lanjut otomatis ke halaman status pesanan setelah 5 detik di halaman sukses
                window.setTimeout(function () {
                    window.location.href = @json(route('orders.status', ['id' => $product['id'], 'quantity' => $quantity]));
                }, 5000);

            }, 10000); // 10000 milidetik = 10 detik
        });
    </script>
</body>
</html>