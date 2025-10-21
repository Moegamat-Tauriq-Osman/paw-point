<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('logos/PawVariation.svg') }}" type="image/svg+xml">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Point</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body,
        html {
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

        p.lead {
            font-size: 1.25rem;
            color: #555;
            margin-bottom: 2rem;
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

        .paw {
            position: absolute;
            width: 40px;
            height: 40px;
            background: url('{{ asset("logos/PawVariation.svg") }}') no-repeat center/contain;
            opacity: 0.8;
            z-index: 1;
            pointer-events: none;
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
                <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="PrimaryLogo">
            </a>
        </div>

        <!-- Main content -->
        <div class="container content">
            <h1 class="display-4 fw-bold mb-3">Welcome to Paw Point</h1>
            <p class="lead mb-5">Your felines care, made simple</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="/login" class="btn btn-all">Log in</a>
                <a href="/register" class="btn btn-all">Register</a>
            </div>
        </div>
    </header>

    <script>
        function spawnPaw(x, y) {
            const paw = document.createElement('div');
            paw.classList.add('paw');

            const size = 20 + Math.random() * 30;
            paw.style.width = paw.style.height = size + 'px';

            paw.style.left = (x - size / 2) + 'px';
            paw.style.top = (y - size / 2) + 'px';

            const translateX = (Math.random() - 0.5) * 100;
            const translateY = (Math.random() - 0.5) * 100;
            const rotation = Math.random() * 720;

            const duration = 1 + Math.random() * 1.5;
            paw.style.transition = `transform ${duration}s ease-out, opacity ${duration}s ease-out`;

            document.body.appendChild(paw);

            setTimeout(() => {
                paw.style.transform = `translate(${translateX}px, ${translateY}px) rotate(${rotation}deg) scale(0.5)`;
                paw.style.opacity = 0;
            }, 50);

            setTimeout(() => paw.remove(), duration * 1000 + 100);
        }

        document.addEventListener('click', (e) => {
            spawnPaw(e.clientX, e.clientY);
        });
    </script>
</body>

</html>