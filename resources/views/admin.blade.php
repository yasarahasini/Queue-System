<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { text-align: center; font-family: Arial, sans-serif; }
        h1 { color: #333; }
        button { padding: 10px 20px; font-size: 16px; margin-top: 10px; }
        .token { color: red; font-size: 24px; }
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
