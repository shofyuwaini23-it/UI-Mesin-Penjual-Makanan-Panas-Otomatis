
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Selesai - HotMeal</title>

    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            min-height: 100%;
            background: #FFF3E8;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #FFF3E8;
            color: #211F1C;
        }

        /* KONTEN UTAMA */
        main {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 48px 36px 40px;
            text-align: center;
        }

        /* IKON SUKSES */
        .success-icon {
            width: 180px;
            height: 180px;
            margin: 0 auto 24px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #DDF5E9;
            color: #168B61;
        }

        .success-icon svg {
            width: 112px;
            height: 112px;
            overflow: visible;
        }

        /* ANIMASI ILUSTRASI */
        .success-circle {
            stroke-dasharray: 185;
            stroke-dashoffset: 185;
            animation: drawCircle 1.2s ease forwards;
        }

        .success-check {
            stroke-dasharray: 65;
            stroke-dashoffset: 65;
            animation: drawCheck 0.7s ease forwards 0.8s;
        }

        .success-accent {
            opacity: 0;
            transform-box: fill-box;
            transform-origin: center;
            animation: accentAppear 0.5s ease forwards;
        }

        .accent-orange {
            animation-delay: 1.1s;
        }

        .accent-yellow {
            animation-delay: 1.3s;
        }

        .accent-green {
            animation-delay: 1.5s;
        }

        @keyframes drawCircle {
            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes drawCheck {
            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes accentAppear {
            0% {
                opacity: 0;
                scale: 0;
                rotate: -30deg;
            }

            100% {
                opacity: 1;
                scale: 1;
                rotate: 0deg;
            }
        }

        /* BADGE STATUS */
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 26px;
            padding: 11px 18px;
            border-radius: 30px;
            background: #DDF5E9;
            color: #168B61;
            font-size: 14px;
            font-weight: bold;
        }

        /* JUDUL DAN DESKRIPSI */
        main h1 {
            margin-bottom: 18px;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
        }

        .description {
            margin-bottom: 32px;
            color: #74665D;
            font-size: 18px;
            line-height: 1.7;
        }

        /* PETUNJUK PENGAMBILAN */
        .pickup-card {
            display: flex;
            align-items: center;
            gap: 24px;
            width: 100%;
            min-height: 220px;
            padding: 28px;
            margin-bottom: 30px;
            border-radius: 26px;
            background: #FFE3D2;
            text-align: left;
        }

        .pickup-icon {
            flex-shrink: 0;
            width: 72px;
            height: 72px;
            display: grid;
            place-items: center;
            border-radius: 20px;
            background: #F15A24;
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
            color: #74665D;
            font-size: 16px;
            line-height: 1.7;
        }

        .pickup-arrow {
            flex-shrink: 0;
            color: #F15A24;
            font-size: 34px;
        }

        /* KARTU TERIMA KASIH */
        .thankyou-card {
            padding: 26px 20px;
            border-radius: 25px;
            background: white;
            box-shadow: 0 8px 24px #39291E0C;
        }

        .thankyou-card h2 {
            margin-bottom: 12px;
            color: #211F1C;
            font-size: clamp(28px, 4vw, 40px);
            font-weight: normal;
        }

        .thankyou-card p {
            color: #74665D;
            font-size: 16px;
            line-height: 1.6;
        }

        /* HITUNG MUNDUR */
        .redirect-note {
            margin-top: 24px;
            color: #74665D;
            font-size: 15px;
            line-height: 1.7;
        }

        .countdown {
            color: #F15A24;
            font-weight: bold;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
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

            main h1 {
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
        /* HEADER ORANGE HOTMEAL */
.kiosk-header {
    background: #F15A24 !important;
    color: #FFFFFF !important;
    border-bottom: 1px solid #D94816;
}

.kiosk-header .brand,
.kiosk-header .brand b,
.kiosk-header .brand small,
.kiosk-header .header-contact,
.kiosk-header .header-contact a,
.kiosk-header .header-info,
.kiosk-header .wifi,
.kiosk-header .date {
    color: #FFFFFF !important;
}

/* Ikon Call Center putih */
.kiosk-header .header-contact .header-icon {
    filter: brightness(0) invert(1) !important;
}

/* Ikon Wi-Fi putih */
.kiosk-header .wifi .header-icon {
    filter: brightness(0) invert(1) !important;
}
    </style>
</head>

<body>

    {{-- HEADER HOTMEAL --}}
    <header class="kiosk-header">
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

                <a href="tel:0778123456"
                   style="color:inherit;text-decoration:none">
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

    <main>

        {{-- ILUSTRASI PESANAN SELESAI --}}
        <div class="success-icon">
            <svg viewBox="0 0 100 100"
                 fill="none"
                 xmlns="http://www.w3.org/2000/svg"
                 aria-label="Pesanan berhasil">

                <circle class="success-circle"
                        cx="50"
                        cy="50"
                        r="38"
                        stroke="#292522"
                        stroke-width="2.5"
                        stroke-dasharray="185 55"
                        stroke-linecap="round"/>

                <path class="success-check"
                      d="M30 50 L43 63 L76 30"
                      stroke="#292522"
                      stroke-width="3"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>

                <path class="success-accent accent-yellow"
                      d="M84 11 L80 19"
                      stroke="#FFC13D"
                      stroke-width="7"
                      stroke-linecap="round"/>

                <path class="success-accent accent-green"
                      d="M13 79 L17 86"
                      stroke="#168B61"
                      stroke-width="6"
                      stroke-linecap="round"/>

                <path class="success-accent accent-orange"
                      d="M8 21 L12 17"
                      stroke="#F15A24"
                      stroke-width="5"
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

        {{-- PETUNJUK PENGAMBILAN --}}
        <section class="pickup-card">

            <div class="pickup-icon">
                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.5"
                     stroke-linecap="round"
                     stroke-linejoin="round"
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

        {{-- KARTU TERIMA KASIH --}}
        <section class="thankyou-card">
            <h2>Terima Kasih!</h2>
            <p>Semoga hari Anda menyenangkan :)</p>
        </section>

        {{-- HITUNG MUNDUR --}}
        <p class="redirect-note">
            Kembali ke katalog dalam
            <span class="countdown" id="countdown">10</span>
            detik...
        </p>

    </main>

    {{-- JAM DAN TANGGAL --}}
    <script>
        function updateClock() {
            const dateElement = document.getElementById('date');
            const timeElement = document.getElementById('time');

            if (!dateElement || !timeElement) return;

            const now = new Date();

            dateElement.textContent = now.toLocaleDateString('id-ID', {
                timeZone: 'Asia/Jakarta',
                weekday: 'short',
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });

            timeElement.textContent = now.toLocaleTimeString('id-ID', {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit'
            }) + ' WIB';
        }

        updateClock();
        setInterval(updateClock, 60000);
    </script>

    {{-- HITUNG MUNDUR KEMBALI KE KATALOG --}}
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
