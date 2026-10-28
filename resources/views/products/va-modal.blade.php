
<div class="modal-header">
    <div>
        <p style="margin:0 0 6px;color:#f4511e;font-size:12px;font-weight:bold">
            LANGKAH 3 DARI 3
        </p>
        <h2>Pembayaran Virtual Account</h2>
    </div>
    <button class="close" type="button" onclick="closeModal()">×</button>
</div>

<div class="qris-total">
    <small>TOTAL PEMBAYARAN</small>
    <h2>Rp {{ number_format($selectedProduct['price'] * $quantity, 0, ',', '.') }}</h2>
    <p>{{ $quantity }} × {{ $selectedProduct['name'] }}</p>
</div>

<div class="va-payment-card">
    <div class="va-bank-icon">▤</div>
    <div>
        <b>Virtual Account TAREMPA</b>
        <small>Bank simulasi untuk demonstrasi UI</small>
    </div>
</div>

<p class="va-label">NOMOR VIRTUAL ACCOUNT</p>

<div class="va-number-box">
    <strong id="vaNumber">8808123456789012</strong>
    <button type="button" onclick="copyVaNumber()">Salin</button>
</div>

<p id="vaCopyStatus" class="va-copy-status" role="status"></p>

<div class="qris-timer">
    <span>Selesaikan pembayaran sebelum waktu habis</span>
    <strong id="vaTimer">05:00</strong>
</div>

<div class="va-instructions">
    <b>Cara pembayaran</b>
    <ol>
        <li>Buka aplikasi mobile banking atau ATM.</li>
        <li>Pilih menu Virtual Account atau pembayaran VA.</li>
        <li>Masukkan nomor VA yang ditampilkan.</li>
        <li>Periksa nominal, lalu lanjutkan pembayaran.</li>
    </ol>
</div>

<p class="qris-note">
    Nomor VA ini hanya contoh untuk simulasi antarmuka.
    Nomor tersebut tidak terhubung ke rekening bank dan tidak dapat digunakan
    untuk transaksi sungguhan.
</p>

<div id="vaStatus" class="qris-status" role="status"></div>

<div class="qris-actions">
    <button type="button" class="qris-cancel" onclick="backToPayment()">
        ← Kembali
    </button>
    <button type="button" class="qris-success" onclick="simulateVaSuccess()">
        Simulasikan Pembayaran
    </button>
</div>

<style>
    .va-payment-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        border: 1px solid #efddca;
        border-radius: 14px;
        background: white;
    }

    .va-bank-icon {
        display: grid;
        place-items: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #ffe1ce;
        color: #f4511e;
        font-size: 25px;
    }

    .va-payment-card b,
    .va-payment-card small {
        display: block;
    }

    .va-payment-card small {
        margin-top: 5px;
        color: #89715e;
        font-size: 12px;
    }

    .va-label {
        margin: 18px 0 8px;
        color: #89715e;
        font-size: 12px;
        font-weight: bold;
    }

    .va-number-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 14px;
        border: 1px dashed #f4511e;
        border-radius: 12px;
        background: white;
    }

    .va-number-box strong {
        font-size: 18px;
        letter-spacing: 1px;
        overflow-wrap: anywhere;
    }

    .va-number-box button {
        flex-shrink: 0;
        padding: 10px 12px;
        border: 0;
        border-radius: 9px;
        background: #ffe5c6;
        color: #432718;
        font-weight: bold;
        cursor: pointer;
    }

    .va-copy-status {
        margin: 8px 0;
        color: #246b3b;
        font-size: 12px;
    }

    .va-instructions {
        margin-top: 16px;
        padding: 14px;
        border-radius: 12px;
        background: #fffaf4;
        font-size: 13px;
        line-height: 1.6;
    }

    .va-instructions ol {
        margin-bottom: 0;
        padding-left: 20px;
    }

    @media (max-width: 600px) {
        .va-number-box strong {
            font-size: 14px;
        }
    }
</style>

<script>
    let vaRemaining = 300;
    let vaInterval = null;

    function updateVaTimer() {
        const timer = document.getElementById('vaTimer');
        if (!timer) return;

        const minutes = Math.floor(vaRemaining / 60);
        const seconds = vaRemaining % 60;

        timer.textContent =
            String(minutes).padStart(2, '0') + ':' +
            String(seconds).padStart(2, '0');

        if (vaRemaining <= 0) {
            clearInterval(vaInterval);

            const status = document.getElementById('vaStatus');
            status.className = 'qris-status error';
            status.style.display = 'block';
            status.textContent =
                'Waktu simulasi habis. Kembali ke pilihan metode pembayaran untuk mencoba lagi.';
            return;
        }

        vaRemaining--;
    }

    function copyVaNumber() {
        const number = document.getElementById('vaNumber').textContent.trim();
        const status = document.getElementById('vaCopyStatus');

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(number)
                .then(() => {
                    status.textContent = 'Nomor VA berhasil disalin.';
                })
                .catch(() => {
                    status.textContent = 'Silakan salin nomor VA secara manual.';
                });
        } else {
            status.textContent = 'Silakan salin nomor VA secara manual.';
        }
    }

    function backToPayment() {
        window.location.href = @json(route('products.show', $selectedProduct['id'])) +
            '?step=payment&quantity={{ $quantity }}';
    }

    function simulateVaSuccess() {
    clearInterval(vaInterval);

    const url = "{{ route('payment.processing', ['id' => $selectedProduct['id']]) }}";
    const params = new URLSearchParams({
        quantity: "{{ $quantity }}",
        method: "va"
    });

    window.location.href = url + "?" + params.toString();
}

    updateVaTimer();
    vaInterval = setInterval(updateVaTimer, 1000);
</script>
