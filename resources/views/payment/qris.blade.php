
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS | TAREMPA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --cream: #fff7ed;
            --orange: #f4511e;
            --orange-dark: #cf3e12;
            --orange-light: #ffe0cc;
            --black: #24211e;
            --muted: #786f67;
            --line: #e8d8c8;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--cream);
            color: var(--black);
            font-family: 'Inter', sans-serif;
        }

        button {
            font: inherit;
            cursor: pointer;
        }

        .page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            min-height: 130px;
            padding: 24px 5.2%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            border-bottom: 1px solid var(--line);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .brand-icon {
            width: 78px;
            height: 78px;
            flex-shrink: 0;
            border-radius: 28px;
            background: var(--orange);
            color: white;
            display: grid;
            place-items: center;
            font-size: 40px;
            font-weight: 700;
        }

        .brand-name {
            margin: 0;
            font-size: clamp(24px, 3vw, 36px);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-subtitle {
            margin-top: 2px;
            color: var(--orange);
            font-size: 18px;
            font-weight: 700;
        }

        .header-label {
            color: var(--muted);
            font-size: 21px;
            font-weight: 700;
        }

        .main {
            width: min(100% - 10.4%, 1100px);
            margin: 0 auto;
            padding: 38px 0 40px;
            display: flex;
            flex: 1;
            flex-direction: column;
        }

        .top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .timer {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 23px;
            background: var(--orange-light);
            color: var(--orange-dark);
            border-radius: 40px;
            font-size: 22px;
            font-weight: 800;
            font-variant-numeric: tabular-nums;
        }

        .cancel-button {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 1px solid var(--line);
            background: white;
            color: var(--black);
            font-size: 32px;
            font-weight: 500;
        }

        .intro {
            text-align: center;
            margin: 38px 0 28px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 13px 22px;
            border-radius: 40px;
            background: var(--orange-light);
            color: var(--orange-dark);
            font-size: 17px;
            font-weight: 500;
        }

        .intro h2 {
            margin: 16px 0 10px;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 500;
            letter-spacing: -1.5px;
        }

        .intro p {
            margin: 0;
            color: var(--muted);
            font-size: clamp(15px, 2.2vw, 23px);
            line-height: 1.5;
        }

        .qr-card {
            width: min(100%, 700px);
            margin: 0 auto 34px;
            padding: 42px 30px 38px;
            border-radius: 38px;
            background: white;
            box-shadow: 0 18px 45px rgba(66, 43, 24, .12);
            text-align: center;
        }

        .qr-frame {
            width: min(100%, 440px);
            aspect-ratio: 1;
            margin: 0 auto;
            padding: 12px;
            border: 11px solid var(--black);
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: white;
        }

        .qr-grid {
            width: 72%;
            aspect-ratio: 1;
            display: grid;
            grid-template-columns: repeat(29, 1fr);
            grid-template-rows: repeat(29, 1fr);
            gap: 0;
            background: white;
        }

        .qr-cell {
            background: white;
        }

        .qr-cell.dark {
            background: #000;
        }

        .qr-caption {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 26px;
        }

        .qris-word {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .qris-description {
            color: var(--muted);
            font-size: 17px;
        }

        .qr-note {
            margin: 18px 0 0;
            color: #9a8d82;
            font-size: 12px;
            line-height: 1.5;
        }

        .total-card {
            margin-top: auto;
            padding: 26px 34px;
            border-radius: 30px;
            background: var(--black);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .total-label {
            color: #c5c0bc;
            font-size: 18px;
            font-weight: 700;
        }

        .total-value {
            margin-top: 7px;
            font-size: clamp(30px, 4vw, 46px);
            font-weight: 400;
            letter-spacing: -1px;
        }

        .total-icon {
            color: var(--orange);
            font-size: 40px;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .button {
            min-height: 58px;
            padding: 16px 24px;
            border: 0;
            border-radius: 15px;
            font-weight: 700;
            transition: .2s ease;
        }

        .button:focus-visible,
        .cancel-button:focus-visible {
            outline: 3px solid #24211e;
            outline-offset: 4px;
        }

        .button-primary {
            background: var(--orange);
            color: white;
        }

        .button-primary:hover {
            background: var(--orange-dark);
        }

        .button-secondary {
            background: white;
            color: var(--black);
            border: 1px solid var(--line);
        }

        .result {
            display: none;
            width: min(100%, 700px);
            margin: 45px auto;
            padding: 45px 30px;
            background: white;
            border-radius: 32px;
            text-align: center;
            box-shadow: 0 18px 45px rgba(66, 43, 24, .10);
        }

        .result-icon {
            width: 92px;
            height: 92px;
            margin: 0 auto 22px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #dcfce7;
            color: #15803d;
            font-size: 52px;
            font-weight: 700;
        }

        .result h2 {
            margin: 0 0 12px;
            font-size: 34px;
        }

        .result p {
            color: var(--muted);
            line-height: 1.7;
        }

        .result-amount {
            margin: 20px 0;
            font-size: 34px;
            font-weight: 800;
        }

        .notice {
            margin: 20px auto;
            padding: 12px 16px;
            max-width: 440px;
            border-radius: 12px;
            background: #fff0db;
            color: #8a4515;
            font-size: 13px;
            line-height: 1.6;
        }

        [hidden] {
            display: none !important;
        }

        @media (min-width: 1200px) {
            .main {
                width: min(100% - 10.4%, 1200px);
            }
        }

        @media (max-width: 600px) {
            .header {
                min-height: 94px;
                padding: 16px 5%;
            }

            .brand {
                gap: 10px;
            }

            .brand-icon {
                width: 52px;
                height: 52px;
                border-radius: 17px;
                font-size: 28px;
            }

            .brand-subtitle {
                font-size: 12px;
            }

            .header-label {
                font-size: 13px;
                text-align: right;
            }

            .main {
                width: 90%;
                padding-top: 24px;
            }

            .timer {
                padding: 12px 15px;
                font-size: 17px;
            }

            .cancel-button {
                width: 50px;
                height: 50px;
                font-size: 25px;
            }

            .intro {
                margin-top: 30px;
            }

            .qr-card {
                padding: 25px 16px;
                border-radius: 25px;
            }

            .qr-frame {
                border-width: 7px;
                border-radius: 13px;
                padding: 8px;
            }

            .qris-word {
                font-size: 28px;
            }

            .qris-description {
                font-size: 13px;
            }

            .total-card {
                padding: 22px;
                border-radius: 22px;
            }

            .total-label {
                font-size: 13px;
            }

            .total-icon {
                font-size: 30px;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<div class="page">
    <header class="header">
        <div class="brand">
            <div class="brand-icon">T</div>
            <div>
                <h1 class="brand-name">TAREMPA</h1>
                <div class="brand-subtitle">GO • SMART KIOSK</div>
            </div>
        </div>

        <div class="header-label">Bayar dengan QRIS</div>
    </header>

    <main class="main">
        <section id="paymentScreen">
            <div class="top-row">
                <div class="timer">
                    <span aria-hidden="true">◷</span>
                    <span id="timer">05:00</span>
                </div>

                <button class="cancel-button"
                        id="cancelTop"
                        aria-label="Batalkan pembayaran"
                        title="Batalkan pembayaran">
                    ×
                </button>
            </div>

            <div class="intro">
                <div class="status">
                    <span aria-hidden="true">⛶</span>
                    <span id="statusText">MENUNGGU PEMBAYARAN</span>
                </div>

                <h2>Scan QRIS</h2>
                <p>Arahkan kamera aplikasi pembayaran ke kode QR.</p>
            </div>

            <section class="qr-card">
                <div class="qr-frame">
                    <div id="qrGrid"
                         class="qr-grid"
                         role="img"
                         aria-label="Ilustrasi kode QR simulasi"></div>
                </div>

                <div class="qr-caption">
                    <span class="qris-word">QRIS</span>
                    <span class="qris-description">SATU QR UNTUK SEMUA</span>
                </div>

                <p class="qr-note">
                    QR ini hanya untuk simulasi antarmuka.
                    Tidak dapat digunakan untuk pembayaran sungguhan.
                </p>
            </section>

            <section class="total-card">
                <div>
                    <div class="total-label">TOTAL PEMBAYARAN</div>
                    <div class="total-value">Rp 46.000</div>
                </div>
                <div class="total-icon" aria-hidden="true">⌗</div>
            </section>

            <div class="actions">
                <button class="button button-primary" id="simulateButton">
                    Simulasikan Pembayaran Berhasil
                </button>
                <button class="button button-secondary" id="cancelButton">
                    Batalkan Pembayaran
                </button>
            </div>

            <div class="notice">
                Mode demo: klik tombol simulasi untuk melihat
                halaman pembayaran berhasil. Tidak ada transaksi nyata.
            </div>
        </section>

        <section id="resultScreen" class="result" aria-live="polite">
            <div class="result-icon" id="resultIcon">✓</div>
            <h2 id="resultTitle">Pembayaran Berhasil!</h2>
            <p id="resultDescription">
                Simulasi pembayaran QRIS telah berhasil.
            </p>
            <div class="result-amount">Rp 46.000</div>
            <p id="resultExtra">
                Pesanan kamu siap dilanjutkan ke tahap berikutnya.
            </p>
            <div class="notice" id="resultNotice">
                Ini adalah status simulasi, bukan bukti pembayaran asli.
            </div>
            <button class="button button-primary"
                    id="backButton">
                Kembali ke Katalog
            </button>
        </section>
    </main>
</div>

<script>
    // Membuat pola visual QR palsu.
    // Pola ini sengaja bukan kode pembayaran yang valid.
    const qrGrid = document.getElementById('qrGrid');
    const size = 29;

    function isFinderCell(x, y, startX, startY) {
        const dx = x - startX;
        const dy = y - startY;

        if (dx < 0 || dy < 0 || dx >= 7 || dy >= 7) {
            return null;
        }

        return dx === 0 || dx === 6 ||
               dy === 0 || dy === 6 ||
               (dx >= 2 && dx <= 4 &&
                dy >= 2 && dy <= 4);
    }

    for (let y = 0; y < size; y++) {
        for (let x = 0; x < size; x++) {
            const cell = document.createElement('div');
            cell.className = 'qr-cell';

            let dark = ((x * 13 + y * 7 + x * y) % 11) < 5;

            const finders = [
                [0, 0],
                [size - 7, 0],
                [0, size - 7]
            ];

            for (const [fx, fy] of finders) {
                const finder = isFinderCell(x, y, fx, fy);

                if (finder !== null) {
                    dark = finder;
                    break;
                }
            }

            if (dark) {
                cell.classList.add('dark');
            }

            qrGrid.appendChild(cell);
        }
    }

    // Timer 5 menit untuk demo.
    let remainingSeconds = 300;
    let timerInterval = null;
    let finished = false;

    const timerElement = document.getElementById('timer');
    const paymentScreen = document.getElementById('paymentScreen');
    const resultScreen = document.getElementById('resultScreen');

    function renderTimer() {
        const minutes = Math.floor(remainingSeconds / 60);
        const seconds = remainingSeconds % 60;

        timerElement.textContent =
            String(minutes).padStart(2, '0') + ':' +
            String(seconds).padStart(2, '0');
    }

    function stopTimer() {
        if (timerInterval !== null) {
            clearInterval(timerInterval);
            timerInterval = null;
        }
    }

    function showResult(type) {
        if (finished) return;

        finished = true;
        stopTimer();

        paymentScreen.hidden = true;
        resultScreen.style.display = 'block';

        const icon = document.getElementById('resultIcon');
        const title = document.getElementById('resultTitle');
        const description =
            document.getElementById('resultDescription');
        const extra = document.getElementById('resultExtra');
        const notice = document.getElementById('resultNotice');

        if (type === 'success') {
            icon.textContent = '✓';
            title.textContent = 'Pembayaran Berhasil!';
            description.textContent =
                'Simulasi pembayaran QRIS telah berhasil.';
            extra.textContent =
                'Kamu dapat melanjutkan ke tahap pemrosesan pesanan.';
            notice.textContent =
                'Mode simulasi: tidak ada uang yang diproses.';
        } else if (type === 'cancel') {
            icon.textContent = '×';
            title.textContent = 'Pembayaran Dibatalkan';
            description.textContent =
                'Simulasi pembayaran telah dibatalkan.';
            extra.textContent =
                'Kamu dapat kembali ke katalog untuk memilih makanan.';
            notice.textContent =
                'Tidak ada transaksi nyata yang terjadi.';
        } else {
            icon.textContent = '!';
            title.textContent = 'Waktu Pembayaran Habis';
            description.textContent =
                'Waktu simulasi pembayaran sudah berakhir.';
            extra.textContent =
                'Kembali ke katalog untuk memulai pesanan baru.';
            notice.textContent =
                'Mode simulasi: tidak ada transaksi nyata.';
        }
    }

    timerInterval = setInterval(() => {
        if (finished) return;

        remainingSeconds--;
        renderTimer();

        if (remainingSeconds <= 0) {
            showResult('expired');
        }
    }, 1000);

    document.getElementById('simulateButton')
        .addEventListener('click', () => showResult('success'));

    document.getElementById('cancelButton')
        .addEventListener('click', () => showResult('cancel'));

    document.getElementById('cancelTop')
        .addEventListener('click', () => showResult('cancel'));

    document.getElementById('backButton')
        .addEventListener('click', () => {
            window.location.href = @json(route('products.index'));
        });
</script>
</body>
</html>
