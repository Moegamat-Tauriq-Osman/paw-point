<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('logos/PawVariation.svg') }}" type="image/svg+xml">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Paw Point') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            background-color: #ffffff;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
        }

        .fw-semibold {
            font-weight: 700;
        }

        .btn-all {
            background-color: #2F98E8;
            border-color: #2F98E8;
            color: #ffffff;
        }

        .desktop-sidebar {
            display: flex;
            width: 366px;
            height: 100vh;
            background-color: #2F98E8;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
        }

        .sidebar-header {
            height: 81px;
            border-bottom: 1.25px solid #2F98E8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-title {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            line-height: 32px;
        }

        .nav-container {
            padding: 24px;
            flex: 1;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .nav-item {
            display: flex;
            width: 100%;
            height: 48px;
            border-radius: 8px;
            align-items: center;
            padding: 0 16px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .nav-item:hover {
            background-color: #2F51E8;
            color: white;
            text-decoration: none;
        }

        .nav-item.active {
            background-color: #2F51E8;
        }

        .logout-container {
            padding: 0 24px 24px 24px;
        }

        .logout-button {
            width: 100%;
            height: 48px;
            background-color: #2F51E8;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #2F98E8;
        }

        .main-content {
            margin-left: 366px;
            min-height: 100vh;
        }

        .main-header {
            height: 81px;
            border-bottom: 1px solid #ffffff;
            display: flex;
            align-items: center;
            padding: 0 32px;
            background-color: #ffffff;
        }

        .page-title {
            color: #333333;
            font-size: 24px;
            font-weight: 700;
            line-height: 32px;
        }

        .page-content {
            padding: 32px;
        }

        .menu-icon,
        .close-icon {
            width: 24px;
            height: 24px;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .close-icon {
            display: none;
        }

        .mobile-menu-button {
            display: none;
            position: fixed;
            top: 16px;
            left: 16px;
            z-index: 60;
            background-color: #2F98E8;
            color: #ffffff;
            padding: 8px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }

        .mobile-sidebar {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 55;
            transition: opacity 0.3s ease;
            opacity: 0;
            pointer-events: none;
        }

        .mobile-sidebar.open {
            opacity: 1;
            pointer-events: auto;
        }

        .mobile-backdrop {
            position: absolute;
            inset: 0;
            background-color: #333333;
        }

        .mobile-menu-panel {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 280px;
            background-color: #2F98E8;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            transform: translateX(-100%);
        }

        .mobile-sidebar.open .mobile-menu-panel {
            transform: translateX(0);
        }

        .mobile-nav-container {
            padding: 16px;
            flex: 1;
        }

        .mobile-nav-menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .mobile-logout-container {
            padding: 0 16px 24px 16px;
        }

        @media (max-width: 768px) {
            .mobile-menu-button {
                display: block;
            }

            .desktop-sidebar {
                display: none;
            }

            .mobile-sidebar {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }

            .main-header {
                padding-left: 64px;
            }

            .content-area {
                padding: 32px;
            }
        }
    </style>

</head>

<!-- mbl menu -->

<body>
    <button class="mobile-menu-button" onclick="toggleMobileMenu()">
        <svg class="menu-icon" viewBox="0 0 24 24">
            <line x1="4" x2="20" y1="6" y2="6" />
            <line x1="4" x2="20" y1="12" y2="12" />
            <line x1="4" x2="20" y1="18" y2="18" />
        </svg>
        <svg class="close-icon" viewBox="0 0 24 24">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
        </svg>
    </button>

    <!-- dsk menu -->
    <div class="desktop-sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="PrimaryLogo" style="height: 40px;">
        </div>
        <div class="nav-container">
            <nav class="nav-menu">
                @auth
                <!-- nav links for roles menu -->
                @if(Auth::user()->role === 'Admin')
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-item {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">Bookings</a>
                <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
                <a href="{{ route('admin.staff.index') }}" class="nav-item {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">Staff</a>
                @elseif(Auth::user()->role === 'Staff')
                <a href="{{ route('staff.dashboard') }}" class="nav-item {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">Bookings</a>
                @elseif(Auth::user()->role === 'User')
                <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('bookings.index') }}" class="nav-item {{ request()->routeIs('bookings.index') ? 'active' : '' }}">My Bookings</a>
                <a href="{{ route('bookings.create') }}" class="nav-item {{ request()->routeIs('bookings.create') ? 'active' : '' }}">Create a booking</a>
                <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">Profile</a>

                @endif
                @endauth
            </nav>
        </div>

        <!-- logout  -->
        <div class="logout-container">
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-button">Logout</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="logout-button">Login</a>
            <a href="{{ route('register') }}" class="logout-button mt-2">Register</a>
            @endauth
        </div>
    </div>

    <!-- mbl menu -->
    <div class="mobile-sidebar" id="mobile-menu">
        <div class="mobile-backdrop" onclick="toggleMobileMenu()"></div>
        <div class="mobile-menu-panel">
            <div class="sidebar-header">
                <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="PrimaryLogo" style="height: 30px;">
            </div>
            <div class="mobile-nav-container">
                <nav class="mobile-nav-menu">
                    @auth
                    @if(Auth::user()->role === 'Admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.bookings.index') }}" class="nav-item {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">Bookings</a>
                    <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('admin.staff.index') }}" class="nav-item {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">Staff</a>
                    @elseif(Auth::user()->role === 'Staff')
                    <a href="{{ route('staff.dashboard') }}" class="nav-item {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">Dashboard</a>
                    @elseif(Auth::user()->role === 'User')
                    <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('bookings.index') }}" class="nav-item {{ request()->routeIs('bookings.index') ? 'active' : '' }}">My Bookings</a>
                    <a href="{{ route('bookings.create') }}" class="nav-item {{ request()->routeIs('bookings.create') ? 'active' : '' }}">Create a booking</a>
                    <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">Profile</a>

                    @endif
                    @endauth
                </nav>
            </div>
            <div class="mobile-logout-container">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout-button" onclick="toggleMobileMenu()">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="logout-button" onclick="toggleMobileMenu()">Login</a>
                <a href="{{ route('register') }}" class="logout-button mt-2" onclick="toggleMobileMenu()">Register</a>
                @endauth
            </div>
        </div>
    </div>

    <div class="main-content">
        <header class="main-header">
            <h2 class="page-title">@yield('title', 'Your felines car made simple')</h2>
        </header>

        <main class="page-content">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.querySelector('.menu-icon');
            const closeIcon = document.querySelector('.close-icon');

            const isOpen = mobileMenu.classList.contains('open');
            if (isOpen) {
                mobileMenu.classList.remove('open');
                menuIcon.style.display = 'block';
                closeIcon.style.display = 'none';
            } else {
                mobileMenu.classList.add('open');
                menuIcon.style.display = 'none';
                closeIcon.style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.nav-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>