
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tarempa - Vending Food</title>
<link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">

<style>
*{box-sizing:border-box}
body{margin:0;background:#fff7ec;color:#39291e;font-family:Arial,sans-serif}
header{display:flex;justify-content:space-between;align-items:center;gap:15px;padding:18px 5%;border-bottom:1px solid #eddfcf}
.brand{display:flex;align-items:center;gap:10px}
.logo{display:grid;place-items:center;width:44px;height:44px;border-radius:13px;background:#f4511e;color:white;font-size:24px;font-weight:bold}
.brand b{font-size:21px}
.brand small{display:block;margin-top:4px;color:#f4511e;font-size:11px}
.header-info{text-align:right;font-size:12px}
.header-info .wifi{margin-bottom:7px;color:#31805e}
.header-info .date{font-weight:bold}
.container{max-width:1500px;margin:auto;padding:28px 5%}
h1{margin:0 0 8px;font-size:34px}
.subtitle{margin:0 0 26px;color:#82766b}


.search-form {
    display: flex;
    gap: 12px;
    margin-bottom: 32px;
}

.search-card {
    display: flex;
    align-items: center;
    flex: 1;
    min-width: 0;
    padding: 0 16px;
    border: 1px solid #ddd;
    border-radius: 14px;
    background: white;
}

.search-card input {
    flex: 1;
    min-width: 0;
    padding: 16px 4px;
    border: none;
    outline: none;
    font-size: 16px;
    background: transparent;
}

.clear-search {
    border: none;
    background: transparent;
    color: #777;
    font-size: 25px;
    cursor: pointer;
    padding: 4px 8px;
}

.search-button {
    padding: 0 28px;
    border: none;
    border-radius: 14px;
    background: #222;
    color: white;
    cursor: pointer;
}

@media (max-width: 500px) {
    .search-form { gap: 8px; }
    .search-button { padding: 0 18px; }
}
.filters{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:26px}
.filters a{padding:11px 20px;border:1px solid #e3d8cd;border-radius:30px;background:white;color:#432718;text-decoration:none}
.filters a.active{background:#432718;color:white}
.grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:22px}
.card{overflow:hidden;border-radius:18px;background:white;box-shadow:0 5px 16px #39291e12}
.card img{display:block;width:100%;height:220px;object-fit:cover}
.card-info{padding:18px}
.category{color:#897b6f;font-size:13px}
.card h2{margin:8px 0;font-size:20px}
.card-price{margin-bottom:16px;font-size:19px;font-weight:bold}
.detail-link{display:block;padding:13px;border-radius:10px;background:#432718;color:white;text-align:center;text-decoration:none}
.empty{grid-column:1/-1;padding:35px;text-align:center;color:#897b6f}
footer{display:flex;justify-content:space-between;gap:24px;padding:22px 5%;background:#432718;color:#fff3e4}
.footer-item{display:flex;align-items:center;gap:12px}
.footer-icon{font-size:26px}
footer small{display:block;margin-bottom:6px;color:#e0c5ac}
footer b{font-size:15px}

/* Modal detail dan konfirmasi */
.modal-overlay{position:fixed;inset:0;z-index:1000;display:flex;align-items:center;justify-content:center;padding:20px;background:#211b17a8;backdrop-filter:blur(5px)}
.modal{width:100%;max-width:660px;max-height:92vh;overflow-y:auto;padding:24px;border:1px solid #efddca;border-radius:22px;background:#fff7ec;box-shadow:0 18px 60px #0003}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
.modal-header h2{margin:0;font-size:24px}
.close{width:42px;height:42px;border:0;border-radius:12px;background:#ffe5c6;font-size:24px;cursor:pointer}
.modal-image{width:100%;height:250px;object-fit:cover;border-radius:15px}
.product-info{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-top:18px}
.product-info h3{margin:0;font-size:23px}
.price{color:#f4511e;font-size:21px;white-space:nowrap}
.stock{margin-top:8px;color:#89715e;font-size:13px}
.description{color:#81776e;font-size:14px;line-height:1.6}
.nutrition{width:100%;padding:14px;border:1px solid #efddca;border-radius:13px;background:#fffaf4;text-align:left;cursor:pointer}
.nutrition small{display:block;margin-top:6px;color:#897f75}
.nutrition-detail{display:none;padding:12px;font-size:13px}
.nutrition-detail.open{display:block}
.purchase{display:flex;gap:12px;margin-top:18px}
.quantity{display:flex;align-items:center;gap:10px;padding:6px 9px;border-radius:12px;background:#fff0df}
.quantity button{width:32px;height:32px;border:0;border-radius:10px;background:#ffe5c6;font-size:20px;cursor:pointer}
.quantity .plus{background:#f4511e;color:white}
.buy,.continue{flex:1;padding:15px 10px;border:0;border-radius:12px;background:#432718;color:white;font-weight:bold;text-align:center;text-decoration:none;cursor:pointer}
.confirm-product{display:flex;align-items:center;gap:14px;margin-bottom:18px}
.confirm-product img{width:105px;height:90px;object-fit:cover;border-radius:12px}
.confirm-product h3{margin:0 0 8px;font-size:18px}
.confirm-product p{margin:0;font-size:14px}
.confirm-quantity{display:flex;justify-content:space-between;padding:0 0 18px;border-bottom:1px solid #efddca;color:#89715e}
.confirm-quantity b{color:#432718;font-size:20px}
.total-box{margin:16px 0;padding:18px;border-radius:14px;background:#ffe5c6}
.total-box small{font-weight:bold}
.total-box h2{margin:8px 0;font-size:30px}
.total-box p{margin:0;color:#89715e;font-size:13px}
.confirm-question{margin:18px 0 14px;font-size:16px}
.confirm-actions{display:flex;gap:10px}
.confirm-actions a{flex:1;padding:15px 8px;border-radius:12px;text-align:center;text-decoration:none;font-size:14px;font-weight:bold}
.edit-button{background:#ffe5c6;color:#432718}
.continue{background:#432718;color:white} 
.payment-option {
    display: flex;
    align-items: center;
    gap: 16px;
    margin: 12px 0;
    padding: 20px 16px;
    border: 1px solid #efddca;
    border-radius: 20px;
    background: white;
    color: #39291e;
    text-decoration: none;
    box-shadow: 0 5px 15px #39291e0d;
}

.payment-option.qris {
    background: #211f1d;
    color: white;
}

.payment-icon {
    display: grid;
    flex-shrink: 0;
    place-items: center;
    width: 56px;
    height: 56px;
    border-radius: 13px;
    background: #f4511e;
    color: white;
    font-size: 27px;
}

.va-icon {
    background: #ffe1ce;
    color: #f4511e;
}

.payment-option b {
    display: block;
    margin-bottom: 7px;
    font-size: 17px;
}

.payment-option small {
    display: block;
    color: #95877b;
    font-size: 12px;
    line-height: 1.5;
}

.payment-option.qris small {
    color: #c9c0b8;
}

.payment-arrow {
    margin-left: auto;
    font-size: 25px;
    color: #f4511e;
}

.back-payment {
    display: block;
    margin-top: 18px;
    color: #6f5949;
    text-decoration: none;
    font-size: 13px;
}
body.modal-open{overflow:hidden}

@media(max-width:1000px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:600px){
    header{padding:14px 5%}
    .brand b{font-size:17px}
    .logo{width:38px;height:38px}
    .container{padding:24px 5%}
    h1{font-size:27px}
    .grid{gap:12px}
    .card img{height:145px}
    .card-info{padding:12px}
    .card h2{font-size:16px}
    .card-price{font-size:16px}
    .detail-link{padding:11px;font-size:13px}
    footer{padding:18px 5%;gap:12px}
    .footer-icon{font-size:20px}
    footer b{font-size:12px}
    footer small{font-size:10px}
    .modal-overlay{padding:10px}
    .modal{padding:16px}
    .modal-image{height:190px}
    .product-info h3{font-size:18px}
    .price{font-size:16px}
    .modal-header h2{font-size:20px}
    .purchase{gap:7px}
    .quantity{gap:6px;padding:5px}
    .buy{font-size:12px}
}

/* Modal pembayaran QRIS */
.qris-modal {
    max-width: 440px;
}

.qris-total {
    padding: 16px;
    margin-bottom: 16px;
    border-radius: 14px;
    background: #f4511e;
    color: white;
}

.qris-total small {
    font-size: 11px;
    font-weight: bold;
}

.qris-total h2 {
    margin: 8px 0;
    font-size: 28px;
}

.qris-total p {
    margin: 0;
    font-size: 12px;
}

.qris-timer {
    padding: 12px;
    margin: 14px 0;
    border-radius: 12px;
    background: #fff0df;
    text-align: center;
}

.qris-timer strong {
    display: block;
    margin-top: 4px;
    color: #f4511e;
    font-size: 25px;
}

.qris-code {
    display: flex;
    justify-content: center;
    margin: 16px auto;
}

.qris-code svg {
    width: 190px;
    height: 190px;
    padding: 10px;
    border: 1px solid #e8d9c9;
    border-radius: 12px;
    background: white;
}

.qris-note {
    color: #89715e;
    font-size: 12px;
    line-height: 1.6;
    text-align: center;
}

.qris-actions {
    display: flex;
    gap: 10px;
    margin-top: 18px;
}

.qris-actions button {
    flex: 1;
    padding: 13px 8px;
    border: 0;
    border-radius: 12px;
    font-weight: bold;
    cursor: pointer;
}

.qris-cancel {
    background: #ffe5c6;
    color: #432718;
}

.qris-success {
    background: #432718;
    color: white;
}

.qris-status {
    display: none;
    padding: 12px;
    margin-top: 12px;
    border-radius: 10px;
    background: #e5f5e9;
    color: #246b3b;
    text-align: center;
}

.qris-status.error {
    background: #fff0df;
    color: #a53b1d;
}

@media (max-width: 600px) {
    .qris-modal {
        padding: 18px;
    }

    .qris-code svg {
        width: 170px;
        height: 170px;
    }
}

</style>
</head>

<body class="{{ isset($selectedProduct) && $selectedProduct ? 'modal-open' : '' }}">

<header>
    <div>
        <div class="brand">
            <div class="logo">T</div>
            <div>
                <b>TAREMPA</b>
                <small>GO · SMART KIOSK</small>
            </div>
        </div>
        <div style="margin-top:10px;font-size:12px">
            ☎ <a href="tel:0778123456" style="color:inherit;text-decoration:none">Call Center</a>
        </div>
    </div>

    <div class="header-info">
        <div class="wifi">◉ Wi-Fi Terhubung</div>
        <div class="date" id="date"></div>
        <div id="time"></div>
    </div>
</header>

<main class="container">
    <p class="subtitle">Pilih makanan yang kamu inginkan</p>

    
<form action="{{ route('products.index') }}" method="GET"
      class="search-form">
    <div class="search-card">
        <input type="text" name="search"
               id="searchInput"
               placeholder="Cari makanan..."
               value="{{ request('search') }}">

        <button type="button" id="clearSearch"
                class="clear-search"
                title="Hapus pencarian"
                style="{{ request('search') ? '' : 'display:none' }}">
            ×
        </button>
    </div>

    <button type="submit" class="search-button">
        Cari
    </button>
</form>

    <nav class="filters">
        <a class="{{ $category === 'all' ? 'active' : '' }}"
           href="{{ route('products.index', ['category' => 'all', 'search' => $search]) }}">Semua</a>
        <a class="{{ $category === 'recommended' ? 'active' : '' }}"
           href="{{ route('products.index', ['category' => 'recommended', 'search' => $search]) }}">Rekomendasi</a>
        <a class="{{ $category === 'makanan' ? 'active' : '' }}"
           href="{{ route('products.index', ['category' => 'makanan', 'search' => $search]) }}">Makanan</a>
        <a class="{{ $category === 'snack' ? 'active' : '' }}"
           href="{{ route('products.index', ['category' => 'snack', 'search' => $search]) }}">Snack</a>
    </nav>

    <section class="grid">
        @forelse($products as $item)
            <article class="card">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                <div class="card-info">
                    <span class="category">
                        {{ ucfirst($item['category']) }}
                    </span>
                    <h2>{{ $item['name'] }}</h2>
                    <div class="card-price">
                        Rp{{ number_format($item['price'], 0, ',', '.') }}
                    </div>
                    <a class="detail-link"
                       href="{{ route('products.show', $item['id']) }}">Lihat Detail</a>
                </div>
            </article>
        @empty
            <div class="empty">
                Menu tidak ditemukan untuk pencarian atau kategori ini.
            </div>
        @endforelse
    </section>
</main>

<footer>
    <div class="footer-item">
        <div class="footer-icon">♨</div>
        <div>
            <small>Suhu Penyimpanan</small>
            <b>4°C · Aman</b>
        </div>
    </div>

    <div class="footer-item">
        <div class="footer-icon">⌖</div>
        <div>
            <small>Lokasi Mesin</small>
            <b>Batam · Gedung Tower A</b>
        </div>
    </div>
</footer>

@if(isset($selectedProduct) && $selectedProduct)
<div class="modal-overlay" id="detailModal">
    <section class="modal {{ ($step ?? 'detail') === 'qris' ? 'qris-modal' : '' }}">
        @if(($step ?? 'detail') === 'confirm')
            <div class="modal-header">
                <h2>KONFIRMASI PESANAN</h2>
                <button class="close" onclick="closeModal()">×</button>
            </div>

            <div class="confirm-product">
                <img src="{{ $selectedProduct['image'] }}" alt="{{ $selectedProduct['name'] }}">
                <div>
                    <h3>{{ $selectedProduct['name'] }}</h3>
                    <p>Rp. {{ number_format($selectedProduct['price'], 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="confirm-quantity">
                <span>Jumlah</span>
                <b>{{ $quantity }}</b>
            </div>

            <div class="total-box">
                <small>TOTAL BAYAR</small>
                <h2>Rp. {{ number_format($selectedProduct['price'] * $quantity, 0, ',', '.') }}</h2>
                <p>{{ $quantity }} × {{ $selectedProduct['name'] }}</p>
            </div>

            <h3 class="confirm-question">Apakah pesanan Anda sudah benar?</h3>

            <div class="confirm-actions">
                <a class="edit-button"
                   href="{{ route('products.show', $selectedProduct['id']) }}?quantity={{ $quantity }}">
                    UBAH ✎
                </a>
               
                <a class="continue"
                    href="{{ route('products.show', [
                    'id' => $selectedProduct['id'],
                    'step' => 'payment',
                    'quantity' => $quantity ]) }}">
                    LANJUT →
                </a>

            </div>
        @elseif(($step ?? 'detail') === 'qris')
            @include('products.qris-modal')
        
        @elseif(($step ?? 'detail') === 'va')
            @include('products.va-modal')

        @elseif(($step ?? 'detail') === 'payment')
            <div class="modal-header"><div><h2 style="margin-top:8px">Pilih metode pembayaran</h2></div><button class="close" onclick="closeModal()">×</button></div>
            <p class="description">Semua transaksi aman dan diproses secara nontunai.</p>
            <div class="total-box" style="background:#f4511e;color:white"><small>TOTAL BAYAR</small><h2>Rp {{ number_format($selectedProduct['price']*$quantity,0,',','.') }}</h2><p style="color:white">{{ $quantity }} × {{ $selectedProduct['name'] }} </p></div>
            <p style="font-size:12px;color:#897f75">METODE TERSEDIA</p>
            <a class="payment-option qris"
            href="{{ route('products.show', [
                'id' => $selectedProduct['id'],
                'step' => 'qris',
                'quantity' => $quantity
            ]) }}">
            <span class="payment-icon">▦</span>
            <span>
                <b>QRIS</b>
                <small>Pindai dengan GoPay, OVO, DANA, ShopeePay, atau aplikasi bank.</small>
            </span>
            <span class="payment-arrow">›</span>
        </a>
        <a class="payment-option"
        href="{{ route('products.show', [
            'id' => $selectedProduct['id'],
            'step' => 'va',
            'quantity' => $quantity
        ]) }}">
        <span class="payment-icon va-icon">♧</span>
        <span>
            <b>Virtual Account</b>
            <small>Transfer melalui m-banking atau e-wallet ke nomor VA.</small>
        </span>
        <span class="payment-arrow">›</span>
        </a>
        <a class="back-payment" href="{{ route('products.show',$selectedProduct['id']) }}?step=confirm&quantity={{ $quantity }}">← Kembali ke konfirmasi</a>
        @else
            <div class="modal-header">
                <h2>Detail Menu</h2>
                <button class="close" onclick="closeModal()">×</button>
            </div>

            <img class="modal-image" src="{{ $selectedProduct['image'] }}"
                 alt="{{ $selectedProduct['name'] }}">

            <div class="product-info">
                <h3>{{ $selectedProduct['name'] }}</h3>
                <div class="price">Rp {{ number_format($selectedProduct['price'], 0, ',', '.') }}</div>
            </div>

            <div class="stock">Stok Tersedia: 8</div>
            <p class="description">{{ $selectedProduct['description'] }}</p>

            <button class="nutrition" onclick="toggleNutrition()">
                Kandungan Nutrisi ⓘ
                <small>Lihat informasi nutrisi menu</small>
            </button>
            <div class="nutrition-detail" id="nutrition">
                Informasi nutrisi belum tersedia.
            </div>

            <div class="purchase">
                <div class="quantity">
                    <button onclick="changeQty(-1)">−</button>
                    <b id="qty">{{ $quantity }}</b>
                    <button class="plus" onclick="changeQty(1)">+</button>
                </div>
                <button class="buy" onclick="buyProduct()">
                    BELI → Rp <span id="total">{{ number_format($selectedProduct['price'] * $quantity, 0, ',', '.') }}</span>
                </button>
            </div>
        @endif
    </section>
</div>
@endif

<script>
function updateClock() {
    const now = new Date();
    const options = { timeZone: 'Asia/Jakarta' };

    document.getElementById('date').textContent =
        now.toLocaleDateString('id-ID', {
            ...options, weekday: 'short', day: '2-digit',
            month: 'short', year: 'numeric'
        });

    document.getElementById('time').textContent =
        now.toLocaleTimeString('id-ID', {
            ...options, hour: '2-digit', minute: '2-digit'
        }) + ' WIB';
}

updateClock();
setInterval(updateClock, 60000);


const searchInput = document.getElementById('searchInput');
const clearSearch = document.getElementById('clearSearch');

searchInput.addEventListener('input', function () {
    clearSearch.style.display = this.value ? 'block' : 'none';
});

clearSearch.addEventListener('click', function () {
    searchInput.value = '';

    const url = new URL(window.location.href);
    url.searchParams.delete('search');
    url.searchParams.delete('page');

    window.location.href = url.toString();
});

const price = {{ isset($selectedProduct) && $selectedProduct ? $selectedProduct['price'] : 0 }};
let quantity = {{ $quantity ?? 1 }};

function closeModal() {
    window.location.href = @json(route('products.index'));
}

function toggleNutrition() {
    document.getElementById('nutrition').classList.toggle('open');
}

function changeQty(value) {
    quantity = Math.max(1, Math.min(8, quantity + value));
    document.getElementById('qty').textContent = quantity;
    document.getElementById('total').textContent =
        (price * quantity).toLocaleString('id-ID');
}

function buyProduct() {
    const url = new URL(
        @json(isset($selectedProduct) && $selectedProduct ? route('products.show', $selectedProduct['id']) : route('products.index')),
        window.location.origin
    );

    url.searchParams.set('step', 'confirm');
    url.searchParams.set('quantity', quantity);
    window.location.href = url.toString();
}


function openPayment() {
    const url = new URL(
        window.location.href
    );

    url.searchParams.set('step', 'payment');
    window.location.href = url.toString();
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape' && document.getElementById('detailModal')) {
        closeModal();
    }
});
</script>
<script src="{{ asset('js/kiosk-viewport.js') }}"></script>
</body>
</html>