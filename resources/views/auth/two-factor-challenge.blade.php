<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/biseb.ico') }}" type="image/png">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f4f6;
            padding: 1rem;
        }

        .auth-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-image {
            max-height: 100px;
            width: auto;
            margin-bottom: 1.5rem;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            color: #1f2937;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .info-text {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.2s;
            letter-spacing: 0.25em;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }

        .is-invalid {
            border-color: #dc2626 !important;
        }

        .button-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
        }

        .toggle-button {
            color: #6b7280;
            font-size: 0.875rem;
            text-decoration: underline;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .toggle-button:hover {
            color: #374151;
        }

        .submit-btn {
            padding: 0.75rem 1.5rem;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background: #2563eb;
        }

        .submit-btn:disabled {
            background: #93c5fd;
            cursor: not-allowed;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: none;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #dc2626;
            color: #dc2626;
            display: block;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/biseb.ico') }}" alt="Logo" class="logo-image">
        </div>

        <!-- Header -->
        <div class="header">
            <h1>Two-Factor Authentication</h1>
        </div>

        <div x-data="{ recovery: false }">
            <!-- Information Text -->
            <p class="info-text" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </p>

            <p class="info-text" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </p>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- 2FA Form -->
            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <!-- Authentication Code Input -->
                <div class="form-group" x-show="! recovery">
                    <label for="code">{{ __('Authentication Code') }}</label>
                    <div class="input-group">
                        <i class="fas fa-key"></i>
                        <input type="text" 
                               id="code" 
                               name="code" 
                               class="form-control @error('code') is-invalid @enderror"
                               inputmode="numeric" 
                               autofocus 
                               x-ref="code"
                               autocomplete="one-time-code"
                               placeholder="Enter 6-digit code">
                    </div>
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Recovery Code Input -->
                <div class="form-group" x-cloak x-show="recovery">
                    <label for="recovery_code">{{ __('Recovery Code') }}</label>
                    <div class="input-group">
                        <i class="fas fa-shield-alt"></i>
                        <input type="text" 
                               id="recovery_code" 
                               name="recovery_code" 
                               class="form-control @error('recovery_code') is-invalid @enderror"
                               x-ref="recovery_code"
                               autocomplete="one-time-code"
                               placeholder="Enter recovery code">
                    </div>
                    @error('recovery_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button Group -->
                <div class="button-group">
                    <!-- Toggle Recovery Button -->
                    <button type="button" 
                            class="toggle-button"
                            x-show="! recovery"
                            x-on:click="
                                recovery = true;
                                $nextTick(() => { $refs.recovery_code.focus() })
                            ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" 
                            class="toggle-button"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                recovery = false;
                                $nextTick(() => { $refs.code.focus() })
                            ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">
                        {{ __('Verify') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>