<x-guest-layout>
    <link rel="icon" href="{{ asset('logos/PawVariation.svg') }}" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #FFFFFF, #FFD6C0);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .forgot-wrapper {
            width: 100%;
            max-width: 400px;
            margin-top: 80px;
            padding: 0 20px;
        }

        .forgot-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .forgot-logo img {
            height: 90px;
        }

        .forgot-title {
            text-align: center;
            font-weight: 700;
            font-size: 24px;
            color: #2F98E8;
            margin-bottom: 20px;
        }

        .forgot-description {
            font-size: 14px;
            color: #555;
            text-align: center;
            line-height: 1.5;
            margin-bottom: 24px;
        }

        form {
            width: 100%;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input[type="email"] {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px 14px;
            margin-top: 6px;
            transition: border-color 0.2s ease;
            box-sizing: border-box;
        }

        input[type="email"]:focus {
            border-color: #2F98E8;
            outline: none;
            box-shadow: 0 0 0 2px rgba(47, 152, 232, 0.15);
        }

        .forgot-button {
            background-color: #2F98E8;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 24px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .forgot-button:hover {
            background-color: #2F51E8;
        }

        .back-to-login {
            display: block;
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #2F98E8;
            text-decoration: none;
            font-weight: 500;
        }

        .back-to-login:hover {
            text-decoration: underline;
        }

        .status-message {
            color: #2F98E8;
            background-color: #EAF5FF;
            border: 1px solid #BEE3FF;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
            text-align: center;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .forgot-wrapper {
                margin-top: 60px;
            }

            .forgot-logo img {
                height: 70px;
            }
        }
    </style>

    <div class="forgot-wrapper">
        <!-- Logo -->
        <div class="forgot-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="Logo" class="w-32 mx-auto cursor-pointer">
            </a>
        </div>

        <h2 class="forgot-title">Forgot Password?</h2>

        <p class="forgot-description">
            No problem. Enter your email address and we’ll send you a password reset link.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="status-message" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit -->
            <button type="submit" class="forgot-button">
                {{ __('Send Reset Link') }}
            </button>

            <a href="{{ route('login') }}" class="back-to-login">
                {{ __('Back to Login') }}
            </a>
        </form>
    </div>
</x-guest-layout>