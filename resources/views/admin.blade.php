<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            min-height: 100vh;
            margin: 0;
            padding-top: 60px;
            color: #f10909;
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;
        }

        h2, h3 {
            margin: 20px 0;
        }

        .token {
            color: #ffeb3b;
            font-size: 28px;
            font-weight: bold;
        }

        button {
            padding: 12px 30px;
            font-size: 16px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background-color: #ffffff;
            color: #6a11cb;
            font-weight: bold;
        }

        button:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <h1>Admin Dashboard</h1>

    <h2>
        Currently Serving:
        <span class="token">
            {{ $current->token_number ?? 'No one' }}
        </span>
    </h2>

    <form method="POST" action="{{ route('next') }}">
        @csrf
        <button>Next Token</button>
    </form>

    <h3>
        People in Queue:
        {{ $tokens->where('status', 'pending')->count() }}
    </h3>

</body>
</html>
