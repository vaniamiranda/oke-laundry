<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @livewire('laundry.menu')
    @livewire('laundry.dashboard')
</x-app-layout>