(() => {
    const WIDTH = 746;
    const HEIGHT = 1280;

    function setupKiosk() {
        // Hindari membuat kanvas dua kali
        if (document.querySelector(".kiosk-stage")) {
            resizeKiosk();
            return;
        }

        const stage = document.createElement("div");
        stage.className = "kiosk-stage";

        const screen = document.createElement("div");
        screen.className = "kiosk-screen";

        // Pindahkan isi halaman ke dalam kanvas,
        // kecuali script agar fungsi JavaScript tetap berjalan.
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

        stage.appendChild(screen);
        document.body.appendChild(stage);

        window.resizeKiosk = function () {
            const scaleX = window.innerWidth / WIDTH;
            const scaleY = window.innerHeight / HEIGHT;

            // Selalu tampilkan seluruh kanvas tanpa terpotong
            const scale = Math.min(scaleX, scaleY);

            screen.style.transform =
                `translate(-50%, -50%) scale(${scale})`;
        };

        resizeKiosk();
        window.addEventListener("resize", resizeKiosk);
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", setupKiosk);
    } else {
        setupKiosk();
    }
})();