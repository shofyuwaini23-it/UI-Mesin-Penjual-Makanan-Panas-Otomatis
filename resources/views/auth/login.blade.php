<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Login Vending Machine</h1>

        <form action="{{ route('login.process') }}" method="POST" style="text-align: center;">
            @csrf

            <label>Email</label>
            <input type="email" name="email" required>

            <br><br>

            <label>Password</label>
            <input type="password" name="password" required>

            <br><br>

            <button type="submit">Login</button>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Display error message if it exists
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
</body>
</html>