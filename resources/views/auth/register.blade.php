<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-card {
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

        .header p {
            color: #6b7280;
            font-size: 0.875rem;
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

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
        }

        .terms-container {
            margin-bottom: 1.5rem;
        }

        .terms-checkbox {
            display: flex;
            align-items: start;
            gap: 0.5rem;
        }

        .terms-checkbox input[type="checkbox"] {
            margin-top: 0.25rem;
        }

        .terms-text {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .terms-text a {
            color: #3b82f6;
            text-decoration: none;
        }

        .terms-text a:hover {
            text-decoration: underline;
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
            margin-bottom: 1rem;
            display: none;
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
    <div class="register-card">
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/biseb.ico') }}" alt="Logo" class="logo-image">
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-error" style="display: block;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Header -->
        <div class="header">
            <h1>Create an Account</h1>
            <p>Fill in your details to get started</p>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            <!-- Name Field -->
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" 
                           placeholder="Enter your full name"
                           required 
                           autofocus>
                </div>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

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
                           required>
                </div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Create a password"
                           required>
                    <button type="button" class="password-toggle" id="passwordToggle">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="form-control"
                           placeholder="Confirm your password"
                           required>
                    <button type="button" class="password-toggle" id="confirmPasswordToggle">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Terms and Conditions -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="terms-container">
                    <label class="terms-checkbox">
                        <input type="checkbox" 
                               name="terms" 
                               id="terms" 
                               required>
                        <span class="terms-text">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </span>
                    </label>
                </div>
            @endif

            <!-- Submit Button -->
            <button type="submit" class="submit-btn" id="submitBtn">
                <span class="spinner" id="spinner"></span>
                <span id="buttonText">{{ __('Register') }}</span>
            </button>

            <!-- Login Link -->
            <div class="login-link">
                <a href="{{ route('login') }}">{{ __('Already have an account? Log in') }}</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const passwordToggle = document.getElementById('passwordToggle');
            const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
            const submitBtn = document.getElementById('submitBtn');
            const spinner = document.getElementById('spinner');
            const buttonText = document.getElementById('buttonText');

            // Toggle password visibility
            function togglePasswordVisibility(input, button) {
                const type = input.type === 'password' ? 'text' : 'password';
                input.type = type;
                button.innerHTML = type === 'password' ? 
                    '<i class="fas fa-eye"></i>' : 
                    '<i class="fas fa-eye-slash"></i>';
            }

            passwordToggle.addEventListener('click', () => {
                togglePasswordVisibility(passwordInput, passwordToggle);
            });

            confirmPasswordToggle.addEventListener('click', () => {
                togglePasswordVisibility(confirmPasswordInput, confirmPasswordToggle);
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Only validate if no server-side errors are present
                if (!form.querySelector('.is-invalid')) {
                    const nameInput = document.getElementById('name');
                    const emailInput = document.getElementById('email');

                    if (!nameInput.value.trim()) {
                        isValid = false;
                    }

                    if (!emailInput.value || !/\S+@\S+\.\S+/.test(emailInput.value)) {
                        isValid = false;
                    }

                    if (!passwordInput.value || passwordInput.value.length < 8) {
                        isValid = false;
                    }

                    if (passwordInput.value !== confirmPasswordInput.value) {
                        isValid = false;
                    }
                }

                if (isValid) {
                    // Show loading state
                    submitBtn.disabled = true;
                    spinner.style.display = 'inline-block';
                    buttonText.textContent = 'Creating account...';
                }
            });
        });
    </script>
</body>
</html>