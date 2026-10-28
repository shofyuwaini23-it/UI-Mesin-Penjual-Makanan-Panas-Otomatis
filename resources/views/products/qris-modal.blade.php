
<div class="modal-header">
    <div>
        <p style="margin:0 0 6px;color:#f4511e;font-size:12px;font-weight:bold">
            LANGKAH 3 DARI 3
        </p>
        <h2>Pembayaran QRIS</h2>
    </div>

    <button class="close" type="button" onclick="closeModal()">×</button>
</div>

<div class="qris-total">
    <small>TOTAL PEMBAYARAN</small>
    <h2>Rp {{ number_format($selectedProduct['price'] * $quantity, 0, ',', '.') }}</h2>
    <p>{{ $quantity }} × {{ $selectedProduct['name'] }}</p>
</div>

<div class="qris-timer">
    <span>Selesaikan pembayaran sebelum waktu habis</span>
    <strong id="qrisTimer">05:00</strong>
</div>

<div class="qris-code">
    <svg viewBox="0 0 210 210" role="img"
         aria-label="Ilustrasi kode QRIS untuk simulasi">
        <rect width="210" height="210" fill="white"/>

        <g fill="#211f1d">
            <path d="M10 10h60v60H10z M20 20v40h40V20z M30 30h20v20H30z"/>
            <path d="M140 10h60v60h-60z M150 20v40h40V20z M160 30h20v20h-20z"/>
            <path d="M10 140h60v60H10z M20 150v40h40v-40z M30 160h20v20H30z"/>

            <path d="M80 10h10v10H80z M100 10h10v20h-10z
                     M80 30h20v10H80z M110 40h10v20h-10z
                     M80 50h10v20H80z M100 60h10v10h-10z
                     M80 80h10v10H80z M100 80h20v10h-20z
                     M130 80h10v20h-10z M150 80h20v10h-20z
                     M180 80h20v10h-20z M10 80h10v20H10z
                     M30 80h20v10H30z M60 80h10v20H60z
                     M20 100h10v10H20z M40 100h20v10H40z
                     M70 100h20v10H70z M100 100h10v20h-10z
                     M120 110h20v10h-20z M150 100h10v20h-10z
                     M180 100h20v10h-20z M10 120h20v10H10z
                     M50 120h10v20H50z M80 120h10v10H80z
                     M120 130h10v20h-10z M140 130h20v10h-20z
                     M170 130h10v10h-10z M190 120h10v20h-10z
                     M80 150h10v10H80z M100 140h10v20h-10z
                     M110 170h20v10h-20z M140 160h10v20h-10z
                     M160 150h20v10h-20z M190 160h10v20h-10z
                     M80 190h20v10H80z M150 190h10v10h-10z
                     M170 180h10v20h-10z"/>
        </g>
    </svg>
</div>

<p class="qris-note">
    Ini adalah tampilan simulasi untuk antarmuka PBL.
    Kode di atas bukan kode QRIS pembayaran sungguhan dan tidak dapat dipindai
    untuk melakukan pembayaran.
</p>

<div id="qrisStatus" class="qris-status" role="status"></div>

<div class="qris-actions">
    <button type="button" class="qris-cancel"
            onclick="backToPayment()">
        ← Kembali
    </button>

    <button type="button" class="qris-success"
            onclick="simulateQrisSuccess()">
        Simulasikan Pembayaran
    </button>
</div>

<script>
    let qrisRemaining = 300;
    let qrisInterval = null;

    function updateQrisTimer() {
        const timer = document.getElementById('qrisTimer');
        if (!timer) return;

        const minutes = Math.floor(qrisRemaining / 60);
        const seconds = qrisRemaining % 60;

        timer.textContent =
            String(minutes).padStart(2, '0') + ':' +
            String(seconds).padStart(2, '0');

        if (qrisRemaining <= 0) {
            clearInterval(qrisInterval);
            timer.textContent = '00:00';

            const status = document.getElementById('qrisStatus');
            status.className = 'qris-status error';
            status.style.display = 'block';
            status.textContent =
                'Waktu simulasi habis. Kembali ke pilihan metode pembayaran untuk mencoba lagi.';
            return;
        }

        qrisRemaining--;
    }

    function backToPayment() {
        window.location.href = @json(route('products.show', $selectedProduct['id'])) +
            '?step=payment&quantity={{ $quantity }}';
    }

    function simulateQrisSuccess() {
        clearInterval(qrisInterval);

        const status = document.getElementById('qrisStatus');
        status.className = 'qris-status';
        status.style.display = 'block';
        status.textContent =
            'Simulasi berhasil! Ini hanya demonstrasi UI, bukan konfirmasi pembayaran sungguhan.';
    }

    updateQrisTimer();
    qrisInterval = setInterval(updateQrisTimer, 1000);
</script>
