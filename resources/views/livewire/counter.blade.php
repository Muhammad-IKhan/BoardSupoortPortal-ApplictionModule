<!-- resources/views/livewire/counter.blade.php -->
@extends('layouts.dashboardContainer')
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>


<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>