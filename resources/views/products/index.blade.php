
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HotMeal - Fast & Fresh Kiosk</title>

    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/recommendation.css') }}">
</head>

<body>

    {{-- KATALOG --}}
    @include('partials.catalog')

    {{-- TANGGAL DAN WAKTU --}}
    <script>
       
function updateClock() {
    const now = new Date();

    const dateText = now.toLocaleDateString('id-ID', {
        timeZone: 'Asia/Jakarta',
        weekday: 'short',
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });

    const timeText = now.toLocaleTimeString('id-ID', {
        timeZone: 'Asia/Jakarta',
        hour: '2-digit',
        minute: '2-digit'
    }) + ' WIB';

    document.querySelectorAll('.kiosk-header .date')
        .forEach(element => {
            element.textContent = dateText;
        });

    document.querySelectorAll('.kiosk-header .header-time')
        .forEach(element => {
            element.textContent = timeText;
        });
}

updateClock();
setInterval(updateClock, 60000);
    </script>

    <script src="{{ asset('js/recommendation.js') }}"></script>

    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>

</body>
</html>
