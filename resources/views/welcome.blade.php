<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Point</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
            color: #ffffff;
        }

        header {
            height: 100vh;
            background: url('/background.jpg') no-repeat center center/cover;
            position: relative;
            
        }

        header::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: #00000080;
            z-index: 1;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 3;
        }

        .logo img {
            height: 60px;
            width: auto;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-all {
            background-color: #2F98E8;
            border-color: #2F98E8;
            color: #ffffff;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
        }

        .btn-all:hover {
            background-color: #2380C9;
            border-color: #2380C9;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="PrimaryLogo" style="height: 40px;">
        </div>

        <div class="container content">
            <h1 class="display-4 fw-bold mb-3">Welcome to Paw Point</h1>
            <p class="lead mb-5">Your felines care, made simple</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/login" class="btn btn-all">Log in</a>
                <a href="/register" class="btn btn-all">Register</a>
            </div>
        </div>
    </header>

</body>
</html>
