<!DOCTYPE html>
<html>
<head>
    <title>Queue System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #b3bbde;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 40px 60px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            margin-bottom: 10px;
            font-size: 32px;
            color: #206ad2;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #718093;
        }

        .token-number {
            font-size: 48px;
            font-weight: bold;
            color: #e84118;
            margin: 20px 0;
        }

        .success-message {
            color: #44bd32;
            margin-bottom: 20px;
            font-weight: 500;
        }

        button {
            background-color: #0097e6;
            color: #ffffff;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #00a8ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Queue System</h1>
        <h2>Currently Serving</h2>
        <div class="token-number">
            {{ $serving->token_number ?? '—' }}
        </div>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('generate') }}">
            @csrf
            <button type="submit">Get a Token</button>
        </form>
    </div>
</body>
</html>
