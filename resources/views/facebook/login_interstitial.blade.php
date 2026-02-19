<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Roboto', Arial, sans-serif; }
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .message-box {
            background: #fff;
            padding: 32px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.13);
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        .subtext {
            font-size: 16px;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="centered">
        <div class="message-box">
            Oops, login to continue...<br><br>
            <span class="subtext">Redirecting to login page</span>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('facebook.login') }}";
        }, 1500);
    </script>
</body>
</html>
