
{{-- HALAMAN 8: REKOMENDASI TIDAK DITEMUKAN --}}
<div class="recommendation-empty-page" id="recommendationEmptyPage" style="display: none;">

@include('partials.kiosk-header')

    <div class="recommendation-empty-content">

        <div class="recommendation-empty-icon">
            <span>🍽️</span>
        </div>

        <span class="recommendation-empty-label">
            REKOMENDASI AI
        </span>

        <h1>Maaf, Rekomendasi Belum Ditemukan</h1>

        <p>
            Saat ini belum ada makanan yang sesuai dengan preferensi
            nutrisi dan kebutuhanmu.
        </p>

        <div class="recommendation-empty-info">
            <span>💡</span>
            <p>
                Coba ubah target kalori, prioritas nutrisi,
                atau pilihan bahan alergimu.
            </p>
        </div>

        <div class="recommendation-empty-actions">

            <button type="button" id="emptyRepeatButton">
                Ulangi Preferensi
            </button>

            <button type="button" id="emptyCatalogButton">
                Lihat Semua Menu
            </button>

        </div>

    </div>

</div>
