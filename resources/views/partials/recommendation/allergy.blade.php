
{{-- HALAMAN 4: KONFIRMASI ALERGI --}}
<div class="allergy-step" id="allergyStep" style="display:none;">

    <span class="recommendation-label">
        HOTMEAL SMART ASSISTANT · 04
    </span>

    <div class="allergy-icon">
        <span>⚠️</span>
    </div>

    <h2>Apakah Kamu Memiliki Alergi Makanan?</h2>

    <p class="allergy-description">
        Kami ingin memastikan makanan yang direkomendasikan
        sesuai dengan kebutuhan dan kondisi kamu.
    </p>

    <div class="allergy-question">
        <span>🥜</span>
        <b>
            Apakah ada bahan makanan tertentu yang perlu kamu hindari?
        </b>
    </div>

    <div class="allergy-options">

        <button type="button"
                class="allergy-option"
                data-allergy="Tidak">
            <span>😊</span>
            <b>Tidak, saya tidak memiliki alergi</b>
        </button>

        <button type="button"
                class="allergy-option"
                data-allergy="Ya">
            <span>⚠️</span>
            <b>Ya, saya memiliki alergi</b>
        </button>

    </div>

    <p class="allergy-error" id="allergyError">
        Silakan pilih salah satu jawaban terlebih dahulu.
    </p>

    <div class="allergy-actions">

        <button type="button"
                class="allergy-back"
                id="allergyBack">
            Kembali
        </button>

        <button type="button"
                class="allergy-next"
                id="allergyNext"
                disabled>
            Lanjut
        </button>

    </div>

</div>
