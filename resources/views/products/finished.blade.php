
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Selesai - TAREMPA</title>

    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            min-height: 100%;
            background: #fff7ec;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #fff7ec;
            color: #292522;
        }

        /* Header */
        .topbar {
            width: 100%;
            min-height: 88px;
            padding: 18px 4%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            border-bottom: 1px solid #eddfcf;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: #f4511e;
            color: white;
            font-size: 25px;
            font-weight: bold;
        }

        .brand-name {
            font-size: 24px;
            font-weight: 800;
        }

        .brand-subtitle {
            margin-top: 4px;
            color: #f4511e;
            font-size: 13px;
            font-weight: bold;
        }

        .header-status {
            color: #82766b;
            font-size: 15px;
            font-weight: bold;
            text-align: right;
        }

        /* Konten utama */
        main {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 48px 36px 40px;
            text-align: center;
        }

        /* Ikon sukses */
        .success-icon {
            width: 180px;
            height: 180px;
            margin: 0 auto 24px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #ddf5e9;
            color: #168b61;
        }

        .success-icon svg {
            width: 112px;
            height: 112px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 26px;
            padding: 11px 18px;
            border-radius: 30px;
            background: #ddf5e9;
            color: #168b61;
            font-size: 14px;
            font-weight: bold;
        }

        h1 {
            margin-bottom: 18px;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
        }

        .description {
            margin-bottom: 32px;
            color: #82766b;
            font-size: 18px;
            line-height: 1.7;
        }

        /* Petunjuk pengambilan */
        .pickup-card {
            display: flex;
            align-items: center;
            gap: 24px;
            width: 100%;
            min-height: 220px;
            padding: 28px;
            margin-bottom: 30px;
            border-radius: 26px;
            background: #ffdfcc;
            text-align: left;
        }

        .pickup-icon {
            flex-shrink: 0;
            width: 72px;
            height: 72px;
            display: grid;
            place-items: center;
            border-radius: 20px;
            background: #f4511e;
            color: white;
        }

        .pickup-icon svg {
            width: 38px;
            height: 38px;
        }

        .pickup-text {
            flex: 1;
            min-width: 0;
        }

        .pickup-text h2 {
            margin-bottom: 10px;
            font-size: 21px;
            line-height: 1.4;
        }

        .pickup-text p {
            color: #82766b;
            font-size: 16px;
            line-height: 1.7;
        }

        .pickup-arrow {
            flex-shrink: 0;
            color: #f4511e;
            font-size: 34px;
        }

        /* Kartu terima kasih */
        .thankyou-card {
            padding: 26px 20px;
            border-radius: 25px;
            background: white;
            box-shadow: 0 8px 24px #39291e0c;
        }

        .thankyou-card h2 {
            margin-bottom: 12px;
            color: #171717;
            font-size: clamp(28px, 4vw, 40px);
            font-weight: normal;
        }

        .thankyou-card p {
            color: #39312b;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Hitung mundur */
        .redirect-note {
            margin-top: 24px;
            color: #82766b;
            font-size: 15px;
            line-height: 1.7;
        }

        .countdown {
            color: #f4511e;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .topbar {
                min-height: 72px;
                padding: 14px 4%;
            }

            .logo {
                width: 40px;
                height: 40px;
                font-size: 21px;
            }

            .brand-name {
                font-size: 19px;
            }

            .brand-subtitle {
                font-size: 11px;
            }

            .header-status {
                max-width: 120px;
                font-size: 12px;
            }

            main {
                padding: 32px 20px;
            }

            .success-icon {
                width: 130px;
                height: 130px;
                margin-bottom: 20px;
            }

            .success-icon svg {
                width: 82px;
                height: 82px;
            }

            .badge {
                margin-bottom: 20px;
                padding: 9px 14px;
                font-size: 12px;
            }

            h1 {
                font-size: 29px;
            }

            .description {
                font-size: 15px;
            }

            .pickup-card {
                min-height: 150px;
                gap: 14px;
                padding: 20px 16px;
                border-radius: 20px;
            }

            .pickup-icon {
                width: 52px;
                height: 52px;
                border-radius: 14px;
            }

            .pickup-icon svg {
                width: 29px;
                height: 29px;
            }

            .pickup-text h2 {
                font-size: 16px;
            }

            .pickup-text p {
                font-size: 13px;
            }

            .pickup-arrow {
                font-size: 24px;
            }

            .thankyou-card {
                padding: 22px 14px;
            }

            .thankyou-card h2 {
                font-size: 28px;
            }

            .thankyou-card p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <div class="brand">
            <div class="logo">T</div>

            <div>
                <div class="brand-name">TAREMPA</div>
                <div class="brand-subtitle">GO · SMART KIOSK</div>
            </div>
        </div>

        <div class="header-status">
            Pembayaran selesai
        </div>
    </header>

    <main>
        <div class="success-icon">
            <svg viewBox="0 0 100 100" fill="none"
                 xmlns="http://www.w3.org/2000/svg"
                 aria-label="Pesanan berhasil">
                <circle cx="50" cy="50" r="38"
                        stroke="#292522" stroke-width="2.5"
                        stroke-dasharray="185 55"
                        stroke-linecap="round"/>
                <path d="M30 50 L43 63 L76 30"
                      stroke="#292522" stroke-width="3"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M84 11 L80 19"
                      stroke="#ffc13d" stroke-width="7"
                      stroke-linecap="round"/>
                <path d="M13 79 L17 86"
                      stroke="#168b61" stroke-width="6"
                      stroke-linecap="round"/>
                <path d="M8 21 L12 17"
                      stroke="#f4511e" stroke-width="5"
                      stroke-linecap="round"/>
            </svg>
        </div>

        <div class="badge">
            <span>✓</span>
            PESANAN SELESAI
        </div>

        <h1>Pesanan selesai!</h1>

        <p class="description">
            Terima kasih. Pesanan Anda sudah berada di laci bagian bawah.
        </p>

        <section class="pickup-card">
            <div class="pickup-icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="M12 3 3 8l9 5 9-5-9-5Z"/>
                    <path d="m3 8 9 5 9-5"/>
                    <path d="M3 8v9l9 5 9-5V8"/>
                    <path d="M12 13v9"/>
                    <path d="m7 5.2 9 5"/>
                </svg>
            </div>

            <div class="pickup-text">
                <h2>Ambil di laci bagian bawah</h2>
                <p>
                    Tunggu bunyi notifikasi dan lampu hijau
                    sebelum membuka laci.
                </p>
            </div>

            <div class="pickup-arrow" aria-hidden="true">↓</div>
        </section>

        <section class="thankyou-card">
            <h2>Terima Kasih!</h2>
            <p>Semoga hari Anda menyenangkan :)</p>
        </section>

        <p class="redirect-note">
            Kembali ke katalog dalam
            <span class="countdown" id="countdown">10</span>
            detik...
        </p>
    </main>

    <script>
        let seconds = 10;

        const countdown = document.getElementById('countdown');

        const redirectTimer = setInterval(function () {
            seconds--;
            countdown.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(redirectTimer);

                window.location.href =
                    @json(route('products.index'));
            }
        }, 1000);
    </script>

    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>
</body>
</html>