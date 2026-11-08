
document.addEventListener('DOMContentLoaded', function () {

    // =====================================
    // ELEMENT
    // =====================================

    const popup = document.getElementById('recommendationPopup');

    if (!popup) return;

    const firstStep = document.getElementById('recommendationFirstStep');
    const calorieStep = document.getElementById('calorieStep');
    const nutritionStep = document.getElementById('nutritionStep');
    const allergyStep = document.getElementById('allergyStep');
    const allergyIngredientsStep = document.getElementById('allergyIngredientsStep');

    const yesButton = document.getElementById('recommendationYes');
    const noButton = document.getElementById('recommendationNo');
    const closeButton = document.getElementById('recommendationClose');

    const calorieOptions = popup.querySelectorAll('.calorie-option');
    const calorieNext = document.getElementById('calorieNext');
    const calorieBack = document.getElementById('calorieBack');
    const calorieError = document.getElementById('calorieError');

    const nutritionOptions = popup.querySelectorAll('.nutrition-option');
    const nutritionNext = document.getElementById('nutritionNext');
    const nutritionBack = document.getElementById('nutritionBack');
    const nutritionError = document.getElementById('nutritionError');

    const allergyOptions = popup.querySelectorAll('.allergy-option');
    const allergyNext = document.getElementById('allergyNext');
    const allergyBack = document.getElementById('allergyBack');
    const allergyError = document.getElementById('allergyError');

    const ingredientOptions = popup.querySelectorAll('.ingredient-option');
    const ingredientBack = document.getElementById('ingredientBack');
    const ingredientSave = document.getElementById('ingredientSave');
    const ingredientError = document.getElementById('ingredientError');
    const ingredientSelectedInfo = document.getElementById('ingredientSelectedInfo');

    const recommendationLoadingPage = document.getElementById('recommendationLoadingPage');

    // =====================================
    // STATE
    // =====================================

    const INACTIVITY_TIME = 30000;

    let inactivityTimer = null;
    let popupAlreadyShown = false;

    let selectedCalorie = '';
    let selectedNutrition = '';
    let selectedAllergy = '';
    let selectedIngredients = [];

    // =====================================
    // POP-UP
    // =====================================

    function showRecommendationPopup() {

        if (popupAlreadyShown) return;

        popupAlreadyShown = true;

        clearTimeout(inactivityTimer);

        popup.classList.add('show');
        popup.setAttribute('aria-hidden', 'false');

        document.body.classList.add('modal-open');
    }

    function closeRecommendationPopup() {

        popup.classList.remove('show');
        popup.setAttribute('aria-hidden', 'true');

        document.body.classList.remove('modal-open');
    }

    // =====================================
// TAMPILKAN HALAMAN LOADING
// =====================================

function showRecommendationLoading() {

    closeRecommendationPopup();

    if (recommendationLoadingPage) {
        recommendationLoadingPage.style.display = 'flex';
        document.body.classList.add('modal-open');
    }

    // Tampilkan hasil simulasi setelah 3 detik
    setTimeout(function () {

        if (recommendationLoadingPage) {
            recommendationLoadingPage.style.display = 'none';
        }

        showRecommendationResul(true); // Ganti true dengan false jika tidak ada rekomendasi

    }, 3000);

}
// =====================================
// TAMPILKAN HASIL REKOMENDASI
// =====================================

function showRecommendationResult(hasRecommendation) {

    const successPage = document.getElementById('recommendationSuccessPage');
    const emptyPage = document.getElementById('recommendationEmptyPage');

    // Sembunyikan kedua halaman hasil terlebih dahulu
    successPage.style.display = 'none';
    emptyPage.style.display = 'none';

    if (hasRecommendation) {

        successPage.style.display = 'block';

        // Tampilkan ringkasan preferensi
        document.getElementById('resultCalorie').textContent =
            sessionStorage.getItem('hotmeal_target_calorie') || '-';

        document.getElementById('resultNutrition').textContent =
            sessionStorage.getItem('hotmeal_priority_nutrition') || '-';

        const allergy = sessionStorage.getItem('hotmeal_has_allergy');

        document.getElementById('resultAllergy').textContent =
            allergy === 'Ya'
                ? JSON.parse(sessionStorage.getItem('hotmeal_allergy_ingredients') || '[]').join(', ')
                : 'Tidak ada';

    } else {

        emptyPage.style.display = 'flex';

    }

}
// =====================================
// ULANGI PREFERENSI
// =====================================

function repeatRecommendation() {

    document.getElementById('recommendationSuccessPage').style.display = 'none';
    document.getElementById('recommendationEmptyPage').style.display = 'none';

    selectedCalorie = '';
    selectedNutrition = '';
    selectedAllergy = '';
    selectedIngredients = [];

    // Hapus data preferensi sebelumnya
    sessionStorage.removeItem('hotmeal_target_calorie');
    sessionStorage.removeItem('hotmeal_priority_nutrition');
    sessionStorage.removeItem('hotmeal_has_allergy');
    sessionStorage.removeItem('hotmeal_allergy_ingredients');

    // Reset pilihan visual
    popup.querySelectorAll('.calorie-option, .nutrition-option, .allergy-option, .ingredient-option')
        .forEach(function (option) {
            option.classList.remove('selected');
        });

    calorieNext.disabled = true;
    nutritionNext.disabled = true;
    allergyNext.disabled = true;

    firstStep.style.display = 'block';
    calorieStep.style.display = 'none';
    nutritionStep.style.display = 'none';
    allergyStep.style.display = 'none';
    allergyIngredientsStep.style.display = 'none';

    popupAlreadyShown = true;

    popup.classList.add('show');
    popup.setAttribute('aria-hidden', 'false');

    document.body.classList.add('modal-open');

}

document.getElementById('recommendationRepeatButton')
    .addEventListener('click', repeatRecommendation);

document.getElementById('emptyRepeatButton')
    .addEventListener('click', repeatRecommendation);

// =====================================
// KEMBALI KE KATALOG
// =====================================

document.getElementById('emptyCatalogButton')
    .addEventListener('click', function () {

        window.location.href = '/products';

    });

    // =====================================
    // TIMER 30 DETIK TANPA AKTIVITAS
    // =====================================

    function resetInactivityTimer() {

        if (popupAlreadyShown) return;

        clearTimeout(inactivityTimer);

        inactivityTimer = setTimeout(function () {
            showRecommendationPopup();
        }, INACTIVITY_TIME);
    }

    const activityEvents = [
        'pointerdown',
        'keydown',
        'wheel',
        'scroll',
        'input',
        'change'
    ];

    activityEvents.forEach(function (eventName) {

        document.addEventListener(
            eventName,
            resetInactivityTimer,
            { passive: true }
        );

    });

    // =====================================
    // HALAMAN PERTAMA
    // =====================================

    yesButton.addEventListener('click', function () {

        firstStep.style.display = 'none';
        calorieStep.style.display = 'block';

    });

    noButton.addEventListener('click', function () {
        closeRecommendationPopup();
    });

    closeButton.addEventListener('click', function () {
        closeRecommendationPopup();
    });

    // =====================================
    // HALAMAN KEDUA - TARGET KALORI
    // =====================================

    calorieOptions.forEach(function (option) {

        option.addEventListener('click', function () {

            calorieOptions.forEach(function (item) {
                item.classList.remove('selected');
            });

            option.classList.add('selected');

            selectedCalorie = option.dataset.calorie;

            calorieNext.disabled = false;

            calorieError.classList.remove('show');

        });

    });

    calorieBack.addEventListener('click', function () {

        calorieStep.style.display = 'none';
        firstStep.style.display = 'block';

    });

    calorieNext.addEventListener('click', function () {

        if (!selectedCalorie) {
            calorieError.classList.add('show');
            return;
        }

        sessionStorage.setItem(
            'hotmeal_target_calorie',
            selectedCalorie
        );

        calorieStep.style.display = 'none';
        nutritionStep.style.display = 'block';

    });

    // =====================================
    // HALAMAN KETIGA - PRIORITAS NUTRISI
    // =====================================

    nutritionOptions.forEach(function (option) {

        option.addEventListener('click', function () {

            nutritionOptions.forEach(function (item) {
                item.classList.remove('selected');
            });

            option.classList.add('selected');

            selectedNutrition = option.dataset.nutrition;

            nutritionNext.disabled = false;

            nutritionError.classList.remove('show');

        });

    });

    nutritionBack.addEventListener('click', function () {

        nutritionStep.style.display = 'none';
        calorieStep.style.display = 'block';

    });

nutritionNext.addEventListener('click', function () {

    if (!selectedNutrition) {
        nutritionError.classList.add('show');
        return;
    }

    sessionStorage.setItem(
        'hotmeal_priority_nutrition',
        selectedNutrition
    );

    nutritionStep.style.display = 'none';
    allergyStep.style.display = 'block';

    });

    // =====================================
// HALAMAN KEEMPAT - KONFIRMASI ALERGI
// =====================================

allergyOptions.forEach(function (option) {

    option.addEventListener('click', function () {

        allergyOptions.forEach(function (item) {
            item.classList.remove('selected');
        });

        option.classList.add('selected');

        selectedAllergy = option.dataset.allergy;

        allergyNext.disabled = false;
        allergyError.classList.remove('show');

    });

});

// Kembali ke halaman prioritas nutrisi
allergyBack.addEventListener('click', function () {

    allergyStep.style.display = 'none';
    nutritionStep.style.display = 'block';

});

// Lanjut berdasarkan jawaban alergi


allergyNext.addEventListener('click', function () {

    if (!selectedAllergy) {
        allergyError.classList.add('show');
        return;
    }

    sessionStorage.setItem(
        'hotmeal_has_allergy',
        selectedAllergy
    );

    allergyStep.style.display = 'none';

    if (selectedAllergy === 'Ya') {

        allergyIngredientsStep.style.display = 'block';

    } else {

        selectedIngredients = [];

        sessionStorage.setItem(
            'hotmeal_allergy_ingredients',
            JSON.stringify([])
        );

        showRecommendationLoading();

    }

});

// =====================================
// HALAMAN KELIMA - PILIH BAHAN ALERGI
// =====================================

// Pilih beberapa bahan makanan
ingredientOptions.forEach(function (option) {

    option.addEventListener('click', function () {

        const ingredient = option.dataset.ingredient;

        if (selectedIngredients.includes(ingredient)) {

            selectedIngredients = selectedIngredients.filter(function (item) {
                return item !== ingredient;
            });

            option.classList.remove('selected');

        } else {

            selectedIngredients.push(ingredient);
            option.classList.add('selected');

        }

        ingredientSelectedInfo.textContent =
            selectedIngredients.length > 0
                ? selectedIngredients.length + ' bahan dipilih: ' + selectedIngredients.join(', ')
                : 'Belum ada bahan yang dipilih.';

        ingredientError.classList.remove('show');

    });

});

// Kembali ke pertanyaan alergi
ingredientBack.addEventListener('click', function () {

    allergyIngredientsStep.style.display = 'none';
    allergyStep.style.display = 'block';

});

// Simpan pilihan bahan alergi

ingredientSave.addEventListener('click', function () {

    if (selectedIngredients.length === 0) {
        ingredientError.classList.add('show');
        return;
    }

    sessionStorage.setItem(
        'hotmeal_allergy_ingredients',
        JSON.stringify(selectedIngredients)
    );

    showRecommendationLoading();

});

// =====================================
// PILIH MAKANAN DARI HASIL REKOMENDASI
// =====================================

document.querySelectorAll('.recommendation-select-button')
    .forEach(function (button) {

        button.addEventListener('click', function () {

            const productId = this.dataset.productId;

            if (!productId) {
                return;
            }

            window.location.href = `/products/${productId}`;

        });

    });
    
    // =====================================
    // MULAI TIMER
    // =====================================

    resetInactivityTimer();

});
