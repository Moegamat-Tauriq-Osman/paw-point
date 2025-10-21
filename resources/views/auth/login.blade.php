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

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            margin-top: 80px;
            padding: 0 20px;
        }

        .login-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .login-logo img {
            height: 90px;
        }

        .login-title {
            text-align: center;
            font-weight: 700;
            font-size: 24px;
            color: #2F98E8;
            margin-bottom: 28px;
        }

        form {
            width: 100%;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px 14px;
            margin-top: 6px;
            transition: border-color 0.2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #2F98E8;
            outline: none;
            box-shadow: 0 0 0 2px rgba(47, 152, 232, 0.15);
        }

        /* 💡 Ensure inputs and login button are same width */
        input[type="email"],
        input[type="password"],
        .x-input,
        .login-button {
            display: block;
            width: 100% !important;
            box-sizing: border-box;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #555;
            font-size: 14px;
            margin-top: 10px;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 8px;
            font-size: 14px;
            color: #2F98E8;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-button {
            background-color: #2F98E8;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            margin-top: 24px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #2F51E8;
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

        .reg-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #2F98E8;
            text-decoration: none;
            font-weight: 500;
        }

        .reg-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-wrapper {
                margin-top: 60px;
            }

            .login-logo img {
                height: 70px;
            }
        }
    </style>


    <div class="login-wrapper">
        <!-- Logo -->
        <div class="login-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="Logo" class="w-32 mx-auto cursor-pointer">
            </a>
        </div>

        <h2 class="login-title">Sign In</h2>

        <!-- Session Status -->
        @if (session('status'))
        <div class="status-message">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <label for="remember_me" class="checkbox-label">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
            <a class="forgot-password" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <!-- Submit -->
            <button type="submit" class="login-button">
                {{ __('Sign In') }}
            </button>

            <a class="reg-link" href="{{ route('register') }}">
                {{ __('Dont have an Account? Sign Up') }}
            </a>
        </form>
    </div>
</x-guest-layout>