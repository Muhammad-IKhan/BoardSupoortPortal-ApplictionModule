<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6"><p>its me</p><script src="{{ asset('js/header/header.js') }}" defer></script> <!-- Include your JS file --> </div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
