<?php

// app/Http/Livewire/ProfileForm.php
namespace App\Http\Livewire;

use Livewire\Component;

class ProfileForm extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProfile()
    {
        $this->validate();
        
        // Here you would typically save to database
        $this->message = 'Profile updated successfully!';
    }

    public function render()
    {
        return view('livewire.profile-form');
    }
}