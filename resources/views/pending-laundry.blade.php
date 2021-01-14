<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending...') }}
        </h2>
    </x-slot>
    @livewire('pending-laundry')
</x-app-layout>