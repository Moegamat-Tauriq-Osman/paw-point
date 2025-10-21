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

        .reset-wrapper {
            width: 100%;
            max-width: 400px;
            margin-top: 80px;
            padding: 0 20px;
        }

        .reset-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .reset-logo img {
            height: 90px;
        }

        .reset-title {
            text-align: center;
            font-weight: 700;
            font-size: 24px;
            color: #2F98E8;
            margin-bottom: 20px;
        }

        .reset-description {
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

        input[type="email"],
        input[type="password"] {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px 14px;
            margin-top: 6px;
            transition: border-color 0.2s ease;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #2F98E8;
            outline: none;
            box-shadow: 0 0 0 2px rgba(47, 152, 232, 0.15);
        }

        .reset-button {
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

        .reset-button:hover {
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

        @media (max-width: 480px) {
            .reset-wrapper {
                margin-top: 60px;
            }

            .reset-logo img {
                height: 70px;
            }
        }
    </style>

    <div class="reset-wrapper">
        <!-- Logo -->
        <div class="reset-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logos/PrimaryLogo.svg') }}" alt="Logo" class="w-32 mx-auto cursor-pointer">
            </a>
        </div>

        <h2 class="reset-title">Reset Password</h2>
        <p class="reset-description">Enter your new password below to secure your account.</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit -->
            <button type="submit" class="reset-button">
                {{ __('Reset Password') }}
            </button>

            <!-- Back to Login -->
            <a href="{{ route('login') }}" class="back-to-login">
                {{ __('Back to Login') }}
            </a>
        </form>
    </div>
</x-guest-layout>