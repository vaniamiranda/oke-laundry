<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laundry') }}
        </h2>
    </x-slot>
    @livewire('daftar-menjadi-laundry')
</x-app-layout>