<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laundry') }}
        </h2>
    </x-slot>
    @livewire('admin.laundry')
</x-app-layout>