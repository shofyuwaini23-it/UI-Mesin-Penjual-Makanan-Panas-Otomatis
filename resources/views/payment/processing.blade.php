
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Memproses Pembayaran - TAREMPA</title>

    <style>
        :root {
            --kiosk-width: 746px;
            --kiosk-height: 1280px;
            --orange: #f4511e;
            --cream: #fff7ec;
            --brown: #39291e;
            --muted: #887c71;
            --green: #168b61;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            width: 100%;
            height: 100%;
            min-height: 0;
        }

        body {
            overflow: hidden;
            background: #292929;
            font-family: Inter, Arial, sans-serif;
            color: var(--brown);
        }

        /* Pembungkus viewport kiosk */
        .kiosk-stage {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #292929;
        }

        /* Kanvas kiosk asli 746 x 1280 */
        .kiosk-screen {
            position: absolute;
            top: 50%;
            left: 50%;
            width: var(--kiosk-width);
            height: var(--kiosk-height);
            min-width: var(--kiosk-width);
            min-height: var(--kiosk-height);
            overflow-x: hidden;
            overflow-y: auto;
            transform-origin: center center;
            background: var(--cream);
            color: var(--brown);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.35);
        }

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
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 36px 32px 30px;
            text-align: center;
        }

        .warning {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 30px;
            background: #ffe3d2;
            color: #d94314;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.4px;
        }

        h1 {
            margin: 23px 0 14px;
            font-size: 35px;
            line-height: 1.2;
            font-weight: 800;
        }

        .description {
            max-width: 620px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 18px;
            line-height: 1.6;
        }

        .processing-card {
            width: 100%;
            min-height: 355px;
            margin: 38px auto 34px;
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
            border: 22px solid #ffdfcc;
            border-top-color: var(--orange);
            border-right-color: #f9c9b1;
            border-bottom-color: #8c4d27;
            border-left-color: #f5b995;
            border-radius: 50%;
            animation: spin 1.5s linear infinite;
        }

        .processing-message {
            margin-top: 30px;
            color: var(--orange);
            font-size: 18px;
            line-height: 1.5;
            font-weight: 700;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .steps-card {
            padding: 26px;
            border: 1px solid #f0e3d6;
            border-radius: 28px;
            background: white;
            box-shadow: 0 8px 24px rgba(77, 48, 26, 0.06);
            text-align: left;
        }

        .steps-heading {
            margin: 0 0 24px;
            font-size: 20px;
            font-weight: 800;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 17px;
            margin-bottom: 25px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-icon {
            flex: 0 0 48px;
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #f4eadf;
            color: #8c8175;
            font-size: 23px;
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
        }

        .step-detail {
            margin-top: 5px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .demo-notice {
            margin: 22px 0 0;
            padding: 15px;
            border: 1px solid #f2d3a5;
            border-radius: 14px;
            background: #fff2d8;
            color: #79552b;
            font-size: 13px;
            line-height: 1.6;
            text-align: left;
        }

        .finish-button {
            display: none;
            width: 100%;
            margin-top: 24px;
            padding: 18px 22px;
            border: none;
            border-radius: 15px;
            background: var(--orange);
            color: white;
            font-family: inherit;
            font-size: 18px;
            font-weight: 800;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .finish-button:active {
            transform: scale(0.99);
        }

        .footer {
            margin-top: 30px;
            padding: 0 0 20px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .footer-mark {
            color: var(--green);
            font-weight: 900;
        }

        @media (prefers-reduced-motion: reduce) {
            .loader {
                animation-duration: 4s;
            }
        }
    </style>
</head>

<body>
            <header class="topbar">
                <div class="brand">
                    <div class="brand-icon">T</div>

                    <div>
                        <div class="brand-name">TAREMPA</div>
                        <div class="brand-subtitle">
                            GO • SMART KIOSK
                        </div>
                    </div>
                </div>

                <div class="secure-label">
                    🔒 Transaksi aman
                </div>
            </header>

            <main class="container">
                <div class="warning">
                    ⚠ JANGAN TUTUP LAYAR
                </div>

                <h1 id="pageTitle">
                    Memproses pembayaran
                </h1>

                <p class="description" id="pageDescription">
                    Harap tunggu sebentar. Kami sedang memverifikasi
                    pembayaran sebesar
                    <strong>
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </strong>.
                </p>

                <section class="processing-card">
                    <div
                        class="loader"
                        id="loader"
                        aria-label="Memproses pembayaran"
                    ></div>

                    <div
                        class="processing-message"
                        id="processingMessage"
                        role="status"
                        aria-live="polite"
                    >
                        ◉ Menghubungi penyedia pembayaran...
                    </div>
                </section>

                <section class="steps-card">
                    <h2 class="steps-heading">
                        Tahapan transaksi
                    </h2>

                    <div class="step done" id="step1">
                        <div class="step-icon">✓</div>

                        <div>
                            <div class="step-title">
                                Detail transaksi diterima
                            </div>

                            <div class="step-detail">
                                Pesanan {{ $orderNumber }}<br>
                                {{ $quantity }} × {{ $product['name'] }}<br>
                                Total Rp
                                {{ number_format($total, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <div class="step active" id="step2">
                        <div class="step-icon">◌</div>

                        <div>
                            <div
                                class="step-title"
                                id="step2Title"
                            >
                                Verifikasi pembayaran
                            </div>

                            <div
                                class="step-detail"
                                id="step2Detail"
                            >
                                Memproses simulasi pembayaran
                                {{ strtoupper($method) }}.
                            </div>
                        </div>
                    </div>

                    <div class="step" id="step3">
                        <div class="step-icon">○</div>

                        <div>
                            <div
                                class="step-title"
                                id="step3Title"
                            >
                                Pesanan siap diproses
                            </div>

                            <div
                                class="step-detail"
                                id="step3Detail"
                            >
                                Status pesanan akan diperbarui
                                setelah simulasi selesai.
                            </div>
                        </div>
                    </div>
                </section>

                <div class="demo-notice">
                    <strong>Mode simulasi.</strong>
                    Status berhasil pada halaman ini dibuat otomatis
                    untuk demonstrasi antarmuka PBL. Belum ada verifikasi
                    transaksi dari bank atau penyedia pembayaran sungguhan.
                    Tahapan mesin juga belum mengaktifkan perangkat fisik.
                </div>

                <a
                    href="{{ route('products.index') }}"
                    class="finish-button"
                    id="finishButton"
                >
                    Kembali ke katalog
                </a>

                <footer class="footer">
                    <span class="footer-mark">●</span>
                    TAREMPA GO • SMART KIOSK<br>
                    Antarmuka simulasi pembayaran
                </footer>
            </main>
            
    {{-- Jalankan viewport kiosk yang sudah ada --}}
    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>

    <script>
        // Simulasi UI: tidak menghubungi bank atau penyedia QRIS.
        window.setTimeout(function () {
            const loader =
                document.getElementById('loader');

            const message =
                document.getElementById('processingMessage');

            const title =
                document.getElementById('pageTitle');

            const description =
                document.getElementById('pageDescription');

            const step2 =
                document.getElementById('step2');

            const step3 =
                document.getElementById('step3');

            loader.style.display = 'none';

            title.textContent =
                'Pembayaran simulasi berhasil';

            description.textContent =
                'Simulasi pembayaran sebesar Rp {{ number_format($total, 0, ',', '.') }} telah selesai.';

            message.textContent =
                '✓ Simulasi pembayaran berhasil diproses.';

            message.style.color = '#168b61';

            step2.classList.remove('active');
            step2.classList.add('done');

            step2.querySelector('.step-icon').textContent = '✓';

            document.getElementById('step2Title').textContent =
                'Verifikasi simulasi selesai';

            document.getElementById('step2Detail').textContent =
                'Status berhasil berasal dari simulasi antarmuka.';

            step3.classList.add('active');

            step3.querySelector('.step-icon').textContent = '◌';

            document.getElementById('step3Detail').textContent =
                'Tahapan berikutnya ditampilkan sebagai ilustrasi UI.';

            document.getElementById('finishButton').style.display =
                'block';
        }, 3000);
    </script>
</body>
</html>
