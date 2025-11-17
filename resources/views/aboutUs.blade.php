<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Point</title>
    <link rel="icon" href="{{ asset('logos/PawVariation.svg') }}" type="image/svg+xml">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            background: linear-gradient(135deg, #FFFFFF, #FFD6C0);
            position: relative;
        }

        header {
            height: 100vh;
            width: 100vw;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }

        .logo img {
            height: 60px;
            width: auto;
            cursor: pointer;
        }

        .btn-all {
            background-color: #2F98E8;
            border-color: #2F98E8;
            color: #ffffff;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-all:hover {
            background-color: #2380C9;
            transform: translateY(-3px);
        }

        .content {
            position: relative;
            z-index: 5;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #333333;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.25rem;
            }

            p.lead {
                font-size: 1rem;
            }

            .btn-all {
                width: 150px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="Primary Logo">
            </a>
        </div>

        <main class="container content">
            <h1>Welcome to Paw Point</h1>
            <p class="lead">
                Paw Point is a digital booking system designed for feline care services, offering cat owners a convenient way to book boarding, grooming, or other services online. It combines a modern web-based product with personalized care, creating a seamless experience for both customers and staff.
            </p>
            <p class="lead">
                The idea for Paw Point began with a simple, heartfelt frustration: finding reliable care for cats was complicated, time-consuming, and often uncertain. Unlike dogs, cats have unique needs — they require gentleness, patience, and environments where they feel safe. Yet many platforms treated feline care as an afterthought.
            </p>
            <p class="lead">
                The spark came when we realized that cat owners deserved a dedicated space where booking grooming, boarding, and other services could be as simple as one click, while still ensuring quality and trust. It wasn’t just about convenience — it was about peace of mind, knowing that our beloved companions are always cared for with love.
            </p>
            <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap mb-4">
                <a href="/" class="btn btn-all">Return to Home Page</a>

                <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                    <span>
                        <i class="bi bi-envelope-fill text-primary me-1"></i>
                        <a href="mailto:info@pawpoint.com" class="text-decoration-none text-dark">info@pawpoint.com</a>
                    </span>
                    <span>
                        <i class="bi bi-telephone-fill text-success me-1"></i>
                        <a href="tel:+27723456789" class="text-decoration-none text-dark">+27 72 345 6789</a>
                    </span>
                    <span>
                        <i class="bi bi-instagram text-danger me-1"></i>
                        <a href="https://instagram.com/pawpoint" target="_blank" class="text-decoration-none text-dark">@pawpoint</a>
                    </span>
                </div>
            </div>
        </main>
    </header>
</body>

</html>