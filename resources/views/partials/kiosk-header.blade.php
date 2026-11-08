
{{-- HEADER HOTMEAL --}}
<header class="kiosk-header">
    <div>
        <div class="brand">
            <img
                src="{{ asset('images/logo 2.jpg') }}"
                alt="Logo HotMeal"
                class="logo"
            >

            <div>
                <b>HotMeal</b>
                <small>FAST & FRESH KIOSK</small>
            </div>
        </div>

        <div class="header-contact">
            <img
                src="{{ asset('images/icons/icon-call-center.svg') }}"
                alt="Call Center"
                class="header-icon"
            >

            <a href="tel:0778123456"
               style="color:inherit;text-decoration:none">
                Call Center
            </a>
        </div>
    </div>

    <div class="header-info">
        <div class="wifi">
            <img
                src="{{ asset('images/icons/icon-wifi.svg') }}"
                alt="Wi-Fi"
                class="header-icon"
            >

            <span>Wi-Fi Terhubung</span>
        </div>

        <div class="date"></div>
        <div class="header-time"></div>
    </div>
</header>
