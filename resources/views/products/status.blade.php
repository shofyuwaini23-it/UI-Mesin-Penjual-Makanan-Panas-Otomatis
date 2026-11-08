
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - TAREMPA</title>

    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #FFF3E8;
            color: #211F1C;
            font-size: 18px;
        }

        /* KONTEN UTAMA */
        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 28px 40px;
        }

        /* JUDUL */
        .heading {
            text-align: center;
            margin-bottom: 26px;
        }

        .order-number {
            margin-bottom: 16px;
            color: #74665D;
            font-size: 17px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-block;
            background: #FFE3D2;
            color: #C94212;
            padding: 12px 20px;
            border-radius: 24px;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .heading h1 {
            font-size: 36px;
            line-height: 1.3;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .heading p {
            color: #74665D;
            font-size: 19px;
            line-height: 1.6;
        }

        /* KARTU PROGRES */
        .progress-card {
            background: #211F1C;
            color: white;
            border-radius: 24px;
            padding: 36px;
            min-height: 230px;
            display: flex;
            align-items: center;
            gap: 36px;
            box-shadow: 0 12px 25px #37261c20;
            margin-bottom: 24px;
        }

        /* TIMER */
        .timer-circle {
            position: relative;
            width: 150px;
            height: 150px;
            flex-shrink: 0;
        }

        .timer-circle svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .circle-bg {
            fill: none;
            stroke: #302E2B;
            stroke-width: 10;
        }

        .circle-progress {
            fill: none;
            stroke: #F15A24;
            stroke-width: 10;
            stroke-linecap: round;
            stroke-dasharray: 314;
            stroke-dashoffset: 314;
            transition: stroke-dashoffset 1s linear, stroke 0.3s;
        }

        .circle-progress.finished {
            stroke: #159363;
            stroke-dashoffset: 0;
        }

        .timer-text {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .timer-text strong {
            font-size: 36px;
            font-weight: 600;
        }

        .timer-text span {
            font-size: 14px;
            color: #E1DBD5;
            margin-top: 4px;
        }

        /* INFORMASI PROGRES */
        .progress-info {
            flex: 1;
            min-width: 0;
        }

        .progress-percent {
            color: #F15A24;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .progress-info h2 {
            font-size: 27px;
            line-height: 1.4;
            margin-bottom: 18px;
        }

        .progress-track {
            height: 14px;
            width: 100%;
            background: #45413D;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background: #F15A24;
            border-radius: 20px;
            transition: width 0.8s linear, background 0.3s;
        }

        /* DAFTAR PROSES PESANAN */
        .steps-card {
            background: white;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 10px 22px #37261c0c;
        }

        .steps-title {
            font-size: 16px;
            font-weight: bold;
            color: #74665D;
            margin-bottom: 22px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 22px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 22px;
        }

        .step.done .step-icon {
            background: #168B61;
            color: white;
        }

        .step.active .step-icon {
            background: #F15A24;
            color: white;
        }

        .step.waiting .step-icon {
            background: #F8EAD6;
            color: #8C8178;
        }

        .step-content {
            padding-top: 2px;
        }

        .step-content h3 {
            font-size: 20px;
            line-height: 1.4;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .step-content p {
            font-size: 17px;
            color: #74665D;
            line-height: 1.6;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .container {
                padding: 24px 16px 32px;
            }

            .order-number {
                font-size: 15px;
            }

            .status-badge {
                font-size: 14px;
            }

            .heading h1 {
                font-size: 30px;
            }

            .heading p {
                font-size: 17px;
            }

            .progress-card {
                padding: 24px 20px;
                gap: 20px;
            }

            .timer-circle {
                width: 115px;
                height: 115px;
            }

            .timer-text strong {
                font-size: 28px;
            }

            .timer-text span {
                font-size: 12px;
            }

            .progress-info h2 {
                font-size: 21px;
            }

            .steps-card {
                padding: 22px 18px;
            }

            .step-content h3 {
                font-size: 18px;
            }

            .step-content p {
                font-size: 16px;
            }
        }

        @media (max-width: 380px) {
            .progress-card {
                flex-direction: column;
                text-align: center;
            }

            .progress-info {
                width: 100%;
            }

            .progress-info h2 {
                font-size: 20px;
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

    {{-- HEADER HOTMEAL: SAMA DENGAN HALAMAN KATALOG --}}
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

    <main class="container">

        {{-- INFORMASI PESANAN --}}
        <section class="heading">

            <div class="order-number">
                Nomor Pesanan: {{ $orderNumber ?? 'A-024' }}
            </div>

            <div class="status-badge" id="statusBadge">
                ♨ &nbsp; SEDANG DISIAPKAN
            </div>

            <h1 id="pageTitle">
                Pesanan sedang disiapkan
            </h1>

            <p id="pageDescription">
                Mesin sedang memasak {{ $quantity ?? 1 }} porsi
                {{ $product['name'] ?? 'Mie Tarempa Original' }}.
                Mohon tetap di dekat mesin.
            </p>

        </section>

        {{-- KARTU PROGRES --}}
        <section class="progress-card">

            <div class="timer-circle">
                <svg viewBox="0 0 120 120" aria-hidden="true">

                    <circle
                        class="circle-bg"
                        cx="60"
                        cy="60"
                        r="50">
                    </circle>

                    <circle
                        class="circle-progress"
                        id="circleProgress"
                        cx="60"
                        cy="60"
                        r="50">
                    </circle>

                </svg>

                <div class="timer-text">
                    <strong id="timer">00:07</strong>
                    <span id="timerLabel">DETIK</span>
                </div>
            </div>

            <div class="progress-info">

                <div class="progress-percent" id="progressPercent">
                    0% SELESAI
                </div>

                <h2 id="progressTitle">
                    Memasak dan mengemas pesananmu
                </h2>

                <div class="progress-track">
                    <div class="progress-fill" id="progressFill"></div>
                </div>

            </div>

        </section>

        {{-- TAHAPAN PESANAN --}}
        <section class="steps-card">

            <div class="steps-title">
                PROSES PESANAN
            </div>

            <div class="step done" id="stepPayment">

                <div class="step-icon">✓</div>

                <div class="step-content">
                    <h3>Pembayaran dikonfirmasi</h3>
                    <p>Pembayaran pesanan berhasil dikonfirmasi.</p>
                </div>

            </div>

            <div class="step active" id="stepCooking">

                <div class="step-icon">☐</div>

                <div class="step-content">
                    <h3>Memasak dan mengemas</h3>
                    <p>Pesanan sedang diproses. Mohon tunggu.</p>
                </div>

            </div>

            <div class="step waiting" id="stepPickup">

                <div class="step-icon">☐</div>

                <div class="step-content">
                    <h3>Keluarkan ke laci pengambilan</h3>
                    <p>Silakan ambil makanan setelah pesanan siap.</p>
                </div>

            </div>

        </section>

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

    {{-- SIMULASI PROSES PESANAN --}}
    <script>
        let remainingSeconds = 7;
        let elapsedSeconds = 0;

        const totalSeconds = 7;

        const timer = document.getElementById('timer');
        const timerLabel = document.getElementById('timerLabel');
        const progressFill = document.getElementById('progressFill');
        const progressPercent = document.getElementById('progressPercent');
        const circleProgress = document.getElementById('circleProgress');

        function updateProgress() {
            const minutes = Math.floor(remainingSeconds / 60);
            const seconds = remainingSeconds % 60;

            timer.textContent =
                String(minutes).padStart(2, '0') + ':' +
                String(seconds).padStart(2, '0');

            timerLabel.textContent = 'DETIK';

            const percent = Math.min(
                100,
                (elapsedSeconds / totalSeconds) * 100
            );

            progressFill.style.width = percent + '%';

            progressPercent.textContent =
                Math.round(percent) + '% SELESAI';

            circleProgress.style.strokeDashoffset =
                314 - (314 * percent / 100);
        }

        function finishCooking() {

            // Tampilkan progres 100%.
            timer.textContent = '00:00';
            timerLabel.textContent = 'SELESAI';

            progressFill.style.width = '100%';
            progressFill.style.background = '#159363';

            progressPercent.textContent = '100% SELESAI';

            circleProgress.style.strokeDashoffset = '0';
            circleProgress.classList.add('finished');

            // Tandai proses memasak selesai.
            const cookingStep = document.getElementById('stepCooking');

            cookingStep.classList.remove('active');
            cookingStep.classList.add('done');

            cookingStep.querySelector('.step-icon').textContent = '✓';

            cookingStep.querySelector('h3').textContent =
                'Memasak dan mengemas selesai';

            cookingStep.querySelector('p').textContent =
                'Proses persiapan pesanan telah selesai.';

            // Aktifkan tahap pengambilan.
            const pickupStep = document.getElementById('stepPickup');

            pickupStep.classList.remove('waiting');
            pickupStep.classList.add('active');

            pickupStep.querySelector('.step-icon').textContent = '!';

            pickupStep.querySelector('h3').textContent =
                'Pesanan siap diambil';

            pickupStep.querySelector('p').textContent =
                'Silakan ambil makanan di laci pengambilan.';

            // Perbarui informasi halaman.
            document.getElementById('statusBadge').textContent =
                '✓ PESANAN SIAP DIAMBIL';

            document.getElementById('pageTitle').textContent =
                'Pesanan selesai disiapkan';

            document.getElementById('pageDescription').textContent =
                'Pesananmu siap diambil. Silakan ambil makanan dari mesin.';

            document.getElementById('progressTitle').textContent =
                'Pesananmu sudah siap!';

            // Lanjut ke halaman pesanan selesai setelah 1,5 detik.
            setTimeout(() => {
                window.location.href =
                    @json(route('orders.finished', [
                        'id' => $product['id'] ?? 1,
                        'quantity' => $quantity ?? 1
                    ]));
            }, 1500);
        }

        updateProgress();

        const timerInterval = setInterval(() => {

            remainingSeconds--;
            elapsedSeconds++;

            if (remainingSeconds <= 0) {
                clearInterval(timerInterval);
                finishCooking();
                return;
            }

            updateProgress();

        }, 1000);
    </script>

    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>

</body>
</html>
