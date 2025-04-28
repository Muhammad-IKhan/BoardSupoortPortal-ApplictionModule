<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- tab-Pic -->
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

        .forgot-password-card {
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

        .description {
            color: #6b7280;
            font-size: 0.875rem;
            line-height: 1.5;
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
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
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

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: #3b82f6;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .login-link a:hover {
            text-decoration: underline;
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

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #16a34a;
            color: #16a34a;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #dc2626;
            color: #dc2626;
        }

        .spinner {
            display: none;
            width: 1rem;
            height: 1rem;
            border: 2px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.75s linear infinite;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="forgot-password-card">
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/biseb.ico') }}" alt="Logo" class="logo-image">
        </div>

        <!-- Header -->
        <div class="header">
            <h1>Forgot Password</h1>
        </div>

        <!-- Description -->
        <div class="description">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Status Message -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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

        <!-- Reset Form -->
        <form method="POST" action="{{ route('password.email') }}" id="resetForm">
            @csrf

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" 
                           placeholder="Enter your email"
                           required 
                           autofocus>
                </div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn" id="submitBtn">
                <span class="spinner" id="spinner"></span>
                <span id="buttonText">{{ __('Email Password Reset Link') }}</span>
            </button>

            <!-- Login Link -->
            <div class="login-link">
                <a href="{{ route('login') }}">{{ __('Back to login') }}</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetForm');
            const emailInput = document.getElementById('email');
            const submitBtn = document.getElementById('submitBtn');
            const spinner = document.getElementById('spinner');
            const buttonText = document.getElementById('buttonText');

            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Only validate if no server-side errors are present
                if (!form.querySelector('.is-invalid')) {
                    if (!emailInput.value || !/\S+@\S+\.\S+/.test(emailInput.value)) {
                        isValid = false;
                    }
                }

                if (isValid) {
                    // Show loading state
                    submitBtn.disabled = true;
                    spinner.style.display = 'inline-block';
                    buttonText.textContent = 'Sending reset link...';
                }
            });
        });
    </script>
</body>
</html>