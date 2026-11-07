
/* =========================================
   TAREMPA - KIOSK VIEWPORT 10 INCH
========================================= */

(() => {

    const WIDTH = 746;
    const HEIGHT = 1280;

    function setupKiosk() {

        // Hindari membuat kanvas dua kali
        if (document.querySelector(".kiosk-stage")) {
            window.resizeKiosk?.();
            return;
        }

        // Buat pembungkus
        const stage = document.createElement("div");
        stage.className = "kiosk-stage";

        // Buat kanvas kiosk
        const screen = document.createElement("div");
        screen.className = "kiosk-screen";

        // Pindahkan seluruh isi body ke dalam kanvas.
        // Script tetap berada di body agar tetap berjalan.
        const nodes = Array.from(document.body.childNodes);

        nodes.forEach((node) => {

            if (
                node.nodeType === Node.ELEMENT_NODE &&
                node.tagName === "SCRIPT"
            ) {
                return;
            }

            screen.appendChild(node);

        });

        // Susun kanvas
        stage.appendChild(screen);
        document.body.appendChild(stage);

        // Atur skala berdasarkan ukuran layar
        window.resizeKiosk = function () {

            const scaleX = window.innerWidth / WIDTH;
            const scaleY = window.innerHeight / HEIGHT;

            // Pertahankan seluruh ukuran kanvas
            const scale = Math.min(scaleX, scaleY);

            screen.style.transform =
                `translate(-50%, -50%) scale(${scale})`;

        };

        // Jalankan pertama kali
        window.resizeKiosk();

        // Sesuaikan ketika ukuran browser berubah
        window.addEventListener("resize", window.resizeKiosk);

    }

    // Pastikan DOM sudah siap
    if (document.readyState === "loading") {

        document.addEventListener(
            "DOMContentLoaded",
            setupKiosk
        );

    } else {

        setupKiosk();

    }

})();
