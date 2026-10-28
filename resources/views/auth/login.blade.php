
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login TAREMPA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kiosk-10inch.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff7ec;
            margin: 0;
        }

        .login-box {
            background: white;
            width: 500px;
            padding: 45px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);

            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #444;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }

        input:focus {
            border-color: #f28c28;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #f28c28;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #df7818;
        }

        .footer {
            text-align: center;
            margin-top: 18px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login TAREMPA</h2>

        
<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <label for="email">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        placeholder="Masukkan email"
        value="{{ old('email') }}"
        required
    >

    <label for="password">Password</label>
    <input
        type="password"
        id="password"
        name="password"
        placeholder="Masukkan password"
        required
    >

    @if ($errors->any())
        <p style="color: red; font-size: 14px;">
            {{ $errors->first() }}
        </p>
    @endif

    <button type="submit">Login</button>
</form>
        <div class="footer">
            Vending Machine System
        </div>
    </div>
    <script src="{{ asset('js/kiosk-viewport.js') }}"></script>
</body>
</html>