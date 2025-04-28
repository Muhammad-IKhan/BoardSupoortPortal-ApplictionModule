<div class="profile-page">
    @section('title', 'Profile')
    
    @section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/biseb.ico') }}" type="image/png">
    @endsection

    <div class="profile-container">
        <!-- Status Messages -->
        @if (session('status'))
            <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('status') }}
                <button class="alert-close" @click="show = false">&times;</button>
            </div>
        @endif

        <!-- Profile Card -->
        <div class="profile-card">
            <div class="profile-header">
                <div class="logo-wrapper">
                    <img src="{{ asset('images/biseb.ico') }}" alt="Logo" class="logo-image">
                </div>
                <h1>{{ __('Profile Information') }}</h1>
                <p class="text-muted">{{ __('Manage your account details and preferences') }}</p>
            </div>

            <!-- Profile Photo Section -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="photo-section">
                    <div class="photo-wrapper">
                        <div class="photo-container" 
                             x-on:mouseover="$refs.photoControls.classList.add('visible')"
                             x-on:mouseout="$refs.photoControls.classList.remove('visible')">
                            <template x-if="! photoPreview">
                                <img src="{{ $this->user->profile_photo_url }}" 
                                     alt="{{ $this->user->name }}"
                                     class="profile-photo">
                            </template>
                            <template x-if="photoPreview">
                                <div class="profile-photo"
                                     x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </div>
                            </template>
                            
                            <div class="photo-controls" x-ref="photoControls">
                                <button type="button" 
                                        class="control-btn upload"
                                        x-on:click.prevent="$refs.photo.click()">
                                    <i class="fas fa-camera"></i>
                                </button>
                                @if ($this->user->profile_photo_path)
                                    <button type="button" 
                                            class="control-btn delete"
                                            wire:click="deleteProfilePhoto">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="file" 
                           class="hidden"
                           wire:model.live="photo"
                           x-ref="photo"
                           x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                           " />

                    <x-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <form wire:submit="updateProfileInformation">
                <!-- Form Fields -->
                <div class="form-fields">
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">
                            <i class="fas fa-user"></i>
                            {{ __('Name') }}
                        </label>
                        <input type="text" 
                               id="name" 
                               class="form-input @error('state.name') is-invalid @enderror"
                               wire:model="state.name"
                               required
                               autocomplete="name"
                               placeholder="{{ __('Enter your name') }}">
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i>
                            {{ __('Email') }}
                        </label>
                        <input type="email" 
                               id="email" 
                               class="form-input @error('state.email') is-invalid @enderror"
                               wire:model="state.email"
                               required
                               autocomplete="username"
                               placeholder="{{ __('Enter your email') }}">
                        <x-input-error for="email" class="mt-2" />

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                            <div class="verification-alert" x-data="{ showMessage: false }">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>{{ __('Your email address is unverified.') }}</span>
                                <button type="button" 
                                        class="resend-link"
                                        wire:click.prevent="sendEmailVerification"
                                        @click="showMessage = true"
                                        x-show="!showMessage">
                                    {{ __('Resend verification email') }}
                                </button>

                                <div x-show="showMessage" 
                                     x-transition
                                     class="verification-message">
                                    {{ __('Verification link sent!') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <div class="action-message" wire:loading.remove wire:target="updateProfileInformation">
                        <x-action-message on="saved">
                            <i class="fas fa-check"></i>
                            {{ __('Saved successfully') }}
                        </x-action-message>
                    </div>

                    <button type="submit" 
                            class="submit-btn" 
                            wire:loading.attr="disabled"
                            wire:target="photo">
                        <span class="spinner" wire:loading>
                            <i class="fas fa-circle-notch fa-spin"></i>
                        </span>
                        <span wire:loading.remove>
                            <i class="fas fa-save"></i>
                            {{ __('Save Changes') }}
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
    :root {
        --primary-color: #3b82f6;
        --primary-hover: #2563eb;
        --danger-color: #ef4444;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --border-color: #e5e7eb;
        --bg-hover: #f3f4f6;
    }

    .profile-page {
        width: 100%;
        min-height: 100vh;
        padding: 2rem 1rem;
        background: var(--bg-hover);
    }

    .profile-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .profile-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 2.5rem;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .logo-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
    }

    .logo-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .profile-header h1 {
        color: var(--text-primary);
        font-size: 1.875rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .text-muted {
        color: var(--text-secondary);
    }

    /* Photo Section Styles */
    .photo-section {
        margin-bottom: 2.5rem;
    }

    .photo-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        position: relative;
    }

    .photo-container {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid var(--primary-color);
        position: relative;
    }

    .profile-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-controls {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        padding: 0.5rem;
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        opacity: 0;
        transition: opacity 0.2s;
    }

    .photo-controls.visible {
        opacity: 1;
    }

    .control-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: none;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .control-btn.upload {
        background: var(--primary-color);
    }

    .control-btn.delete {
        background: var(--danger-color);
    }

    .control-btn:hover {
        transform: scale(1.1);
    }

    /* Form Styles */
    .form-fields {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .form-group {
        display: grid;
        gap: 0.5rem;
    }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-primary);
        font-weight: 500;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .verification-alert {
        margin-top: 0.75rem;
        padding: 0.75rem;
        background: #fff7ed;
        border: 1px solid var(--warning-color);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .verification-alert i {
        color: var(--warning-color);
    }

    .resend-link {
        margin-left: auto;
        color: var(--primary-color);
        background: none;
        border: none;
        cursor: pointer;
        font-weight: 500;
    }

    .verification-message {
        color: var(--success-color);
        font-weight: 500;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
    }

    .submit-btn {
        background: var(--primary-color);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .submit-btn:hover {
        background: var(--primary-hover);
    }

    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Alert Styles */
    .alert {
        padding: 1rem;
        border-radius: 0.75rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
    }

    .alert-success {
        background: #ecfdf5;
        border: 1px solid var(--success-color);
        color: var(--success-color);
    }

    .alert-close {
        position: absolute;
        right: 1rem;
        background: none;
        border: none;
        color: currentColor;
        cursor: pointer;
        font-size: 1.25rem;
    }

    .hidden {
        display: none;
    }

    /* Animations */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .spinner {
        animation: spin 1s linear infinite;
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        .profile-card {
            padding: 1.5rem;
            border-radius: 1rem;
        }

        .profile-header h1 {
            font-size: 1.5rem;
        }

        .photo-wrapper {
            width: 100px;
            height: 100px;
        }

        .submit-btn {
            width: 100%;
            justify-content: center;
        }
    }
    </style>
</div>