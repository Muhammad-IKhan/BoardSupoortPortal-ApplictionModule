<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>

{{-- resources/views/layouts/partials/mobile-navigation.blade.php --}}
<a href="{{ route('home') }}" class="@if(request()->routeIs('home')) bg-indigo-50 border-indigo-500 text-indigo-700 @else border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 @endif block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
    Home
</a>
<a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')) bg-indigo-50 border-indigo-500 text-indigo-700 @else border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 @endif block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
    Dashboard
</a>
<a href="{{ route('profile') }}" class="@if(request()->routeIs('profile')) bg-indigo-50 border-indigo-500 text-indigo-700 @else border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 @endif block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
    Profile
</a>

@auth
    <div class="pt-4 pb-3 border-t border-gray-200">
        <div class="flex items-center px-4">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            </div>
            <div class="ml-3">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <div class="mt-3 space-y-1">
            <a href="{{ route('profile') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                Your Profile
            </a>
            <a href="{{ route('settings') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                Settings
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Sign out
                </button>
            </form>
        </div>
    </div>
@endauth