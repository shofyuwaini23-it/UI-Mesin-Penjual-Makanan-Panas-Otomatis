
{{-- POP-UP UTAMA REKOMENDASI AI --}}
<div class="recommendation-overlay"
     id="recommendationPopup"
     aria-hidden="true">

    <div class="recommendation-modal"
         role="dialog"
         aria-modal="true"
         aria-labelledby="recommendationTitle">

        {{-- HALAMAN 1: PERTANYAAN AWAL --}}
        <div class="recommendation-content" id="recommendationFirstStep">

            <div class="recommendation-icon">
                <span>🍜</span>
            </div>

            <span class="recommendation-label">
                HOTMEAL SMART ASSISTANT
            </span>

            <h2 id="recommendationTitle">
                Masih Bingung Memilih Menu?
            </h2>

            <p>
                Tenang, kami bisa membantu kamu menemukan
                makanan yang sesuai dengan kebutuhan dan
                selera kamu!
            </p>

            <div class="recommendation-question">
                <span>✨</span>
                <b>Ingin mendapatkan rekomendasi makanan dari kami?</b>
            </div>

            <div class="recommendation-actions">
                <button type="button"
                        class="recommendation-btn recommendation-yes"
                        id="recommendationYes">
                    Iya, bantu saya
                </button>

                <button type="button"
                        class="recommendation-btn recommendation-no"
                        id="recommendationNo">
                    Tidak, saya pilih sendiri
                </button>
            </div>

        </div>

        {{-- HALAMAN 2: TARGET KALORI --}}
        @include('partials.recommendation.calorie')

        {{-- HALAMAN 3: PRIORITAS NUTRISI --}}
        @include('partials.recommendation.nutrition')
        
        {{-- HALAMAN 4: ALERGI MAKANAN --}}
        @include('partials.recommendation.allergy')

        {{-- HALAMAN 5: PILIH BAHAN ALERGI --}}
        @include('partials.recommendation.allergy-ingredients')

        {{-- TOMBOL TUTUP --}}
        <button type="button"
                class="recommendation-close"
                id="recommendationClose"
                aria-label="Tutup pop-up">
            &times;
        </button>

    </div>
</div>
