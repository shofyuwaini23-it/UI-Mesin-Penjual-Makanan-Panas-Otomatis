
{{-- HALAMAN 2: TARGET KALORI --}}
<div class="calorie-step" id="calorieStep" style="display:none;">

    <span class="recommendation-label">
        HOTMEAL SMART ASSISTANT · 02
    </span>

    <h2>Berapa Target Kalori yang Kamu Inginkan?</h2>

    <p class="calorie-description">
        Pilih target kalori yang sesuai dengan kebutuhanmu
        agar kami bisa memberikan rekomendasi makanan.
    </p>

    <div class="calorie-options">

        <button type="button"
                class="calorie-option"
                data-calorie="Rendah">
            <span class="calorie-icon">🥗</span>
            <b>Rendah</b>
            <small>Asupan kalori lebih rendah</small>
        </button>

        <button type="button"
                class="calorie-option"
                data-calorie="Sedang">
            <span class="calorie-icon">🍱</span>
            <b>Sedang</b>
            <small>Asupan kalori sedang</small>
        </button>

        <button type="button"
                class="calorie-option"
                data-calorie="Tinggi">
            <span class="calorie-icon">🍜</span>
            <b>Tinggi</b>
            <small>Asupan kalori lebih tinggi</small>
        </button>

    </div>

    <p class="calorie-error" id="calorieError">
        Silakan pilih salah satu target kalori terlebih dahulu.
    </p>

    <div class="calorie-actions">

        <button type="button"
                class="calorie-back"
                id="calorieBack">
            Kembali
        </button>

        <button type="button"
                class="calorie-next"
                id="calorieNext"
                disabled>
            Lanjut
        </button>

    </div>

</div>
