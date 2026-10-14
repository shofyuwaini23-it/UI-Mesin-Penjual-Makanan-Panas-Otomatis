<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Menu - Tarempa</title>

<style>
*{box-sizing:border-box}
body{margin:0;background:#fff7ec;font-family:Arial,sans-serif;color:#3e281b}
.kiosk{max-width:520px;min-height:100vh;margin:auto;background:#fff7ec}
header{padding:16px 20px;background:#fff7ec;border-bottom:1px solid #eddfcf}
.top,.bottom,.brand,.product-info,.purchase,.quantity,.steps{display:flex;align-items:center;justify-content:space-between}
.brand{justify-content:flex-start;gap:10px}
.logo{display:grid;place-items:center;width:40px;height:40px;border-radius:12px;background:#f4511e;color:white;font-size:22px;font-weight:bold}
.brand b{font-size:18px}
.brand small{display:block;margin-top:3px;color:#f4511e;font-size:10px}
.date{text-align:right;font-size:12px;font-weight:bold}
.bottom{margin-top:14px;font-size:11px;color:#725d4d}
.bottom a{color:inherit;text-decoration:none}
.steps{gap:10px;padding:16px 20px;font-size:12px}
.steps div{flex:1;border-top:3px solid #ead5c1;padding-top:7px}
.steps .active{border-color:#f4511e;font-weight:bold}
.content{margin:0 16px 18px;padding:18px;border-radius:18px;background:white;border:1px solid #f0e2d2}
.title{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}
h2{margin:0;font-size:20px}
.close{border:0;border-radius:10px;padding:8px 12px;background:#fff0df;font-size:20px;color:#432718;cursor:pointer}
.food{width:100%;height:190px;object-fit:cover;border-radius:14px}
.product-info{align-items:flex-start;gap:10px;margin-top:16px}
.product-info h2{font-size:20px}
.price{color:#f4511e;font-size:19px;white-space:nowrap}
.stock{margin-top:8px;color:#8b755f;font-size:12px}
.description{font-size:13px;line-height:1.6;color:#81776e}
.nutrition{width:100%;padding:14px;border:1px solid #efddca;border-radius:12px;background:#fffaf4;text-align:left;font-size:14px;color:#432718;cursor:pointer}
.nutrition small{display:block;margin-top:5px;color:#897f75}
.nutrition-detail{display:none;padding:12px;font-size:12px;line-height:1.6}
.nutrition-detail.open{display:block}
.purchase{gap:10px;margin-top:16px}
.quantity{gap:10px;padding:6px 8px;background:#fff3e5;border-radius:12px}
.quantity button{width:32px;height:32px;border:0;border-radius:50%;background:#ffe5c6;font-size:18px;cursor:pointer}
.quantity .plus{background:#f4511e;color:white}
.buy{flex:1;padding:15px 8px;border:0;border-radius:12px;background:#432718;color:white;font-weight:bold;cursor:pointer}
footer{display:flex;justify-content:space-between;gap:12px;padding:16px 20px;background:#f9ecdc;border-top:1px solid #eddfcf;font-size:12px}
footer small{display:block;margin-bottom:6px;color:#89715e}
footer b{font-size:12px}
@media(max-width:360px){.content{margin:0 10px 14px;padding:14px}.food{height:160px}.product-info h2{font-size:17px}.price{font-size:16px}.purchase{gap:6px}.quantity{gap:6px}header{padding:14px}}
</style>
</head>

<body>
<div class="kiosk">
    <header>
        <div class="top">
            <div class="brand">
                <div class="logo">T</div>
                <div>
                    <b>TAREMPA</b>
                    <small>GO · SMART KIOSK</small>
                </div>
            </div>
            <div class="date">
                <div id="date"></div>
                <div id="time"></div>
            </div>
        </div>

        <div class="bottom">
            <a href="tel:0778123456">☎ Call Center</a>
            <span id="wifi">◉ Wi-Fi Terhubung</span>
        </div>
    </header>

    <section class="steps">
        <div class="active">Pilih</div>
        <div>Bayar</div>
        <div>Ambil</div>
    </section>

    <main class="content">
        <div class="title">
            <h2>Detail Menu</h2>
            <button class="close" onclick="backToMenu()">×</button>
        </div>

        <img class="food" src="{{ $product['image'] }}"
             alt="{{ $product['name'] }}">

        <div class="product-info">
            <h2>{{ $product['name'] }}</h2>
            <div class="price">
                Rp {{ number_format($product['price'], 0, ',', '.') }}
            </div>
        </div>

        <div class="stock">Stok Tersedia: 8</div>
        <p class="description">{{ $product['description'] }}</p>

        <button class="nutrition" onclick="toggleNutrition()">
            Kandungan Nutrisi　ⓘ
            <small>Lihat informasi nutrisi menu</small>
        </button>
        <div class="nutrition-detail" id="nutrition">
            Informasi nutrisi belum tersedia.
        </div>

        <div class="purchase">
            <div class="quantity">
                <button onclick="changeQty(-1)">−</button>
                <b id="qty">1</b>
                <button class="plus" onclick="changeQty(1)">+</button>
            </div>
            <button class="buy" onclick="buyProduct()">
                BELI　→
            </button>
        </div>
    </main>

    <footer>
        <div>
            <small>♨ Suhu Penyimpanan</small>
            <b>60°C · Aman</b>
        </div>
        <div>
            <small>⌖ Lokasi Mesin</small>
            <b>Batam · Gedung Tower A</b>
        </div>
    </footer>
</div>

<script>
const price = {{ $product['price'] }};
let quantity = 1;

function updateDate() {
    const now = new Date();
    document.getElementById('date').textContent =
        now.toLocaleDateString('id-ID',{
            weekday:'short',day:'2-digit',month:'short',year:'numeric',
            timeZone:'Asia/Jakarta'
        });
    document.getElementById('time').textContent =
        now.toLocaleTimeString('id-ID',{
            hour:'2-digit',minute:'2-digit',timeZone:'Asia/Jakarta'
        }) + ' WIB';
}
updateDate();
setInterval(updateDate, 60000);

function toggleNutrition() {
    document.getElementById('nutrition').classList.toggle('open');
}
function changeQty(value) {
    quantity = Math.max(1, quantity + value);
    document.getElementById('qty').textContent = quantity;
}
function backToMenu() {
    window.location.href = @json(route('products.index'));
}
function buyProduct() {
    const url = new URL(
        @json(route('checkout.show', $product['id'])),
        window.location.origin
    );
    url.searchParams.set('quantity', quantity);
    window.location.href = url.toString();
}
</script>
</body>
</html>