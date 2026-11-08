
{{-- HALAMAN 6: LOADING REKOMENDASI AI --}}
<div class="recommendation-loading-page" id="recommendationLoadingPage" style="display: none;">

@include('partials.kiosk-header')

    <div class="recommendation-loading-content">

        <div class="recommendation-loading-animation">
            <div class="loading-circle"></div>
            <span class="loading-icon">🍜</span>
        </div>

        <h1>Menyiapkan Rekomendasi</h1>

        <p>
            Kami sedang mencarikan makanan yang sesuai dengan
            kebutuhan nutrisi dan preferensimu.
        </p>

        <div class="loading-progress">
            <div class="loading-progress-bar"></div>
        </div>

        <span class="loading-caption">
            AI sedang menganalisis preferensimu...
        </span>

    </div>

</div>
