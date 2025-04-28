// In your Livewire component view
@extends('layouts.dashboardContainer')
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>

<!-- resources/views/livewire/profile-form.blade.php -->


<div>
    <form wire:submit.prevent="saveProfile">
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" wire:model="name" class="border p-2">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Email</label>
            <input type="email" wire:model="email" class="border p-2">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Save Profile
        </button>

        @if($message)
            <div class="mt-4 text-green-500">
                {{ $message }}
            </div>
        @endif
    </div>
</form>
