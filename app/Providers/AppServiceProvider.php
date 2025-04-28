<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\View;
use App\View\Composers\SharedDataComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {      

        view() -> share('var', 'val');
        View::composer('*', SharedDataComposer::class);
        
        view()->composer('abc', function ($view) {
            // $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
            // $view->with('recentPosts', $recentPosts);
        });

        // In a service provider or route file
        Livewire::component('profile-form', \App\Http\Livewire\ProfileForm::class);
        // Register your Livewire components here
        // Livewire::component('profile-form', \App\Http\Livewire\ProfileForm::class);
        // Livewire::component('another-component', \App\Http\Livewire\AnotherComponent::class);
    }
}
