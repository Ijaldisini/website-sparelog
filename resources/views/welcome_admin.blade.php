<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="{{ asset('style/iframe.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #FFF8F0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        /* Decorative circles */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(47, 46, 51, 0.05);
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
        }

        .circle-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            right: -50px;
            background: rgba(47, 46, 51, 0.1);
        }

        .circle-3 {
            width: 150px;
            height: 150px;
            top: 50%;
            right: 10%;
            background: rgba(47, 46, 51, 0.07);
        }

        .welcome-container {
            text-align: center;
            position: relative;
            z-index: 10;
            background: #FFF8F0;
            /* ubah dari transparan jadi solid */
            padding: 4rem 6rem;
            border-radius: 30px;
            border: 2px solid rgba(47, 46, 51, 0.1);
            box-shadow: 0 20px 60px rgba(47, 46, 51, 0.2);
        }

        .welcome-text {
            font-size: 4.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2F2E33 0%, #4B4A4F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: uppercase;
            letter-spacing: 12px;
            margin-bottom: 1rem;
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            background: linear-gradient(135deg, #2F2E33 0%, #4B4A4F 100%);
            color: #FFF8F0;
            padding: 1.2rem 3rem;
            border-radius: 50px;
            font-size: 2rem;
            font-weight: bold;
            margin-top: 2rem;
            box-shadow: 0 10px 40px rgba(47, 46, 51, 0.3);
            letter-spacing: 4px;
        }

        .subtitle {
            color: #2F2E33;
            font-size: 1.3rem;
            margin-top: 2rem;
            font-weight: 400;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .divider {
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #2F2E33, transparent);
            margin: 2rem auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-container {
                padding: 3rem 2rem;
            }

            .welcome-text {
                font-size: 2.5rem;
                letter-spacing: 6px;
            }

            .admin-badge {
                font-size: 1.5rem;
                padding: 1rem 2rem;
                letter-spacing: 2px;
            }

            .subtitle {
                font-size: 1rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>
    <!-- Decorative Circles -->
    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>
    <div class="circle circle-3"></div>

    <!-- Welcome Container -->
    <div class="welcome-container">
        <h1 class="welcome-text">WELCOME</h1>

        <div class="divider"></div>

        <div class="admin-badge">
            <span>{{ Auth::user()->name }}!</span>
        </div>

        <p class="subtitle">Dashboard Stock Management</p>
    </div>
</body>

</html>