
{{-- HALAMAN 7: HASIL REKOMENDASI AI --}}
<div class="recommendation-success-page" id="recommendationSuccessPage" style="display: none;">

@include('partials.kiosk-header')

    <div class="recommendation-result-container">

        {{-- HEADER --}}
        <div class="recommendation-result-header">
            <span class="recommendation-result-label">✨ REKOMENDASI AI</span>

            <h1>Rekomendasi Makanan Untukmu</h1>

            <p>
                Berikut pilihan makanan yang sesuai dengan preferensi
                nutrisi dan kebutuhanmu.
            </p>
        </div>

        {{-- RINGKASAN PREFERENSI --}}
        <div class="recommendation-preference-summary">
            <div>
                <span>Target Kalori</span>
                <strong id="resultCalorie">-</strong>
            </div>

            <div>
                <span>Prioritas Nutrisi</span>
                <strong id="resultNutrition">-</strong>
            </div>

            <div>
                <span>Alergi</span>
                <strong id="resultAllergy">-</strong>
            </div>
        </div>

        {{-- DAFTAR MAKANAN --}}
        <div class="recommendation-result-list">

            {{-- PRODUK 1 --}}
            <div class="recommendation-food-card">

                <div class="recommendation-food-image">
                    <img src="https://www.finnafood.com/blog/wp-content/uploads/2024/07/resep-mie-tarempa.jpg"
                         alt="Mie Tarempa">
                    <span class="recommendation-food-badge">Pilihan Utama</span>
                </div>

                <div class="recommendation-food-info">
                    <h3>Mie Tarempa</h3>

                    <p class="recommendation-food-description">
                        Mie khas Tarempa dengan cita rasa gurih dan lezat.
                    </p>

                    <div class="recommendation-food-nutrition">
                        <span>🔥 450 kkal</span>
                        <span>💪 Protein 18 g</span>
                        <span>🍚 Karbohidrat 65 g</span>
                    </div>

                    <div class="recommendation-food-bottom">
                        <strong>Rp23.000</strong>

                        <button type="button"
                                class="recommendation-select-button"
                                data-product-id="1">
                            Pilih Makanan
                        </button>
                    </div>
                </div>

            </div>

            {{-- PRODUK 2 --}}
            <div class="recommendation-food-card">

                <div class="recommendation-food-image">
                    <img src="https://i0.wp.com/resepkoki.id/wp-content/uploads/2021/03/Resep-Mie-Tarempa.jpg?fit=996%2C1328&ssl=1"
                         alt="Mie Tarempa Ayam">

                </div>

                <div class="recommendation-food-info">
                    <h3>Mie Tarempa Ayam</h3>

                    <p class="recommendation-food-description">
                        Mie Tarempa dengan tambahan ayam sebagai sumber protein.
                    </p>

                    <div class="recommendation-food-nutrition">
                        <span>🔥 520 kkal</span>
                        <span>💪 Protein 25 g</span>
                        <span>🍚 Karbohidrat 68 g</span>
                    </div>

                    <div class="recommendation-food-bottom">
                        <strong>Rp25.000</strong>

                        <button type="button"
                                class="recommendation-select-button"
                                data-product-id="2">
                            Pilih Makanan
                        </button>
                    </div>
                </div>

            </div>

            {{-- PRODUK 3 --}}
            <div class="recommendation-food-card">

                <div class="recommendation-food-image">
                    <img src="https://assets-a1.kompasiana.com/items/album/2019/07/12/img-3773-jpg-5d276be4097f361dce2245b2.jpg"
                         alt="Mie Tarempa Sapi">
                </div>

                <div class="recommendation-food-info">
                    <h3>Mie Tarempa Sapi</h3>

                    <p class="recommendation-food-description">
                        Mie Tarempa dengan kombinasi bahan pilihan.
                    </p>

                    <div class="recommendation-food-nutrition">
                        <span>🔥 580 kkal</span>
                        <span>💪 Protein 28 g</span>
                        <span>🍚 Karbohidrat 72 g</span>
                    </div>

                    <div class="recommendation-food-bottom">
                        <strong>Rp28.000</strong>

                        <button type="button"
                                class="recommendation-select-button"
                                data-product-id="3">
                            Pilih Makanan
                        </button>
                    </div>
                </div>

            </div>

        </div>

        {{-- TOMBOL KEMBALI --}}
        <div class="recommendation-result-footer">
            <button type="button" id="recommendationRepeatButton">
                Ulangi Preferensi
            </button>
        </div>

    </div>

</div>
