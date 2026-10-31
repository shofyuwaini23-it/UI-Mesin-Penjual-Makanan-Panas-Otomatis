<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standby - HotMeal</title>

    <!-- FontAwesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --orange: #F24E1E;
            --white: #ffffff;
            --dark: #1E2022;
            --kiosk-width: 746px;
            --kiosk-height: 1280px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #1e1e1e;
            font-family: Arial, sans-serif;
        }

        .kiosk-stage {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #1e1e1e;
        }

        .kiosk-screen {
            position: absolute;
            top: 50%;
            left: 50%;
            width: var(--kiosk-width);
            height: var(--kiosk-height);
            min-width: var(--kiosk-width);
            min-height: var(--kiosk-height);
            transform-origin: center center;
            
            background: var(--orange) !important;
            color: var(--white);
            
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px 44px;
            overflow: hidden;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
        }

        /* HEADER */
        .header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Logo Diubah Menjadi Bulat Sempurna Tanpa Kotak/Krem */
        .logo-container {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;
            background: transparent;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .brand-name {
            color: var(--white);
            font-size: 22px;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: 0.02em;
        }

        .brand-subtitle {
            margin-top: 4px;
            color: #fed7aa;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.05em;
        }

        .machine-status {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(194, 55, 13, 0.6);
            padding: 10px 20px;
            border-radius: 9999px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffedd5;
            font-size: 16px;
            font-weight: 600;
        }

        .status-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #34d399;
        }

        /* TEKS INTRO */
        .intro {
            width: 100%;
            flex-shrink: 0;
            margin-top: 20px;
            margin-bottom: 12px;
        }

        .intro-badge {
            display: inline-block;
            padding: 8px 20px;
            margin-bottom: 14px;
            border-radius: 9999px;
            background: rgba(194, 55, 13, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffedd5;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .intro h1 {
            margin: 0 0 12px 0;
            color: var(--white);
            font-size: 46px;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.02em;
        }

        .intro p {
            margin: 0;
            color: rgba(255, 255, 255, 0.92);
            font-size: 20px;
            line-height: 1.4;
        }

        /* VIDEO DI TENGAH */
        .video-section {
            width: 100%;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 0;
        }

        .video-container {
            width: 100%;
            height: 510px;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.25);
            border-radius: 24px;
            background: rgba(0, 0, 0, 0.2);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .food-video {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        /* TOMBOL & FOOTER DI BAWAH */
        .start-section {
            width: 100%;
            flex-shrink: 0;
            margin-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 16px;
        }

        .start-label {
            margin-bottom: 14px;
            text-align: center;
            color: #ffedd5;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .start-button {
            width: 100%;
            height: 84px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            background: var(--dark);
            color: var(--white);
            font-size: 24px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            transition: transform 0.1s ease;
        }

        .start-button:active {
            transform: scale(0.98);
        }

        .start-button:hover {
            background: #000000;
        }

        /* INFORMASI FITUR */
        .features {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding-top: 16px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            font-weight: 500;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <!-- PEMBUNGKUS STAGE KIOSK -->
    <div class="kiosk-stage">
        <div class="kiosk-screen">

            <!-- HEADER -->
            <header class="header">
                <div class="brand">
                    <div class="logo-container">
                        <img src="{{ asset('images/logo 2.jpg') }}" alt="HotMeal Logo">
                    </div>
                    <div>
                        <div class="brand-name">HotMeal</div>
                        <div class="brand-subtitle">FAST & FRESH KIOSK</div>
                    </div>
                </div>

                <div class="machine-status">
                    <span class="status-dot"></span>
                    <span>Gedung Tower A</span>
                </div>
            </header>

            <!-- INFORMASI UTAMA -->
            <section class="intro">
                <div class="intro-badge">
                    MAKANAN HANGAT & LEZAT
                </div>
                <h1>Hangat, cepat, khas Tarempa.</h1>
                <p>
                    Pilih menu favoritmu! Langsung disajikan hangat dan segar siap dinikmati dalam hitungan menit.
                </p>
            </section>

            <!-- VIDEO DI TENGAH -->
            <section class="video-section">
                <div class="video-container">
                    <video
                        id="foodVideo"
                        class="food-video"
                        autoplay
                        muted
                        loop
                        playsinline
                        preload="auto">
                        <source
                            src="{{ asset('videos/standby.mp4') }}"
                            type="video/mp4">
                        Browser tidak mendukung pemutaran video.
                    </video>
                </div>
            </section>

            <!-- TOMBOL MULAI & FOOTER -->
            <section class="start-section">
                <div class="start-label">
                    Mulai pesan makananmu
                </div>

                <button
                    type="button"
                    class="start-button"
                    onclick="startOrdering()">
                    <span><i class="fas fa-play" style="font-size: 18px;"></i></span>
                    Sentuh untuk mulai
                </button>

                <div class="features">
                    <div class="feature">
                        <i class="fas fa-clock"></i> Siap 3-5 menit
                    </div>
                    <span>•</span>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i> Pembayaran mudah
                    </div>
                    <span>•</span>
                    <div class="feature">
                        <i class="fas fa-fire"></i> Disajikan hangat
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Skrip Penyesuaian Skala Kiosk -->
    <script>
        const WIDTH = 746;
        const HEIGHT = 1280;

        function resizeKiosk() {
            const screen = document.querySelector(".kiosk-screen");
            if (!screen) return;

            const scaleX = window.innerWidth / WIDTH;
            const scaleY = window.innerHeight / HEIGHT;
            const scale = Math.min(scaleX, scaleY);

            screen.style.transform = `translate(-50%, -50%) scale(${scale})`;
        }

        window.addEventListener("resize", resizeKiosk);
        window.addEventListener("DOMContentLoaded", resizeKiosk);

        // Putar video otomatis
        const video = document.getElementById('foodVideo');
        document.addEventListener('DOMContentLoaded', function () {
            if (video) {
                video.play().catch(function (error) {
                    console.log('Video gagal diputar:', error);
                });
            }
        });

        // Pindah ke katalog produk (products.index)
        function startOrdering() {
            window.location.href = @json(route('products.index'));
        }
    </script>

</body>
</html>