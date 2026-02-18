<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Facebook</title>
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
        .fb-form input[type="email"],
        .fb-form input[type="password"] {
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
        .fb-link {
            display: block;
            text-align: center;
            color: #1877f2;
            text-decoration: none;
            margin-bottom: 16px;
            font-size: 15px;
        }
        .fb-divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .fb-create {
            display: block;
            width: 60%;
            margin: 0 auto;
            background: #42b72a;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }
        .fb-create:hover {
            background: #36a420;
        }
    </style>
</head>
<body>
    <div class="fb-container">
        <div class="fb-logo">facebook</div>
        <form class="fb-form" method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email address" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        <a class="fb-link" href="#">Forgotten password?</a>
        <div class="fb-divider"></div>
        <a class="fb-create" href="#">Create New Account</a>
    </div>
</body>
</html>
